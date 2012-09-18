<!DOCTYPE html>
<html>
	<head>
		<title>What is my browser version?</title>
		<meta name="og:title" content="What is my browser version?" />
		<meta name="og:description" content="This site has been created to help customer support determine your exact
			  browser and operating system for tracking down bugs." />
		<meta name="og:url" content="http://www.whatismybrowserversion.com/" />
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
				height:360px;
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
				height: 360px;
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
				<textarea id="browserinfo" readonly="readonly">
User Agent: <?php echo(htmlspecialchars($_SERVER['HTTP_USER_AGENT'])); ?>

IP address: <?php echo(htmlspecialchars($_SERVER['REMOTE_ADDR'])); ?>

Reverse DNS: <?php echo(htmlspecialchars(gethostbyaddr($_SERVER['REMOTE_ADDR']))); ?>

JavaScript enabled: no</textarea>
				<script type="text/javascript">
					var ipv4address = '';
					var ipv4reverse = '';
					var ipv6address = '';
					var ipv6reverse = '';
				</script>
				<script type="text/javascript" src="http://ipv4.whatismybrowserversion.com/getaddress.php"></script>
				<script type="text/javascript" src="http://ipv6.whatismybrowserversion.com/getaddress.php"></script>
				<script type="text/javascript">
					var browserinfo = document.getElementById('browserinfo');
					browserinfo.innerHTML = browserinfo.innerHTML.replace('JavaScript enabled: no', 'JavaScript enabled: yes');
					browserinfo.innerHTML += "\n";
					//Browser information
					browserinfo.innerHTML += 'navigator.appCodeName: ' + navigator.appCodeName + '\n';
					browserinfo.innerHTML += 'navigator.appName: ' + navigator.appName + '\n';
					browserinfo.innerHTML += 'navigator.appVersion: ' + navigator.appVersion + '\n';
					browserinfo.innerHTML += 'navigator.cookieEnabled: ' + (navigator.cookieEnabled ? "yes" : "no") + '\n';
					
					ipv6address = ipv6address === "" ? "N/A" : ipv6address;
					ipv6reverse = ipv6reverse === "" ? "N/A" : ipv6reverse;
					
					//Connectivity
					browserinfo.innerHTML += 'IPv4 address: ' + ipv4address + '\n';
					browserinfo.innerHTML += 'IPv4 reverse: ' + ipv4reverse + '\n';
					browserinfo.innerHTML += 'IPv6 address: ' + ipv6address + '\n';
					browserinfo.innerHTML += 'IPv6 reverse: ' + ipv6reverse + '\n';
					
					//Events support
					var events = new Array();
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
					var transitions = new Array();
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
					
					browserinfo.innerHTML = browserinfo.innerHTML.replace(/(\r\n|\r|\n)/g, '\r\n');
				</script>
			</div>
		</div>
		<h2>What is this site?</h2>
		<p>
			This site has been created to help customer support determine your exact browser and operating system for
			tracking down bugs. The information you see here is available to any website you visit. We do not store it
			for any length of time. Have an improvement? <a href="https://github.com/janoszen/whatismybrowserversion">Send a pull request on GitHub!</a></p>
		<script type="text/javascript">
			browserinfo.focus();
			browserinfo.select();
		</script>
		
		<br />
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=154616717984073";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-like" data-href="http://www.whatismybrowserversion.com/" data-send="false"
			 data-layout="button_count" data-width="150" data-show-faces="false" data-action="recommend"
			 data-font="verdana"></div>
		&nbsp;
		<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-34879614-1']);
			_gaq.push(['_setDomainName', 'whatismybrowserversion.com']);
			_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>
