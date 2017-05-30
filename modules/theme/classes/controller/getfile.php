<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Getfile extends Controller {

	private function _send_file($file)
	{
		$expires   = 60 * 60 * 24 * 14;
		$extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

		$this->request->headers['Content-Type']  = File::mime_by_ext($extension);
		$this->request->headers['Pragma']        = 'public';
		$this->request->headers['Cache-Control'] = 'maxage='.$expires;
		$this->request->headers['Expires']       = gmdate('D, d M Y H:i:s', time() + $expires);

		fpassthru(fopen($file, 'rb'));
	}

	public function action_css($file, $ext)
	{
		if ($ext != 'css')
			throw new Error_404;

		$path = Theme_View::find_file('css', $file, $ext);
		if ($path === FALSE)
			throw new Error_404;

		$this->_send_file($path);
	}

	public function action_js($file, $ext)
	{
		if ($ext != 'js' AND $ext != 'htc')
			throw new Error_404;

		$path = Theme_View::find_file('js', $file, $ext);
		if ($path === FALSE)
			throw new Error_404;

		$this->_send_file($path);
	}

	public function action_img($file, $ext)
	{
		if ( ! in_array($ext, array('gif', 'jpeg', 'jpg', 'png', 'ico', 'svg')))
			throw new Error_404;

		$path = Theme_View::find_file('img', $file, $ext);
		if ($path === FALSE)
			throw new Error_404;

		$this->_send_file($path);
	}

} // End Getfile Controller
