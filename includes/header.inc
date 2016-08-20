<?php

function displayHeader(){
$headerInfo = '';
$headerInfo .= '<meta charset="utf-8" />';
$headerInfo .= '<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
$headerInfo .= '<meta name="viewport" content="width=device-width, initial-scale=1" />';
$headerInfo .= '<meta name="description" content=" RESTful Demo" />';
$headerInfo .= '<meta name="author" content="RKM" />';
$headerInfo .= "<title>".TITLE."</title>";
$headerInfo .="<link rel='icon' type='image/ico' href='favicon.ico' />";
$headerInfo .= '<!-- Bootstrap Core CSS -->';
$headerInfo .= '<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />';
 $headerInfo .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css">';

$headerInfo .= '<!-- Custom JQuery UI CSS -->';
$headerInfo .= '<link href="styles/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css" rel="stylesheet" />';
$headerInfo .= '<link href="styles/jquery-ui-1.11.4.custom/jquery-ui.structure.min.css" rel="stylesheet" />';

$headerInfo .= '<!-- Application CSS -->';
$headerInfo .= '<link href="styles/world_data.css" rel="stylesheet" />';
$headerInfo .= '<link href="styles/alpha_nav.css" rel="stylesheet" />';

$headerInfo .= '<!-- Webfonts and WebIcons -->';
$headerInfo .= "<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700italic' rel='stylesheet' type='text/css' />";
$headerInfo .= '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous" />';

$headerInfo .= '<!-- Custom CSS -->';
$headerInfo .= '<style>';
$headerInfo .= 'body { ';
$headerInfo .= 'padding-top: 70px;';
$headerInfo .= '/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */';
$headerInfo .= '}';
$headerInfo .= '</style>';
$headerInfo .= '<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->';
$headerInfo .= "<!-- WARNING: Respond.js doesn\'t work if you view the page via file:\/\/ -->";
$headerInfo .= '<!--[if lt IE 9]>';
$headerInfo .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
$headerInfo .= '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
$headerInfo .= '<![endif]-->';

 return $headerInfo;

 }