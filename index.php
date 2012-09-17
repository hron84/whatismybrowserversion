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
				height:200px;
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
				<textarea id="browserinfo" rows="12">
User Agent: <?php echo(htmlspecialchars($_SERVER['HTTP_USER_AGENT'])); ?>

IP address: <?php echo(htmlspecialchars($_SERVER['REMOTE_ADDR'])); ?>

Reverse DNS: <?php echo(htmlspecialchars(gethostbyaddr($_SERVER['REMOTE_ADDR']))); ?>

JavaScript enabled: no
</textarea>
				<script type="text/javascript">
					var browserinfo = document.getElementById('browserinfo');
					browserinfo.innerHTML = browserinfo.innerHTML.replace('JavaScript enabled: no', 'JavaScript enabled: yes');
					
					//Browser information
					
					//Events support
					var events = Array();
					if (typeof document.addEventListener != 'undefined') {
						events.push('addEventListener');
					}
					if (typeof document.attachEvent != 'undefined') {
						events.push('attachEvent');
					}
					browserinfo.innerHTML += 'Events support: ' + events.join(', ') + '\n';

					// hasOwnProperty support
					browserinfo.innerHTML += 'hasOwnProperty support: ' + (typeof Object.hasOwnProperty == 'undefined'?'no':'yes') + '\n';

					// XPath support
					browserinfo.innerHTML += 'XPath support: ' + (typeof document.evaluate == 'undefined'?'no':'yes') + '\n';

					// JSON support
					browserinfo.innerHTML += 'JSON support: ' + (typeof JSON == 'undefined'?'no':'yes') + '\n';
					
					// DOM support
					browserinfo.innerHTML += 'Native getElementsByClassName support: ' +
						                     (typeof document.getElementsByClassName == 'undefined'?'no':'yes') + '\n';
										
					// AJAX support
					browserinfo.innerHTML += 'XHR support: ';
					var xhr = new Array();
					try {
						new ActiveXObject("Msxml2.XMLHTTP.6.0");
						xhr.push('Msxml2.XMLHTTP.6.0');
					} catch (e) {}
					try {
						new ActiveXObject("Msxml2.XMLHTTP.3.0");
						xhr.push('Msxml2.XMLHTTP.3.0');
					} catch (e) {}
					try {
						new ActiveXObject("Microsoft.XMLHTTP");
						xhr.push('Microsoft.XMLHTTP');
					} catch (e) {}
					try {
						new XMLHttpRequest();
						xhr.push('XMLHttpRequest');
					} catch (e) {}
					browserinfo.innerHTML += xhr.join(', ') + '\n';

					// CSS transitions
					var transitions = array();
					if (typeof document.getElementsByTagName('body')[0].style.transitionProperty != "undefined") {
						transitions.push('native');
					}
					if (typeof document.getElementsByTagName('body')[0].style.WebkitTransition != "undefined") {
						transitions.push('webkit');
					}
					if (typeof document.getElementsByTagName('body')[0].style.MozTransition != "undefined") {
						transitions.push('mozilla');
					}
					if (typeof document.getElementsByTagName('body')[0].style.KhtmlTransition != 'undefined') {
						transitions.push('khtml');
					}
					browserinfo.innerHTML += 'CSS transitions support: ' + transitions.join(', ') + '\n';

					// Websockets support
					browserinfo.innerHTML += 'Websockets support: ' + (typeof(WebSocket) == 'undefined'?'no':'yes') + '\n';
				</script>
				<script type="text/javascript" src="swfobject/swfobject.js"></script>
				<script type="text/javascript">
					
					// Flash support
					var flashver = swfobject.getFlashPlayerVersion();
					browserinfo.innerHTML += 'Flash version: ' + [flashver.major, flashver.minor, flashver.release].join('.') + '\n';
				</script>
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
