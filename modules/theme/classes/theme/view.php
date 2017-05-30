<?php defined('SYSPATH') or die('No direct script access.');

class Theme_View extends Kohana_View {

	/**
	 * Captures the output that is generated when a view is included.
	 * The view data will be extracted to make local variables. This method
	 * is static to prevent object scope resolution.
	 *
	 * @param   string  filename
	 * @param   array   variables
	 * @return  string
	 */
	protected static function capture($template, array $data)
	{
		if ($template == '')
			return;

		$config = Kohana::config('smarty');
		if ($config->integration AND pathinfo($template, PATHINFO_EXTENSION) == $config->template_ext)
		{
			$smarty = Theme_Smarty::instance();
			foreach ($data as $key => $value)
			{
				$smarty->assign($key, $value);
			}
			$output = $smarty->fetch($template);
		}
		else
		{
			$output = parent::capture($template, $data);
		}

		return $output;
	}

	/**
	 * Sets the view filename.
	 *
	 * @throws  View_Exception
	 * @param   string  filename
	 * @return  View
	 */
	public function set_filename($file)
	{
		// Get the correct file extension
		$config = Kohana::config('smarty');
		$ext = $config->template_ext;
		$ext = ($config->integration AND ! empty($ext)) ? $ext : NULL;

		$this->_file = Theme_View::find_file('', $file, $ext);

		if ($this->_file === FALSE)
			throw new Kohana_View_Exception('The requested view :file could not be found', array(':file' => $file));

		return $this;
	}

	public static function find_file($dir, $file, $ext)
	{
		$directories = array('..'.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.Theme::current(), 'views');

		foreach ($directories as $directory)
		{
			if (($path = Kohana::find_file($directory.DIRECTORY_SEPARATOR.$dir, $file, $ext)) !== FALSE)
				break;
		}

		if ($path === FALSE)
		{
		 	$path = Kohana::find_file('views', $file);
		}
		
		return $path;
	}

} // End Theme_View
