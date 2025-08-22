<html>
<head>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<?php 
function get_amount($don_cause, $don_category)
{
	if($don_cause == 'sponsor-student')
	{
		if($don_category == 'Indian')
			return "68000";
		else
			return "830";
	}
	if($don_cause == 'sponsor-device')
	{
		if($don_category == 'Indian')
			return "19000";
		else
			return "230";
	}
	if($don_cause == 'sponsor-teaching')
	{
		if($don_category == 'Indian')
			return "24000";
		else
			return "300";
	}
	if($don_cause == 'sponsor-data')
	{
		if($don_category == 'Indian')
			return "7500";
		else
			return "90";
	}
	if($don_cause == 'sponsor-other')
	{
		return "";
	}			
}

function get_cause($don_cause)
{
	if($don_cause == 'sponsor-student')
	{
		return 'Sponsor a Student';
	}
	if($don_cause == 'sponsor-device')
	{
		return 'Sponsor a Device (Tablet PC)';
	}
	if($don_cause == 'sponsor-teaching')
	{
		return 'Sponsor Teaching';
	}
	if($don_cause == 'sponsor-data')
	{
		return 'Sponsor Internet Data';
	}
	else
	{
		return "";
	}
}
?>
<body>
	<?php
		$donation = $_POST['donation'];
		$donor_category = $_POST['donorcategory'];
	?>

	<form method="post" name="donate_step2" action="donate_step3.php">
		<center>
			<h2>Donate to Pratibha Poshak</h2>
			We need some information about you.
		</center>
		<br/>
		<table width="40%" height="100" border='1' align="center">
			<input type="hidden" name="tid" id="tid" readonly />
			<input type="hidden" name="language" value="EN"/>
			<input type="hidden" name="donor_category" value="<?php echo $donor_category; ?>"/>

		    <tr>
		        <td><b>Donor Name (*)</b></td><td><input type="text" name="billing_name" value="" required/></td>
		    </tr>	
		    <tr>
		        <td><b>Phone (*)</b></td><td><input type="text" name="billing_tel" value="" required/></td>
		    </tr>
		    <tr>
		        <td><b>Email (*)</b></td><td><input type="text" name="billing_email" value=""/></td>
		    </tr>
			<tr>
				<td><b>Amount (*)</b></td><td><input type="text" name="amount" value="<?php echo get_amount($donation, $donor_category);?>" required/></td>
			</tr>
			<tr>
				<td><b>Currency (*)</b></td><td><input type="text" name="currency" value="<?php echo ($donor_category == 'Indian'? 'INR' : 'USD');?>" readonly/></td>
			</tr>
			<tr>
		        <td><b>Donation for (*)</b></td><td><input type="text" name="merchant_param2" value="<?php echo get_cause($donation); ?>"/></td>
		    </tr>
			<?php
				if($donor_category == 'Indian') {
					echo '<tr>
		        			<td><b>Your PAN (*)</b></td><td><input type="text" name="merchant_param1" value="" required/></td>
		        		</tr>';
					}
			?>		
			<tr>
		        <td>Address</td><td><input type="text" name="billing_address" value=""/></td>
		    </tr>
			<tr>
		        <td>City</td><td><input type="text" name="billing_city" value=""/></td>
		    </tr>
		    <tr>
		        <td>State</td><td><input type="text" name="billing_state" value=""/></td>
		    </tr>
		    <tr>
		        <td>PIN Code</td><td><input type="text" name="billing_zip" value=""/></td>
		    </tr>
		    <tr>
		        <td>Country</td><td><input type="text" name="billing_country" value="India"/></td>
		    </tr>
	    </table>
		<?php
				if($donor_category == 'Indian') {
					echo '<fieldset>
    					<legend><b>Mode of Payment</b></legend>
    					<div>
							<input type="radio" id="mode1" name="paymode" value="upiqr" />
      						<label for="model1">UPI QR Code</label>

      						<input type="radio" id="mode2" name="paymode" value="online" />
      						<label for="model2">Payment Gateway (Net Banking/Cards/Wallets)</label>

							<input type="radio" id="mode3" name="paymode" value="offline" />
							<label for="model3">Cheque/Bank Transfer (NEFT/RTGS/Cheque)</label>
						</div>
  						</fieldset>';
				}
		?>
		<br/>
		<center>
			<div class="g-recaptcha" data-sitekey="6LfTdbgnAAAAAP-q_Wj00EvxWQLPTH1gTPS40BhR"></div>
			<br/>
			<INPUT TYPE="submit" value="DONATE"></td>
		</center>
	</form>
</body>
</html>