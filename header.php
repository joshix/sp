<!DOCTYPE html>
<html lang="<?php Options::out( 'locale' ); ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php $theme->title(); ?></title>
	<meta name="generator" content="Habari">	
	<link rel="edit" type="application/atom+xml" title="Atom Publishing Protocol" href="<?php URL::out( 'atompub_servicedocument' ); ?>">
	<link rel="alternate" type="application/atom+xml" title="Atom" href="<?php $theme->feed_alternate(); ?>">
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php URL::out( 'rsd' ); ?>">
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php Site::out_url( 'theme' ); ?>/boilerplate/boilerplate.css">
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php Site::out_url( 'theme' ); ?>/style.css" title="sp">
	<link rel="stylesheet" type="text/css" media="print" href="<?php Site::out_url( 'theme' ); ?>/print.css">
	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" media="screen, projection" href="<?php Site::out_url( 'theme'); ?>/boilerplate/ie6.css"><![endif]-->
	<link rel="Shortcut Icon" href="<?php Site::out_url( 'theme' ); ?>/favicon.ico">
	<?php $theme->header(); ?>
</head>
<body>
	<div id="wrapper" class="container">
		<div id="header">
				<h1 id="site-name"><a href="<?php Site::out_url( 'habari'); ?>/" title="<?php Options::out( 'title' ); ?>" rel="home"><?php Options::out( 'title' ); ?></a></h1>
				<h2 id="tagline"><em><?php Options::out( 'tagline' ); ?></em></h2>
		</div><!--#header-->
