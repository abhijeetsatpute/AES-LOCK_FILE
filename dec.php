<?php
	
	exec('python lock_files.py -P abhi --unlock '.$_GET["name"]);
	header("Location: " . $_SERVER["HTTP_REFERER"]);
?>