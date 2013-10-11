<?php
	$error 		=	validation_errors();
	$error 		.= 	$this->session->flashdata('error');
	$success	= 	$this->session->flashdata('success');
	$info		=	$this->session->flashdata('info');
	
	if($error != '')
	{
    	echo "<div class='alert alert-error'>
    			<button class='close' data-dismiss='alert'></button>
    			$error</div>";
    }
    else if($success != '')
	{
    	echo "<div class='alert alert-success'>
    			<button class='close' data-dismiss='alert'></button>
    			$success</div>";
    }
    else if($info != '')
	{
    	echo "<div class='alert alert-info'>
    			<button class='close' data-dismiss='alert'></button>
    			$info</div>";
	}

?>