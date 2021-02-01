<?php


namespace WilokeCircleciTest;

use PHPUnit\Framework\TestCase;

class PostControllerTest extends CommonController
{
	public function testPosts()
	{
		$this->createApplicationPassword();
		$aResponse = $this->setUserLogin('admin')->restPOST('posts', [
			'post_title' => 'Hello World'
		]);

		$this->assertEquals($aResponse['status'], 'success');
		$postId = $aResponse['id'];

		$aResponse = $this->setUserLogin('admin')->restGET('posts');
		$this->assertNotEmpty($aResponse);
		foreach ($aResponse as $aPost) {
			$this->assertArrayHasKey('title', $aPost);
		}
	}
}
