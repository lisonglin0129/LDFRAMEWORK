<?php
	//require_once 'Autoloader.php';
	require "Worker.php";
	$ws_worker = new Worker("websocket://0.0.0.0:2346");

	$http_worker->count = 4;
	$ws_worker->onMessage = function($connection, $data)
	{
	    // 向客户端发送hello $data
	    $connection->send('hello ' . $data);
	};
	Worker::runAll();
	echo "cccccccccccccccccccccccc\n";
?>
