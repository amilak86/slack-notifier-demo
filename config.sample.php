<?php

	$config = [
		'guzzle' => [
			'verify' => false,
		],
		'slack' => [
			'client_config' => [
				'channel' => '',
				'username' => '',
				'icon' => '',
				'link_names' => false,
				'unfurl_links' => false,
				'unfurl_media' => true,
				'allow_markdown' => true,
				'markdown_in_attachments' => []
			],

			'endpoint' => 'https://hooks.slack.com/services/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',
		],
		'notification_template' => 'templates/notification.md',
	];
