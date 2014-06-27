<?php

namespace PHG\Webhooks;

class ClientTest extends \PHG\Webhooks\TestCase
{
	public function testConstructor()
	{
		new \PHG\Webhooks\Client('http://example.com');
	}

	public function testPush()
	{
		$consumer = 'testing';
		$action = 'test';
		$data = array(1,2,3,4);

		$client = \Mockery::mock('\PHG\Webhooks\Client[post]', array('http://example.com'))
			->shouldReceive('post')
			->once()
			->with($consumer . '-' . $action, $data)
			->mock();

		$client->push($consumer, $action, $data);
	}
}