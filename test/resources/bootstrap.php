<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// PHPUnit takes its global-state snapshot after loading this bootstrap file.
// Define the socket and clock mock state here so backupGlobals can restore it
// between tests instead of removing globals declared later by test files.
$mockTime = false;
$mockTimeCount = false;
$mockTimeReturn = false;
$mock_stream_socket_client = false;
$mock_stream_socket_timeout = null;
$mock_stream_set_blocking = false;
$mockFwrite = false;
$mockFwriteReturn = false;
$mockFwriteCount = 0;
$mockFgets = false;
$mockFgetsCount = 0;
$mockFreadReturn = false;
$standardAMIStart = array(
    'Asterisk Call Manager/1.1',
    'Response: Success',
    'ActionID: 1432.123',
    'Message: Authentication accepted',
    '',
    'Response: Goodbye',
    'ActionID: 1432.123',
    'Message: Thanks for all the fish.',
    ''
);
$standardAMIStartBadLogin = array(
    'Asterisk Call Manager/1.1',
    'Response: Error',
    'Message: Authentication accepted',
    ''
);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(__DIR__ . "/.."));
}
if (!defined('TMPDIR')) {
    define('TMPDIR', '/tmp');
}
require_once implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "..", "vendor", "autoload.php"
));
