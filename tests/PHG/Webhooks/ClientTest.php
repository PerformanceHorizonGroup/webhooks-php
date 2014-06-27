<?php

namespace PHG\Webhooks;

class ClientTest extends \PHG\Webhooks\TestCase
{
	public function testConstructor()
	{
		new \PHG\Webhooks\Client('http://example.com');
	}
}