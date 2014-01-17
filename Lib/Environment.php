<?php
/**
 * Environment Loader
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
if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
	include_once '53/Environment.php';
} else {
	include_once '52/Environment.php';
}
