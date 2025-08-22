<html>
<head>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
</head>
<body>
	<form method="post" name="customerData" action="pgreqhandler.php">
		<table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"><b>Integration Kit</b></font></caption></table>
			<table width="40%" height="100" border='1' align="center">
				<input type="hidden" name="tid" id="tid" readonly />
				<input type="hidden" name="currency" value="INR"/>
				<input type="hidden" name="language" value="EN"/>
		        <tr>
		        	<td>Your Name	:</td><td><input type="text" name="billing_name" value="" required/></td>
		        </tr>
		        <tr>
		        	<td>Mobile	:</td><td><input type="text" name="billing_tel" value="" required/></td>
		        </tr>
		        <tr>
		        	<td>Email	:</td><td><input type="text" name="billing_email" value=""/></td>
		        </tr>
				<tr>
					<td>Amount	:</td><td><input type="text" name="amount" value="" required/></td>
				</tr>
		        <tr>
		        	<td>Address	:</td><td><input type="text" name="billing_address" value=""/></td>
		        </tr>
		        <tr>
		        	<td>City	:</td><td><input type="text" name="billing_city" value=""/></td>
		        </tr>
		        <tr>
		        	<td>State	:</td><td><input type="text" name="billing_state" value=""/></td>
		        </tr>
		        <tr>
		        	<td>PIN Code :</td><td><input type="text" name="billing_zip" value=""/></td>
		        </tr>
		        <tr>
		        	<td>Country	:</td><td><input type="text" name="billing_country" value="India"/></td>
		        </tr>
		        <tr>
		        	<td>Your PAN :</td><td><input type="text" name="merchant_param1" value="" required/></td>
		        </tr>
		        <tr>
		        	<td>Cause for which donation is to be utilized:</td><td><input type="text" name="merchant_param2" value="Education"/></td>
		        </tr>
		        <tr>
		        	<td></td><td><INPUT TYPE="submit" value="DONATE"></td>
		        </tr>
	      	</table>
	      </form>
	</body>
</html>


