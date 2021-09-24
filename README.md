# PHP Slack Notifier

This is a demo project on how to consume webhooks to send notifications to slack by using PHP.

## Dependencies
- [Slack for PHP](https://github.com/maknz/slack)
- [Guzzle](https://github.com/guzzle/guzzle)
- [Bootstrap](https://getbootstrap.com/)

## Directory Structure

- **src/SlackNotifier.php** is the class which is responsible for compiling and sending out the slack notification
- **src/templates/notification.md** is the markdown template which is contains the notification message contents
- **config.sample.php** contains boilerplate configuration for the script execution
- **example.php** is the main script that you load in your browser to submit information and generate a slack notification

## How to Run
- Sign-up with [Slack](https://slack.com). Log into your account and create a new webhook. If you don't know how to get started with slack webhooks, please refer to [Incoming webhooks for Slack](https://slack.com/intl/en-lk/help/articles/115005265063-Incoming-webhooks-for-Slack)
- Clone this repository to your local computer
- Move the clonned directory into your local web server's (Apache/Nginx/XAMPP/WAMP) document root 
- Change the directory to the clonned repository. Run ``composer install` to install dependencies. You must have **composer** installed in your computer
- Create a new script called config.php, copy the contents of config.sample.php to the newly created config.php
- Replace **channel** with your slack channel name and **endpoint** value with your slack webhook URL. [Slack for PHP](https://github.com/maknz/slack) documents few more additional configuration options that you can use to customize your notification behavior.
- Load example.php with your browser. i.e. `http://localhost/slacknotifier/example.php`. Fill and submit the form. If the webhook is properly configured, you should see your notification in Slack!

## License

[MIT](./LICENSE)

## Author

[Amila Kalansooriya](https://www.linkedin.com/in/amilakalansooriya/)