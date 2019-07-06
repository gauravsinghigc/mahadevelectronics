<?php
require 'admin/config.php';
elseif ($pg_way == "instamojo") {
	$sql = "UPDATE pay_route set status='disable' where pg_way='$pg_way'";
	$query = mysqli_query($con, $sql);
	if ($query == true) {
	$sql = "UPDATE pay_route set status='active' where pg_way='paytm'";
	$query = mysqli_query($con, $sql);
	echo "instamojo";
	}
}