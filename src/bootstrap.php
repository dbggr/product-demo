<?php
namespace ProgramData;

use Dotenv\Dotenv;
use ProgramData\Database\MySQLMock;


/** Short hand for Director Separator */
const DS = DIRECTORY_SEPARATOR;

/** Require Autoload for composer */
require_once(__DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php');

/** @var $config Initialize config variable for database details */
$dotEnv = new Dotenv(__DIR__ . DS . '..');
$dotEnv->load();


