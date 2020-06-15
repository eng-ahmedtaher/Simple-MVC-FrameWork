<?php

	define("DS", DIRECTORY_SEPARATOR);
	define("ROOT_PATH", dirname(__DIR__));
	define("APP_PATH", ROOT_PATH . DS . "App" . DS);
	define("PUBLIC_PATH", ROOT_PATH . DS . "Public" . DS);
	define("CONFIG", APP_PATH . DS . "Config". DS);
	define("CONTROLLERS", APP_PATH . DS . "Controllers" . DS);
	define("CORE", APP_PATH . DS . "Core" . DS);
	define("MODELS", APP_PATH . DS . "Models" . DS);
	define("VIEWS", APP_PATH . DS . "Views" . DS);
	define("LIBS", APP_PATH . DS . "Libs" . DS);
	define("DB", LIBS . "DB" . DS);
	define("UPLOADS", PUBLIC_PATH . DS . "uploads" . DS);
	define("STYLE", PUBLIC_PATH . DS . "assets" . DS);

	require_once CONFIG . 'Config.php';
	require_once CONFIG . 'Helpers.php';

	$medules = [CONFIG, CONTROLLERS, CORE, MODELS, VIEWS, LIBS, DB];

	set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $medules));

	spl_autoload_register('spl_autoload', false);

	new App();