<?php 
include('Crypto.php');
include('myutils.php');

	// error_reporting(0);
	
	$workingKey='62F8A39E1129F6D36F7C21A7F6A6D1EA';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";
	
	$order_id = 'Unknown';
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		if($information[0] == 'order_id')
			$order_id = $information[1];
	}

	if($order_status==="Success")
	{
		echo "<br>Thank you for making a donation to Pratibha Poshak. <br>We will send you a receipt and 80G certificate shortly.";
		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>There was an error. We will inform you about the status of your donation.";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>The transaction has been declined. Please try again.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
		
		$respfieldname = $information[0];
		$respfielvalue = $information[1];
		
		$conn = getdbconn();
    	$stmt = $conn->prepare(
        "INSERT INTO ccavtrans_response(
            orderid, respfieldname, respfieldvalue) 
		 VALUES (?, ?, ?)");

    	if(is_bool($stmt)) {
        	echo "Oops! Something went wrong in processing the response from the payment gateway.";
			echo "Don't worry, it's us, not you.";
        	echo "Internal error: database operation failed.";
			echo "Please report it to us. We will update you about the status of your transaction";
        	$conn->close();
    	}

    	$stmt->bind_param('sss', $order_id, $respfieldname, $respfielvalue);

    	if(!$stmt->execute()) 
    	{
        	echo "Oops! Something went wrong in processing the response from the payment gateway.";
			echo "Don't worry, it's us, not you.";
        	echo "Internal error: database operation failed.";
			echo "Please report it to us. We will update you about the status of your transaction";			
        	$conn->close();
    	}

    	$conn->close();
	}

	echo "</table><br>";
	echo '<br><a href="https://pratibhaposhak.in">Return</a><br>';
	echo "</center>";
?>
