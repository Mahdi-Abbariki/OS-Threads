<?php
include "autoloader.php";
error_reporting(E_ALL);

use Classes\FileReaderThread;
use Classes\Helper;

$args = json_decode(file_get_contents('Config.json'));
$grammars = Helper::makeTheGrammarArray($args->grammar);

$thread = New FileReaderThread($args->filePath,$grammars,0,20);
