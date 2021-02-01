<?php


namespace WilokeCircleciTest;

use PHPUnit\Framework\TestCase;

class PostControllerTest extends CommonController
{
	protected function createApplicationPassword1()
	{
		$phpUnitTest = dirname(dirname(dirname(plugin_dir_path(__FILE__)))) . '/phpunit.xml';
		$content = file_get_contents($phpUnitTest);

		if (strpos($content, 'ADMIN_AUTH_PASS_VALUE') !== false) {
			$aResponse = \WP_Application_Passwords::create_new_application_password($this->getAdminId(), [
				'name' => 'My App'
			]);

			$content = str_replace('ADMIN_AUTH_PASS_VALUE', $aResponse[0], $content);
			file_put_contents($phpUnitTest, $content);
		}
	}

	public function testPosts()
	{
		if (method_exists($this, 'createApplicationPassword')) {
			$this->createApplicationPassword();
		} else {
			$this->createApplicationPassword1();
		}

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
