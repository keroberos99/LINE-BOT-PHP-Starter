<?php
$access_token = 'iQBuKcmfUhRnDgHZhoybZW95LsfBJNHCDk4wuhdGpXGjIZjx/ueRDhLtC7FqGQsUueckkZp91NsjbebAaE/Fo2HRBDwhD+y0oWohu3NORp3vbupSocMrBFKqshSOojoK0lxh3jb/GzxA3G1RI7Qb/QdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
