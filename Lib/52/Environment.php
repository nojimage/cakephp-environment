<?php
/**
 * Environment Loader for PHP 5.2+
 *
 * for CakePHP 2.0+
 * PHP version 5.2+
 *
 * Copyright 2014, ELASTIC Consultants Inc. (http://elasticconsultants.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @version    1.0
 * @author     nojimage <nojima at elasticconsultants.com>
 * @copyright  2014, ELASTIC Consultants Inc.
 * @link       http://elasticconsultants.com
 * @since      Environment 1.0
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 **/
class Environment {

	/**
	 * 環境設定
	 *
	 * @param array $environments 環境設定の読み込み順
	 * @return string 環境文字列
	 */
	public static function load($environments = array('development', 'staging', 'production')) {
		foreach ($environments as $env) {
			if (!is_file(self::getEnvDir() . $env)) {
				continue;
			}
			Configure::write('env', $env);
			break;
		}
		if (!Configure::read('env')) {
			// 読み出しができない場合は読み込み順の1番目を環境として返す
			Configure::write('env', $environments[0]);
		}

		// bootstrapの読み込み
		self::bootstrap();
		return Configure::read('env');
	}

	/**
	 * 環境別のファイルの読み込み
	 * 
	 * @param string $file load file name
	 * @return bool
	 */
	public static function bootstrap() {
		return self::readEnvFile('bootstrap.php');
	}

	/**
	 * 環境別のファイルの読み込み
	 * 
	 * @param string $file load file name
	 * @return bool
	 */
	public static function readEnvFile($file = 'bootstrap.php') {
		$path = self::getConfigDir() . self::getEnv() . DS . $file;
		if (is_file($path)) {
			return include_once $path;
		}
		return false;
	}

	/**
	 *
	 * @return string
	 */
	public static function getEnv() {
		return Configure::read('env');
	}

	/**
	 *
	 * @return string
	 */
	public static function getEnvDir() {
		return self::getConfigDir() . 'env' . DS;
	}

	/**
	 *
	 * @return string
	 */
	public static function getConfigDir() {
		return APP . 'Config' . DS;
	}

}
