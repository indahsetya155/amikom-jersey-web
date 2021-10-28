<?php
session_start();

if(!empty($_SESSION['idMember'])){
	include "template/header.php";
	include "pages/checkout.php";
	include "template/footer.php";
}else {
	header("location:login.php");
}

?>