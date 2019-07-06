<?php
session_start();
require 'admin/config.php';
require 'admin/fun.php';

if (isset($_POST['customizations'])) {
	
	if ($_POST['customizations'] = "Neck Customisation") {
		echo $_POST['customizations'];
	} elseif($_POST['customizations'] = "Sleeve Customisation"){
		echo $_POST['customizations'];
	} elseif ($_POST['customizations'] = "Length Customisation") {
		echo $_POST['customizations'];
	}
}