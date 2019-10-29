<?php

if(!function_exists('pr'))
{

	/*!
	 * Print a formmated html error
	 * @param inline - put class inline in the pre tag
	 * @args - Works with infinity args 
	 * @return void
	 */
	function pr($inline)
	{
		$jconfig = new JCONFIG;

		if(isset($jconfig->custom_debug) && $jconfig->custom_debug)
		{
			if($inline !== false)
				print_r('<pre class="jdebug">');
			else
				print_r('<pre class="jdebug inline">');


			$backtrace = debug_backtrace(0);
			
			print_r('<p><b>FILE </b>'. $backtrace[0]['file'].'</p>');
			print_r('<p><b>LINE </b>'. $backtrace[0]['line'].'</p>');	
		

			$args = func_get_args();

			if($inline === false || $inline === true)			
				array_shift($args);

			foreach ($args as $param)
			{
		    	if(is_array($param) || is_object($param))
		    	{
					print_r($param);
		    	}
		    	else
		    	{
		    		print_r('<p>'.$param.'</p>');
		    	}    
		    }

			print_r('</pre>');

		}
	}

}