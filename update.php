<?php 

session_start();
require 'admin/config.php';
require 'admin/fun.php';


if (isset($_POST['insert_product_size'])) {

  $size_id = $_POST['insert_product_size'];
  $product_id = $_POST['product_id'];
  $ip_address = $_POST['ip_address'];
  $customer_id = $_POST['customer_id'];

  $sql = "SELECT * FROM temp_sizes where product_id='$product_id' and customer_id='$customer_id' and ip_address='$ip_address'";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($query);

  if ($row == true) {

    $sql = "UPDATE temp_sizes SET sizes_id='$size_id' where ip_address='$ip_address' and customer_id='$customer_id' and product_id='$product_id'";
    $query = mysqli_query($con, $sql);

    if ($query == true) {
      header("location: product_details.php?product_id=$product_id&msg=success");
    } else {
      header("location: product_details.php?product_id=$product_id&msg=err");
    }
  } else {

    $size_id = $_POST['insert_product_size'];
    $product_id = $_POST['product_id'];
    $ip_address = $_POST['ip_address'];
    $customer_id = $_POST['customer_id'];

    $sql = "INSERT INTO temp_sizes (product_id, ip_address, customer_id, sizes_id) VALUES ('$product_id', '$ip_address', '$customer_id', '$size_id')";
    $query = mysqli_query($con, $sql);
    if ($query == true) {
      header("location: product_details.php?product_id=$product_id&msg=inserted");
    } else {
      header("location: product_details.php?product_id=$product_id&msg=not_inserted");
    }
  }


} elseif (isset($_POST['neck_customization'])) {

  if ($_POST['neck_customization'] == 1234) {

    $neck_customization = "Neck customizations";

    $option = $_POST['customisation_option'];
    $ip = $_POST['ip_address'];
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    $img_url = $_POST['img_url'];
    $fee = $_POST['customisation_fee'];

    $sql = "SELECT * FROM customization_product where ip_address='$ip' and customer_id='$customer_id' and customization='$neck_customization' and product_id='$product_id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row == true) {

      $sql = "UPDATE customization_product SET customization_type='$option', customized_fee='$fee', img_url='$img_url' where product_id='$product_id' and customer_id='$customer_id' and ip_address='$ip' and customization='$neck_customization'";
      $query = mysqli_query($con, $sql);

      if ($query == true) {
        header("location: product_details.php?product_id=$product_id&msg=success");
      } else {
        header("location: product_details.php?product_id=$product_id&msg=err");
      }

    } else {

      $neck_customization = "Neck customizations";

      $option = $_POST['customisation_option'];
      $ip = ip();
      $product_id = $_POST['product_id'];
      $customer_id = $_POST['customer_id'];
      $img_url = $_POST['img_url'];

      $sql = "INSERT into customization_product (ip_address, customer_id, product_id, customization, customization_type, customized_fee, img_url) 
             VALUES 
             ('$ip', '$customer_id', '$product_id', '$neck_customization', '$option', '$fee', '$img_url')";
      $query = mysqli_query($con, $sql);

      if ($query == true) {
        header("location: product_details.php?product_id=$product_id&msg=success_inserted");
      } else {
        header("location: product_details.php?product_id=$product_id&msg=err_insert_data");
      }

    }
  }

} elseif (isset($_POST['sleeve_customization'])) {

  if ($_POST['sleeve_customization'] == 5678) {

    $sleeve_customization = "Sleeve Customizations";

    $option = $_POST['customisation_option'];
    $ip = $_POST['ip_address'];
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    $img_url = $_POST['img_url'];
    $fee = $_POST['customisation_fee'];

    $sql = "SELECT * FROM customization_product where ip_address='$ip' and customer_id='$customer_id' and customization='$sleeve_customization' and product_id='$product_id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row == true) {

      $sql = "UPDATE customization_product SET customization_type='$option', customized_fee='$fee', img_url='$img_url' where product_id='$product_id' and customer_id='$customer_id' and ip_address='$ip' and customization='$sleeve_customization'";
      $query = mysqli_query($con, $sql);

      if ($query == true) {
        header("location: product_details.php?product_id=$product_id&msg=success");
      } else {
        header("location: product_details.php?product_id=$product_id&msg=err");
      }
    } else {

      $sleeve_customization = "Sleeve Customizations";

      $option = $_POST['customisation_option'];
      $ip = ip();
      $product_id = $_POST['product_id'];
      $customer_id = $_POST['customer_id'];
      $img_url = $_POST['img_url'];

      $sql = "INSERT into customization_product (ip_address, customer_id, product_id, customization, customization_type, customized_fee, img_url) 
             VALUES 
             ('$ip', '$customer_id', '$product_id', '$sleeve_customization', '$option', '$fee', '$img_url')";
      $query = mysqli_query($con, $sql);

      if ($query == true) {
        header("location: product_details.php?product_id=$product_id&msg=success_inserted");
      } else {
        header("location: product_details.php?product_id=$product_id&msg=err_insert_data");
      }

    }
  }

} elseif (isset($_POST['length_customization'])) {

  if ($_POST['length_customization'] == 9012) {

    $length_customization = "Length Customizations";

    $option = $_POST['customisation_option'];
    $ip = $_POST['ip_address'];
    $product_id = $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
    $img_url = $_POST['img_url'];
    $fee = $_POST['customisation_fee'];

    $sql = "SELECT * FROM customization_product where ip_address='$ip' and customer_id='$customer_id' and customization='$length_customization' and product_id='$product_id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row == true) {

      $sql = "UPDATE customization_product SET customization_type='$option', customized_fee='$fee', img_url='$img_url' where product_id='$product_id' and customer_id='$customer_id' and ip_address='$ip' and customization='$length_customization'";
      $query = mysqli_query($con, $sql);

      if ($query == true) {
        header("location: product_details.php?product_id=$product_id&msg=updated");
      } else {
        header("location: product_details.php?product_id=$product_id&msg=not_updated");
      }
    } else {

      $length_customization = "Length Customizations";

      $option = $_POST['customisation_option'];
      $ip = ip();
      $product_id = $_POST['product_id'];
      $customer_id = $_POST['customer_id'];
      $img_url = $_POST['img_url'];

      $sql = "INSERT into customization_product (ip_address, customer_id, product_id, customization, customization_type, customized_fee, img_url) 
             VALUES 
             ('$ip', '$customer_id', '$product_id', '$length_customization', '$option', '$fee', '$img_url')";
      $query = mysqli_query($con, $sql);

      if ($query == true) {
        header("location: product_details.php?product_id=$product_id&msg=sccuess_inserted");
      } else {
        header("location: product_details.php?product_id=$product_id&msg=err_insert_data");
      }
    }
  }
} elseif (isset($_POST['update_quantity'])) {

  if ($_POST['quantity'] == 0) {
    header("location: shopping.php?msg=qty_cnt_0");
  } else {
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $customer_id = $_SESSION['id'];
    $ip_address = ip();
    $quantity = $_POST['quantity'];
    $total_price = $quantity*$product_price;

    $sql = "UPDATE cart SET quantity='$quantity' where ip_address='$ip_address' and customer_id='$customer_id' and product_id='$product_id' and total_price='$total_price'";
    $query = mysqli_query($con, $sql);

    if ($query == true) {
      header("location: shopping.php?msg=updated_qnty");
    } else {
      header("location: shopping.php?msg=not_updated");
    }
  }
}

?>