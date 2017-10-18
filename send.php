<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;

		// for guzzle instance
        $gclient_config = [
            'verify'          => false
        ];


        // for slack client
		$slack_settings = [
			'channel' => '@amila3cs',
			'username' => 'Beira Group'
		];

		define('SLACK_ENDPOINT', 'https://hooks.slack.com/services/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');


		// new guzzle instance
		$gclient = new Client($gclient_config);


		$slackclient = new Maknz\Slack\Client(SLACK_ENDPOINT, $slack_settings, $gclient);


		// prepare message
	      // prepare notification template
	      $slackmsg = file_get_contents('templates/notification.md');

	      $slackmsg = str_replace('{SITENAME}', 'beiragroup.lk', $slackmsg);
	      $slackmsg = str_replace('{NAME}', 'Amila', $slackmsg);
	      $slackmsg = str_replace('{EMAIL}', 'amila@3cs.asia', $slackmsg);
	      $slackmsg = str_replace('{MESSAGE}', 'This is a test message prepared with Markdown', $slackmsg);
	      $slackmsg = str_replace('{DATE}', date('Y-m-d'), $slackmsg);

		  $slackclient->send($slackmsg);