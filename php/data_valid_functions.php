<?php

//Test form is filled out
function filled_out($form_vars)
	{
		//testing each variable to see if it has a value
		foreach ($form_vars as $key => $value)
			{
				if(!isset($key) || ($value = ''))
					return false;
			}
			return true;
	}
	
//Test email is valid
function valid_email($address)
	{
		//use regex to validate email
		if (ereg('^[a-zA-Z0-9 \._\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*\.)+[a-zA-Z]+$', $address))
			return true;
		else
			return false;
	}