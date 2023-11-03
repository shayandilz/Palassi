<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Navbar STart -->
<header class="justify-content-between d-inline-flex align-items-center position-fixed top-0 w-100 z-top bg-dark px-lg-5 px-1 py-1">
    <?php
    get_template_part('template-parts/layout/header/index');
    ?>
</header>

<main>




