<!DOCTYPE html>
<html>
	<head>
		<title>What is my browser version?</title>
	</head>

	<body>
		<p>Please send the following information to the customer support:</p>
		<textarea id="browserinfo" cols="120" rows="10">
User Agent: <?php echo(htmlspecialchars($_SERVER['HTTP_USER_AGENT'])); ?>

IP address: <?php echo(htmlspecialchars($_SERVER['REMOTE_ADDR'])); ?>
</textarea>
		<script type="text/javascript">
			document.getElementById('browserinfo').select();
		</script>
	</body>
</html>
