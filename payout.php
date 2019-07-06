<?php 
session_start();
require('admin/config.php');
require('admin/fun.php');

if (isset($_POST['payment_online'])) {
    $price_value = $_POST['payment_online'];
    
}
?>