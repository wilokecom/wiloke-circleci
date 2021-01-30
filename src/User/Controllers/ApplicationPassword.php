<?php


namespace WilokeCircleci\User\Controllers;


class ApplicationPassword
{
	public function __construct()
	{
//		add_action('init', [$this, 'createPassword']);
	}

	public function createPassword()
	{
		$oUser = get_user_by('login', 'admin');
//		array ( 0 => 'XGFeh9nBHStWYXNeamU2VK9B', 1 => array ( 'uuid' => '8a4d46d7-9e63-43e5-b634-ef379446e3f8', 'app_id' => '', 'name' => 'My App', 'password' => '$P$BTP6HgWJLviMdIfXTiUdkz3qbutftS.', 'created' => 1612001337, 'last_used' => NULL, 'last_ip' => NULL, ), )
		$aResponse = \WP_Application_Passwords::create_new_application_password($oUser->ID, [
			'name'    => 'My App'
		]);
	}
}
