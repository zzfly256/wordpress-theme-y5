<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (is_home()||is_search()) { bloginfo('name');print " | "; bloginfo('description');  } else { wp_title(''); print " - "; bloginfo('name'); } ?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <div class="card-body">
                        <li><a href="#">运行环境</a></li>
                        <li><a href="#">性能监控</a></li>
                        <li><a href="#">网站列表</a></li>
                        <li><a href="#">数据库</a></li>
                        <li><a href="#">FTP 管理</a></li>
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
                    <div class="card-body">
                        <li><a href="#">管理员</a></li>
                        <li><a href="#">面板设置</a></li>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <div id="main">
        <nav class="menu">
            <li><a href="">主页</a></li>

            <form action="/" method="get">
                <input type="text" name="s" placeholder="全站搜索" class="search">
            </form>
        </nav>