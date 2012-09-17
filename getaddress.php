<?php
header('Content-Type: text/javascript');
$hostname = explode('.', $_SERVER['HTTP_HOST']);
switch ($hostname[0]) {
	case 'ipv4':
		echo("ipv4address=" . json_encode($_SERVER['REMOTE_ADDR']) . ";\n");
		echo("ipv4reverse=" . json_encode(gethostbyaddr($_SERVER['REMOTE_ADDR'])) . ";\n");
		break;
	case 'ipv6':
		echo("ipv6address=" . json_encode($_SERVER['REMOTE_ADDR']) . ";\n");
		echo("ipv6reverse=" . json_encode(gethostbyaddr($_SERVER['REMOTE_ADDR'])) . ";\n");
		break;
}
