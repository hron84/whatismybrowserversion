<!DOCTYPE html>
<html>
	<head>
		<title>What is my browser version?</title>
		<style>
			* {
				margin:0;
				padding:0;
			}
			
			body {
				padding:10px;
				font-size:12px;
				line-height:1.5em;
				font-family:"Verdana","sans-serif";
			}
			
			h1 {
				font-size:18px;
				line-height:21px;
			}
			
			h2 {
				margin-top:21px;
			}
			
			#textcontainer {
				position:relative;
				height:75px;
				border-radius:10px;
				border:1px solid #cfcfcf;
				padding:10px;
				overflow:visible;
			}
			
			#textcontainer2 {
				position:relative;
				overflow:visible;
			}
			
			textarea {
				border:0;
				width:100%;
				overflow:visible;
				display:block;
				resize:none;
			}
			
			textarea:focus {
				outline:0;
			}
		</style>
	</head>

	<body>
		<h1>What Is My Browser Version?</h1>
		<p>Please send the following information to the customer support:</p>
		<div id="textcontainer">
			<div id="textcontainer2">
				<textarea id="browserinfo" rows="4">
User Agent: <?php echo(htmlspecialchars($_SERVER['HTTP_USER_AGENT'])); ?>

IP address: <?php echo(htmlspecialchars($_SERVER['REMOTE_ADDR'])); ?>

JavaScript enabled: no
</textarea>
				<script type="text/javascript">
					var browserinfo = document.getElementById('browserinfo');
					browserinfo.innerHTML = browserinfo.innerHTML.replace('JavaScript enabled: no', 'JavaScript enabled: yes')</script>
			</div>
		</div>
		<h2>What is this site?</h2>
		<p>
			This site has been created to help customer support determine your exact browser and operating system for
			tracking down bugs. The information you see here is available to any website you visit. We do not store it
			for any length of time.
		</p>
		<p>Have an improvement? <a href="https://github.com/janoszen/whatismybrowserversion">Send a pull request on GitHub!</a></p>
		<script type="text/javascript" src="./zeroclipboard/ZeroClipboard.js"></script>
		<script type="text/javascript">
			browserinfo.focus();
			browserinfo.select();
		</script>
	</body>
</html>
