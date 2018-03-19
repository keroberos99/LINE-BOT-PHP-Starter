<?php

$access_token = 'iQBuKcmfUhRnDgHZhoybZW95LsfBJNHCDk4wuhdGpXGjIZjx/ueRDhLtC7FqGQsUueckkZp91NsjbebAaE/Fo2HRBDwhD+y0oWohu3NORp3vbupSocMrBFKqshSOojoK0lxh3jb/GzxA3G1RI7Qb/QdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {	
// Loop through each event
  
  
  foreach ($events['events'] as $event) {
    if(isset($event['replyToken'])) {
      
      $replyToken = $event['replyToken'];
      $messages = [
        'type' => 'text',
        'text' => "KeroBot ได้รับ $content"
      ];
      
      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        'replyToken' => $replyToken,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "";
      
    } else
    if(isset($event['source']['groupId'])) {
      
      $to = $event['source']['groupId'];
      $messages = [
        'type' => 'text',
        'text' => "KeroBot พบ $content"
      ];
      
      // Make a POST Request to Messaging API to push message
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $to,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "";
      
    }
  }
}
echo "OK";
