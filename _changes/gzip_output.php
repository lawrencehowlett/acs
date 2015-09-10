<?php

$FilePath = $_GET['uri'];

$FilePartsArray =  explode( '.', $FilePath );
$FilePathExtension = strtolower( end( $FilePartsArray ) );

$FileContent = file_get_contents( $FilePath );

if ( function_exists('ob_gzhandler') ) ob_start("ob_gzhandler");
if ( function_exists("ob_gzhandler_no_errors") ) ob_start();

if ( $FilePathExtension == 'css' ) { header('Content-type: text/css; charset=utf-8');  }
if ( $FilePathExtension == 'js' ) { header('Content-type: text/javascript; charset=UTF-8');  }
if ( $FilePathExtension == 'svg' ) { header('Content-type: svg+xml');  }


echo $FileContent;