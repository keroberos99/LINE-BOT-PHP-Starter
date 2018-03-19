<?php
$access_token = 'iQBuKcmfUhRnDgHZhoybZW95LsfBJNHCDk4wuhdGpXGjIZjx/ueRDhLtC7FqGQsUueckkZp91NsjbebAaE/Fo2HRBDwhD+y0oWohu3NORp3vbupSocMrBFKqshSOojoK0lxh3jb/GzxA3G1RI7Qb/QdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v2/bot/message/multicast';
$headers = array('Content-Type: application/json');
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
$data = <<<EOD
{
    "to": ["1569143229"],
    "messages":[
        {
            "type":"text",
            "text":"Hello, world1"
        },
        {
            "type":"text",
            "text":"Hello, world2"
        }
    ]
}
EOD;

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);


$result = curl_exec($ch);
curl_close($ch);
echo $result;
