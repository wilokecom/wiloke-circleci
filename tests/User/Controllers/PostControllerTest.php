<?php


namespace WilokeCircleciTest;

use PHPUnit\Framework\TestCase;

class PostControllerTest extends CommonController
{
	public function testPosts() {
		$aResponse = $this->setUserLogin('admin')->restGET('posts');
		$this->assertNotEmpty($aResponse);
		foreach ($aResponse as $aPost) {
			$this->assertArrayHasKey('title', $aPost);
		}
	}
}
