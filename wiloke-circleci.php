<?php
/**
 * Plugin Name: Wiloke Circleci
 * Plugin URI: https://wiloke.com
 * Author: Wiloke
 * Author URI: https://wiloke.com
 * Description: Integrating Circle Ci to WP
 * Author: 1.0
 */

use WilokeCircleci\User\Controllers\ApplicationPassword;
use WilokeCircleci\User\Controllers\PostController;

require_once plugin_dir_path(__FILE__) . "vendor/autoload.php";

new PostController;
//new ApplicationPassword;
