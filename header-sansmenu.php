<!DOCTYPE html>

<html <?php language_attributes(  ); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- NOTE : Commenter  ou retirer après avoir ajouté support de title-tag
    <title><?php bloginfo( 'title' ) ?></title>
-->

    <!-- action hooks : Placeholders where code is dynamically added to a theme -->
    <?php wp_head(  ); ?>

</head>

<!-- body_class : series of classes that are applied to the HTML body element -->
<body <?php body_class(  ); ?>>

<!-- wp_body_open() gives you the capability of running custom code directly after 
the opening <body> tag of your WordPress Theme.  (functions.php) -->
<?php  wp_body_open(  ); ?>

    <header class="v-aligne">
        <div class="conteneur flex space-between">
            <section>
                <h1 class="titre-principal"><a href="<?php echo esc_url(home_url('/')); ?>"> <?php bloginfo( 'name' ) ?></a></h1>
                <div class="slogan"><?php bloginfo( 'description' ) ?></div>
            </section>
            <nav class="flex v-aligne">
                <ul class="menu flex">
                    <li><a href="#" class="btn">Accueil</a></li>
                    <li><a href="#" class="btn">À propos</a></li>
                    <li><a href="#" class="btn">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="conteneur">