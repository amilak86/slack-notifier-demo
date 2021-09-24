<?php 
require 'vendor/autoload.php';
require 'config.php';
require 'src/SlackNotifier.php';

try {

	$message = [
		'name' => 'Your Name',
		'email' => 'Your Email',
		'message' => 'Your message description...',
	];

	SlackNotifier::SendAlert($message);

} catch (Exception $e) {
	echo 'Error: ' . $e->getMessage();
	exit;
}
?>
