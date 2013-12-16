<?php

/**
 * prints and dies
 * @param  any data
 * @return void
 */
function printDie($data)
{
	echo "<pre>";

	if(is_array($data) OR is_object($data)) print_r($data);
	echo $data;

	echo "</pre>";
	die();
}
