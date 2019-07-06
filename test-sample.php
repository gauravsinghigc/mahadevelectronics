                     <?php
                      ini_set("display_errors", 0);
                      $cust_add_msg = $_GET['cust_add_msg'];
                      IF($cust_add_msg){
                      	echo "<code class='bg-success'>Successfully Updated Address!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                      $cust_add_err = $_GET['cust_add_err'];
                      IF($cust_add_err){
                      	echo "<code class='bg-danger'>Update Address <b>FAILED!</B></code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }

                     customer_address_details();
                        ?>