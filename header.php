<?php
$isPjax = strpos($_SERVER['REQUEST_URI'], '?_pjax=%23main') !== false;
    // 划分请求，非 pjax 请求则加载完整头部和左侧菜单栏信息
    if (!$isPjax):
?>
<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (is_home()||is_search()) { bloginfo('name');print " | "; bloginfo('description');  } else { wp_title(''); print " - "; bloginfo('name'); } ?> </title>
    <link href="//lib.baomitu.com/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//lib.baomitu.com/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css">
</head>
<body class="container">

<div class="row">
    <header>
        <h2><?php bloginfo('name'); ?></h2>

        <img src="<?php bloginfo('template_directory'); ?>/image/logo.jpg" alt="By烟花易冷" class="logo">

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            分类
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" data-pjax>
                        <?php
                        if (function_exists('wp_nav_menu')) {
                            $wp_nav_menu_out = wp_nav_menu(array('theme_location'=>'category_nav_menu', 'container'=>false, 'echo'=>false));
                            echo preg_replace(array('#^<ul[^>]*>#', '#</ul>$#'), '', $wp_nav_menu_out);
                        } else {

                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            关于
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body" data-pjax>
                        <?php
                        if (function_exists('wp_nav_menu')) {
                            $wp_nav_menu_out = wp_nav_menu(array('theme_location'=>'about_nav_menu', 'container'=>false, 'echo'=>false));
                            echo preg_replace(array('#^<ul[^>]*>#', '#</ul>$#'), '', $wp_nav_menu_out);
                        } else {

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <?php else: ?>
        <title><?php if (is_home()||is_search()) { bloginfo('name');print " | "; bloginfo('description');  } else { wp_title(''); print " - "; bloginfo('name'); } ?> </title>
    <?php endif;?>
    <div id="loading"></div>
    <div id="main" class="animated fadeInUp faster">
        <nav class="menu">
            <?php if (function_exists('getBreadcrumbs')){getBreadcrumbs(); } ?>

            <form action="/" method="get">
                <input type="text" name="s" placeholder="全站搜索" class="search">
            </form>
        </nav>
