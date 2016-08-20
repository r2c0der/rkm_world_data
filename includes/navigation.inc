<?php

function displayTopNavigation(){
$top_navigation ='';
$top_navigation .='<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
$top_navigation .='<div class="container">';
$top_navigation .='<!-- Brand and toggle get grouped for better mobile display -->';
$top_navigation .='<div class="navbar-header">';
$top_navigation .='<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
$top_navigation .='<span class="sr-only">Toggle navigation</span>';
$top_navigation .='<span class="icon-bar"></span>';
$top_navigation .='<span class="icon-bar"></span>';
$top_navigation .='<span class="icon-bar"></span>';
$top_navigation .='</button>';
$top_navigation .='<a class="navbar-brand" href="index.php">World Data Demo</a>';
$top_navigation .='</div> <!-- Collect the nav links, forms, and other content for toggling -->';
$top_navigation .='<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
$top_navigation .='<ul class="nav navbar-nav">';
$top_navigation .='<li>';
$top_navigation .='<a href="pages/backstage.php">The Backend</a>';
$top_navigation .='</li>';
$top_navigation .='<li>';
$top_navigation .='<a href="#">Drupal Implementation</a>';
$top_navigation .='</li>';
$top_navigation .='</ul>';
$top_navigation .='</div> <!-- /.navbar-collapse -->';
$top_navigation .='</div><!-- /.container -->';
$top_navigation .='</nav><!-- / Navigation -->';

 return $top_navigation;

 }