<?php
require_once('HTTP/OAuth/Consumer.php');
require_once('twitteroauth.php');
//TODO:registration, callbackを作る
//TODO:singletonをやめる
class TwitterAccess {
	private static $instance;
	private $oauth;
	private $twitteroauth;

	private function __construct ($con_key, $con_sec, $a_token, $a_token_secret) {
		if (empty($this->oauth)) {
			$this->oauth = new HTTP_OAuth_Consumer($con_key, $con_sec);
			$http_request = new HTTP_Request2();
			$http_request->setConfig('ssl_verify_peer', false);
			$consumer_request = new HTTP_OAuth_Consumer_Request;
			$consumer_request->accept($http_request);
			$this->oauth->accept($consumer_request);
			$this->oauth->setToken($a_token);
			$this->oauth->setTokenSecret($a_token_secret);
			$this->twitteroauth = new TwitterOAuth($con_key, $con_sec, $a_token, $a_token_secret);
		}
	}
	public function getInstance ($con_key, $con_sec, $a_token, $a_token_secret) {
		if (!isset(self::$instance)) {
			self::$instance = new TwitterAccess($con_key, $con_sec, $a_token, $a_token_secret);
		}
		return self::$instance;
	}
	public function postApi ($api_url, $params) {
		if (!is_array($params) || empty($this->oauth)) {
			return false;
		}
		return $this->oauth->sendRequest($api_url, $params, 'POST');
	}
	public function getApi ($api_url, $params) {
		//Consumerの方だとなぜかGET系が使えないので
		//基本的にjsonでいいや
		if (!is_array($params) || empty($this->twitteroauth)) {
			return false;
		}
		$this->twitteroauth->format = "json";
		$req = $this->twitteroauth->OAuthRequest($api_url, 'GET', $params);
		return json_decode($req, true);
	}
	public function registration () {
		//初回呼び出し時
		$this->oauth->getRequestToken('https://twitter.com/oauth/request_token', CALLBACK);
		$_SESSION['request_token'] = $this->oauth->getToken();
		$_SESSION['request_token_secret'] = $this->oauth->getTokenSecret();
		$request_link = $this->oauth->getAuthorizeURL('https://twitter.com/oauth/authorize');
		return $request_link;
	}
	public function callback () {
		//コールバック時
		if ($_SESSION['request_token'] || $_SESSION['request_token_secret']) {
			$this->oauth->setToken($_SESSION['request_token']);
			$this->oauth->setTokenSecret($_SESSION['request_token_secret']);
			$this->oauth->getAccessToken('https://twitter.com/oauth/access_token', $oauth_verifier);
			$access_token = $this->oauth->getToken();
			$secret_access_token = $this->oauth->getTokenSecret();
			$oauth = TwitterAccess::getInstance(CON_KEY, CON_SEC, $access_token, $secret_access_token);
			$user_info = $oauth->getApi($this->api_url['account_credit'], array());
			$_SESSION['screen_name'] = $user_info['screen_name'];
			$_SESSION['access_token'] = $access_token;
			$_SESSION['secret_access_token'] = $secret_access_token;
		}
	}
}
