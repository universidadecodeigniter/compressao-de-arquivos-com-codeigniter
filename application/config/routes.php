<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Base';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['comprimir-texto'] = "Base/ComprimirTexto";
$route['comprimir-arquivos'] = "Base/ComprimirArquivos";