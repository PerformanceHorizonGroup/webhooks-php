<?php

namespace PHG\Webhooks;

use Curl\Curl;

class Client
{
	/**
	 * Url to our webhooks install
	 * @var string
	 */
	private $url = null;

	/**
	 * @param string $url
	 */
	public function __construct($url)
	{
		$this->url = $url;
	}

	/**
	 * Send a request to webhooks
	 * @param  string $consumer
	 * @param  string $action
	 * @param  array  $data
	 * @return boolean Success or not?
	 */
	public function push($consumer, $action, array $data = array())
	{
		$url = sprintf(
			'%s/%s-%s',
			$this->url,
			$consumer,
			$action
		);

		return $this->post($url, $data);
	}

	/**
	 * Do the actual sending of the request
	 * @param  string $url
	 * @param  array  $data
	 * @return boolean Success or not?
	 */
	private function post($url, array $data = array())
	{
		$request = new Curl();
		$request->post($url, $data);
		return ! $request->http_error;
	}
}