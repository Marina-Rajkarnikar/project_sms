<?php
require('../connect.php');
// echo '<pre>';
// print_r($_POST);
if(isset($_POST['stripeToken'])){
	$renting_price = $_POST['data-amount'];
	\Stripe\Stripe::setVerifySslCerts(false);
	$token=$_POST['stripeToken'];
	echo "<script>console.log('Debug' );</script>";
	$data=\Stripe\Charge::create(array(
		"amount"=>"$renting_price",
		"currency"=>"usd",
		"description"=>"Vehicle Rental System",
		"source"=>$token,
	));
	echo "<pre>";
	// print_r($data);
	echo "<script>window.open('receipt.php', '_self')</script>";
}
?>