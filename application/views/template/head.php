<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $this->lang->line('common_site_name'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/themes.css">
    <?php
        if(isset($extra_css)) {
            echo $extra_css;
        }
    ?>
</head>
<body>

    <!-- Preloader 
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    -->