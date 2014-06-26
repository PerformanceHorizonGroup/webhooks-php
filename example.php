<?php

require __DIR__ . '/vendor/autoload.php';

$webhooks = new \PHG\Webhooks\Client('http://localhost:9001');
$response = $webhooks->push('gitlab', 'push', array('some', 'commits'));

if ($response) {
	echo 'Yay';
} else {
	echo 'Boo :(';
}