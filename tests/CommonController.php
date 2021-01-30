<?php

namespace WilokeCircleciTest;


use PHPUnit\Framework\TestCase;
use ReflectionClass;

class CommonController extends TestCase
{
	use HTTP;

	public function createApplicationPassword()
	{
		$phpUnitTest = dirname(plugin_dir_path(__FILE__)) . '/phpunit.xml';
		$content = file_get_contents($phpUnitTest);

		if (strpos($content, 'ADMIN_AUTH_PASS_VALUE') !== false) {
			$aResponse = \WP_Application_Passwords::create_new_application_password($this->getAdminId(), [
				'name' => 'My App'
			]);

			$content = str_replace('ADMIN_AUTH_PASS_VALUE', $aResponse[0], $content);
			file_put_contents($phpUnitTest, $content);
		}
	}

	public function setUp()
	{
		parent::setUp(); // TODO: Change the autogenerated stub

		$this->configureAPI();
		$this->createApplicationPassword();
	}

	/**
	 * @param $object
	 * @param $methodName
	 * @param array $aParams
	 * @return mixed
	 * @throws \ReflectionException
	 */
	public function invokeMethod($object, $methodName, array $aParams = [])
	{
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, $aParams);
	}

	public function setPrivateProperty($object, $propertyName, $params)
	{
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getProperty($propertyName);
		$method->setAccessible(true);

		$method->setValue($object, $params);
	}

	public function getPrivateProperty($object, $propertyName)
	{
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getProperty($propertyName);
		$method->setAccessible(true);

		return $method->getValue($object);
	}
}
