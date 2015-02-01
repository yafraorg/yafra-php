<?php
/**
 * Created by PhpStorm.
 * User: mwn
 * Date: 18/11/14
 * Time: 21:58
 */
use GuzzleHttp\Client;


class testRemoteApi extends PHPUnit_Framework_TestCase {

	public function testRemoteApi()
	{
		$client = new Client();

		$res = $client->get('http://app.maertplatz-clique.ch/v1/programa');
		$this->assertEquals('200', $res->getStatusCode());
		//print_r($res->getStatusCode());

		try{
			$res = $client->get('http://app.maertplatz-clique.ch/v1/blabla');
			$this->fail("Expected exception not thrown");
		}catch(Exception $e){
			//print_r($e->getCode());
			$this->assertEquals("404",$e->getCode());
		}
	}
}
?>