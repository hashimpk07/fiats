<html>
<head>
	<title> Non-Seamless-kit</title>
</head>
<body>
<center>

	<?php include('Crypto.php')?>
	<?php

	error_reporting(0);

	$merchant_data='';
	$working_key='8AE20C5CAFE8A1A2A67B90390E7D5751';//Shared by CCAVENUES
	$access_code='AVPL67DK97BW75LPWB';//Shared by CCAVENUES

	$POST = [
		'merchant_id' => '115962',
		'redirect_url' => $redirect,
		'cancel_url' => $cancel,
		'currency' => 'INR',
		'amount' => $amount,
		'language' => 'EN',
		'order_id' => $orderId,
	] ;
	foreach ($POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data = encrypt($merchant_data,$working_key); // Method for encrypting the data.

	?>
	<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
		<?php
		echo "<input type=hidden name=encRequest value=$encrypted_data>";
		echo "<input type=hidden name=access_code value=$access_code>";
		?>
	</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>