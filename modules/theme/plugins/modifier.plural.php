<?php defined('SYSPATH') OR die('No direct access allowed.');

function smarty_modifier_plural($value, $one_form, $few_form, $much_form) {

	$last_digit = substr($value, strlen($value) - 1, 1);
	$pre_last_digit = strlen($value) > 1 ? substr($value, strlen($value) - 2, 1) : 0;

	if ($last_digit == 0 || $last_digit >= 5)
	{
		return $much_form;
	}
	else
	{
		if ($last_digit >= 2 && $last_digit <= 4)
		{
			if ($pre_last_digit == 1)
			{
				return $much_form;
			}
			else
			{
				return $few_form;
			}
		}
		else
		{
			if ($pre_last_digit == 1)
			{
				return $much_form;
			}
			else
			{
				return $one_form;
			}			
		}
	}
	return FALSE;	

}