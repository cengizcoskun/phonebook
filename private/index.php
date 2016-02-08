#!/usr/bin/php
<?php
/**
 * index.php for CLI
 *
 * @package     base-app
 * @version     2.0
 */
error_reporting(E_ALL);
try {
    // Global translation function
    if (!function_exists('__')) {

        /**
         * Translate message
         *
         * @package     base-app
         * @version     2.0
         *
         * @param string $string string to translate
         * @param array $values replace substrings
         *
         * @return string translated string
         */
        function __($string, array $values = NULL)
        {
            return \Baseapp\Library\I18n::instance()->_($string, $values);
        }

    }

    if (!defined('ROOT_PATH')) {
        define('ROOT_PATH', dirname(__DIR__));
    }

    require_once ROOT_PATH . '/app/Bootstrap.php';
    require_once ROOT_PATH . '/app/Console.php';

    $console = new \Baseapp\Console(new \Phalcon\DI\FactoryDefault\CLI());
    $console->handle($argv);
} catch (\Phalcon\Exception $e) {
    \Baseapp\Console::exception($e);
} catch (\PDOException $e) {
    \Baseapp\Console::exception($e);
} catch (\Exception $e) {
    \Baseapp\Console::exception($e);
}