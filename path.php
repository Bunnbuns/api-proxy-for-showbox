<?php
//get params and skip the first one
$exploded = array();
parse_str($_SERVER['QUERY_STRING'], $exploded);
array_shift($exploded);
$params = http_build_query($exploded);
//cURL the domain with params
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'http://sbrapi.cc/'.$_GET['path'].'?'.$params);
curl_setopt($ch,CURLOPT_USERAGENT,'Show Box');
$result = curl_exec($ch);
curl_close($ch);

//header('Content-Type: application/json');
echo $result;
?>