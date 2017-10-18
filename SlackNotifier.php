<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class Slack
{

	// for guzzle instance
    private $gclient_config = [
        'verify'          => false
    ];

    // for slack client
	private $slack_settings = [
		'channel' => '@amila3cs',
		'username' => 'Beira Group'
	];

	private $guzzle;

	private $channel;

	private $markdowntpl = 'templates/notification.md';

	const SLACK_ENDPOINT = 'https://hooks.slack.com/services/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';    

	public function __construct($config)
	{
		// new guzzle instance
		$this->guzzle = new Client($this->gclient_config);
	}

	public function sendAlert($msg)
	{
		// init slack client
		$slackclient = new Maknz\Slack\Client(SLACK_ENDPOINT, $this->slack_settings, $this->guzzle);


	}
}