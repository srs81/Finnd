<?php
require 'Predis/Autoloader.php';
Predis\Autoloader::register();
$redis = new Predis\Client(array(
	array('host' => '127.0.0.1', 'port' => 6379)
));

$session = $_GET['session'];

if (isset($_POST['name']) && isset($_POST['latitude'])) {
	$name = $_POST['name'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$redis->hset($session, $name, $latitude . "," . $longitude);
	$redis->hset($session . "_timestamp", $name, time());
}

$times = $redis->hgetall($session . "_timestamp");
foreach ($times as $key=>$value) { 
	if (time() - $value > 100) { 
		$redis->hdel($session . "_timestamp", $key);
		$redis->hdel($session, $key);
	}
} 

echo json_encode ($redis->hgetall($session));
