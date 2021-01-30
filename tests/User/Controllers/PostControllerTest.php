<?php


namespace WilokeCircleciTest;

use PHPUnit\Framework\TestCase;

class PostControllerTest extends TestCase
{
	use HTTP;
	public function testPosts() {
		var_export(function_exists('get_current_user_id'));die;
		// $aResponse = $this->setUserLogin('admin')->restGET('posts');
		// $this->assertNotEmpty($aResponse);
		// foreach ($aResponse as $aPost) {
		// 	$this->assertArrayHasKey('title', $aPost);
		// }
	}
}
