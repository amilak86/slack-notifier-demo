<?php
use GuzzleHttp\Client as GuzzleHttpClient;
use Maknz\Slack\Client as SlackClient;

class SlackNotifier
{
	public static function SendAlert($msg)
	{
		global $config;

		$guzzle = new GuzzleHttpClient($config['guzzle']);

		$slack = new SlackClient($config['slack']['endpoint'], $config['slack']['client_config'], $guzzle);

      	$slack_msg = self::CompileMsgTemplate($msg);

      	if(!$slack_msg) 
      	{
      		throw new Exception('Error compiling message!');
      	}

      	$slack->send($slack_msg);
	}

	private static function CompileMsgTemplate($msgarr)
	{
		global $config;

		$notif_tpl = file_get_contents(realpath($config['notification_template']));

		$matches = [];

		preg_match_all('/{{([a-zA-Z_]+)}}/', $notif_tpl, $matches, PREG_PATTERN_ORDER);

		if(isset($matches[1]) && count($matches) > 0)
		{
			foreach($matches[1] as $v)
			{
				if(array_key_exists(strtolower($v), $msgarr))
				{
					$notif_tpl = str_replace('{{'.$v.'}}', $msgarr[strtolower($v)], $notif_tpl);
				}
				else
				{
					return false;
				}
			}
		}
		else
		{
			return false;
		}

		return $notif_tpl;
	}

}
