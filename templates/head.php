<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- visit http://www.modernizr.com/ if you need to create a different custom build -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/modernizr.js"></script>
    <!-- please make a custom build of the font -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic" rel="stylesheet" type="text/css"  media="all"  />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <?php if(is_user_logged_in()): ?>
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style> .collapse { display: block !important; visibility: visible !important; } </style>
     <?php endif ?>
    <?php wp_head(); ?>
</head>