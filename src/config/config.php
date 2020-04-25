<?php


date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');

// Pastas
define('MODEL_PATH', realPath(dirName(__FILE__) . '/../models'));
define('VIEW_PATH', realPath(dirName(__FILE__) . '/../views'));
define('CONTROLLER_PATH', realPath(dirName(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realPath(dirName(__FILE__) . '/../exceptions'));
define('TEMPLATE_PATH', realPath(dirName(__FILE__) . '/../views/template'));

// Arquivos
require_once(realPath(dirName(__FILE__) . '/database.php'));
require_once(realPath(dirName(__FILE__) . '/loader.php'));
require_once(realPath(MODEL_PATH . '/Model.php'));
require_once(realPath(EXCEPTION_PATH . '/AppException.php'));
require_once(realPath(EXCEPTION_PATH . '/ValidationException.php'));
