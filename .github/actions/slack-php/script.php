<?php
require_once 'vendor/rmccue/requests/src/Autoload.php';
WpOrg\Requests\Autoload::register();

var_dump($argv);
var_dump($_ENV);

echo "::debug::Sending a request to slack\n";

$response = WpOrg\Requests\Requests::post(
  ($_ENV["secrets.SLACK_WEBHOOK"]) ? $_ENV["secrets.SLACK_WEBHOOK"] : 'https://httpbin.org/post',
  array(
    'Content-Type' => 'application/json'
  ),
  json_encode(array(
    // 'text' => 'Hello'
    'blocks' =>
    array(
      array(
        'type' => 'section',
        'text' => array(
          'type' => 'mrkdwn',
          'text' => 'Message',
        )
      ),
      array(
        'type' => 'section',
        'fields' => array(
          array(
            'type' => 'mrkdwn',
            'text' => '*Repository:*\nRepository',
          ),
          array(
            'type' => 'mrkdwn',
            'text' => '*Event:*\nEvent'
          ),
          array(
            'type' => 'mrkdwn',
            'text' => '*Ref:*\nRef'
          ),
          array(
            'type' => 'mrkdwn',
            'text' => '*SHA:*\nSHA'
          ),
        )
      )

    )
  ))

);

// var_dump($response);
echo "::group::Slack Response\n";
echo $response->body."\n";
echo "::endGroup::\n";

if (!$response->success) {
  echo $response->body;
  exit(1);
}
