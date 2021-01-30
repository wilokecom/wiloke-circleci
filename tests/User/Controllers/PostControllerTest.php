<?php


namespace WilokeCircleciTest;


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
