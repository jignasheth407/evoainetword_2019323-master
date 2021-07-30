<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
define('ADMIN_EMAIL', 'info@evoai.network');
/*
|--------------------------------------------------------------------------
| Currency Constant
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

/* Tech */
//define('reCaptcha_sitekey','6LfjZXwUAAAAAJ-tRZlFl5eqRPtPNEDesJ6JWGf2');
//define('reCaptcha_secret','6LfjZXwUAAAAAEUXlLB-DO1hmQoMBf8TaUuoDdz-');

/* Network */
define('reCaptcha_sitekey', '6Lc__G0UAAAAAGFydtzm1-G7wyYg8i2m33WQoPNu');
define('reCaptcha_secret', '6Lc__G0UAAAAAAQ42PMxiWk1KOsKq67yKWKt3uKj');

define('T_name', '0x5824d62f4f3c875c906f4e16d488bed05a87a2ea');
define('t_image', 'nQR-img.jpg');

/* End of file constants.php */
/* Location: ./application/config/constants.php */
