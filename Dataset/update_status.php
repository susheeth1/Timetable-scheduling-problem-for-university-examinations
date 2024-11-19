<?php
include('connect.php');


$get_id=$_GET['id'];

mysqli_query($conn,"update classsched  set status='checked' where department like '%CIT%'")or die(mysqli_error());

header('location:class.php');

?>