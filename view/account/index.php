<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=431, height=device-height, initial-scale=1">
        <title>Mairie de Bègles | Accueil</title>
    	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="../dist/font-awesome-4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" type="text/css" href="../dist/css/myStyle.css"/>
    	<link rel="stylesheet" type="text/css" href="../dist/css/forum.css"/>
        <style media="screen">
            .nav-side-menu {
                overflow: auto;
                font-family: verdana;
                font-size: 35px;
                font-weight: 200;
                background-color: #1a3ec1;
                position: fixed;
                top: 93px;
                width: 350px;
                height: 100%;
                color: #e1ffff;
            }

            .container-fluid .toggle-btn {
                display: none;
            }
            .nav-side-menu ul,
            .nav-side-menu li {
                list-style: none;
                padding: 0px;
                margin: 0px;
                line-height: 35px;
                cursor: pointer;
            }
            .nav-side-menu ul :not(collapsed) .arrow:before,
            .nav-side-menu li :not(collapsed) .arrow:before {
                margin-top: 0px;
                font-family: FontAwesome;
                content: "\f078";
                display: inline-block;
                padding-left: 10px;
                padding-right: 10px;
                vertical-align: middle;
                float: right;
            }
            .nav-side-menu ul .active,
            .nav-side-menu li .active {
                border-left: 7px solid #d19b3d;
                /*background-color: #1a29d8;*/
            }
            .nav-side-menu ul .sub-menu li.active,
            .nav-side-menu li .sub-menu li.active {
                color: #d19b3d;
            }
            .nav-side-menu ul .sub-menu li.active a,
            .nav-side-menu li .sub-menu li.active a {
                color: #d19b3d;
            }
            .nav-side-menu ul .sub-menu li,
            .nav-side-menu li .sub-menu li {
                background-color: #181c20;
                border: none;
                line-height: 28px;
                border-bottom: 1px solid #23282e;
                margin-left: 0px;
            }
            .nav-side-menu ul .sub-menu li:hover,
            .nav-side-menu li .sub-menu li:hover {
                background-color: #020203;
            }
            .nav-side-menu ul .sub-menu li:before,
            .nav-side-menu li .sub-menu li:before {
                font-family: FontAwesome;
                content: "\f105";
                display: inline-block;
                padding-left: 10px;
                padding-right: 10px;
                vertical-align: middle;
            }
            .nav-side-menu li {
                padding-top: 15px;
                padding-bottom: 15px;
                padding-left: 0px;
                border-left: 7px solid #1a3ec1;
                border-bottom: 1px solid #23282e;
            }
            .nav-side-menu li a {
                text-decoration: none;
                color: #fff;
            }
            .nav-side-menu li a i {
                margin-right: 40px;
                padding-left: 10px;
                width: 20px;
                padding-right: 20px;
            }
            .nav-side-menu li:hover {
                border-left: 7px solid #d19b3d;
                /*background-color: #d19b3d;*/
                /*-webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                -ms-transition: all 1s ease;
                transition: all 1s ease;*/
            }
            @media (min-width: 767px) {
                .nav-side-menu .menu-list .menu-content {
                    display: block;
                    /* dropdown infos */
                }
            }
            body {
                margin: 0px;
                padding: 0px;
            }

            @media (min-width: 1748px) {
                .container {
                    margin-left: 350px; width: 80%;
                }
            }

            @media (min-width: 1695px) and (max-width: 1747px) {
                .container {
                    margin-left: 350px; width: 78%;
                }
            }

            @media (min-width: 1459px) and (max-width: 1694px) {
                .container {
                    margin-left: 350px; width: 76%;
                }
            }

            @media (min-width: 1252px) and (max-width: 1458px) {
                .container {
                    margin-left: 350px; width: 72%;
                }
            }

            @media (min-width: 1093px) and (max-width: 1251px) {
                .container {
                    margin-left: 350px; width: 68%;
                }
            }

            @media (min-width: 972px) and (max-width: 1092px) {
                .container {
                    margin-left: 350px; width: 64%;
                }
            }

            @media (min-width: 875px) and (max-width: 971px) {
                .container {
                    margin-left: 350px; width: 60%;
                }
            }

            @media (min-width: 796px) and (max-width: 874px) {
                .container {
                    margin-left: 350px; width: 56%;
                }
            }

            @media (min-width: 768px) and (max-width: 795px) {
                .container {
                    margin-left: 350px; width: 52%;
                    /*margin-right: 0px;*/
                }
            }

            @media (max-width: 767px) {
                .container {
                    margin-left: 0px; /*width: 100%;*/
                }
            }

            #search {
                width: 265px;
                box-sizing: border-box;
                border: 1px solid #1a3ec1;
                border-radius: 4px 0px 0px 4px;
                font-size: 30px;
                background-color: white;
                /*background-image: url('searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;*/
                padding: 12px 20px 12px 40px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
                /**/
                /*margin-right: auto;*/
                float: right;
            }

            #search:focus {
                width: 80%;
            }

            .formSearch {
                width: 100%;
                margin-bottom: 0px;
                padding-top: 0px;
                padding-bottom: 0px;
                margin-bottom: 7px;
            }

             .divSearch {
                 margin-top: 15px;
                 margin-bottom: 7px;
             }

            #btnSearch {
                background-color: #1a3ec1;
                color: #fff;
                border: 1px solid #1a3ec1;
                border-left: 0px;
                font-size: 30px;
                padding-top: 12px;
                padding-bottom: 12px;
            }

            /* Toggle dropdown image*/
            .dropdown-img {
                width: 47px;
                padding: 0px;
            }

            .btn-log-out {
            	background-color: #fff;
                border: 1px solid #1a3ec1;
            	color: #1a3ec1;
                padding-left: 20px;
                padding-right: 25px;
                width: 315px;
                /*height: 25%;*/
                padding-bottom: 7px;
                padding-top: 7px;
            	font-size: 35px;
                margin-top: 15px;
                cursor: pointer;
            }
            .btn-log-out:hover {
            	background-color: #1a3ec1;
            	color: #fff;
            }

            .toggle-btn-log-out {

                display: none;
            }

            @media (max-width: 1050px) {
                #search:focus {
                    width: 60%;
                }
            }
            @media (max-width: 767px) {
                 .nav-side-menu {
                     top: 60px;
                     position: relative;
                     width: 100%;
                     margin-bottom: 10px;
                 }

                .navbar-default .navbar-toggle {
                    border: 1px solid #1a3ec1;
                    padding-bottom: 7px;
                    padding-top: 7px;
                    position: absolute;
                    right: -45px;
                    top: 7px;

                    /* dropdown info */
                }

                .navbar-default .navbar-toggle .icon-bar {
                    background-color: #1a3ec1;
                    width: 25px;
                    height: 4px;
                }

                 /*****************************************/
                 .divSearch {
                     margin-right: 15px;;
                     margin-left: auto;
                     width: 55%;
                 }

                 #search {
                     width: 100%;
                     font-size: 20px;
                     padding: 4px 0px 3px 0px;
                 }

                 #search:focus {
                     width: 195%;
                 }

                 #btnSearch {
                     font-size: 21px;
                     padding-top: 5px;
                     padding-bottom: 0px;
                 }

                 .btn-log-out{
                     display: none;
                 }

                 .toggle-btn-log-out {
                 	background-color: #fff;
                    border: 1px solid #1a3ec1;
                 	color: #1a3ec1;
                    width: 50px;
                    padding-bottom: 1px;
                    padding-top: 5px;
                	font-size: 20px;
                    margin-top: 15px;
                    display: block;
                    cursor: pointer;
                    position: absolute;
                    text-align: center;
                 }

             }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header col-xs-2">
                    <a class="btn btn-default toggle-btn-log-out" href="#"><span class="glyphicon glyphicon-log-out"></span></a>
                    <a class="btn btn-default btn-log-out" href="#"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
                    <!-- <img src="../img/logo.jpg" alt="Logo de la mairie de Bègles" class="logo"> -->
                </div>
                <div class="col-xs-10">
                    <form class="formSearch" action="#" method="post">
                        <div class="input-group divSearch">
                            <input type="text" name="search" id="search" placeholder="Rechercher ...">
                            <span class="input-group-btn">
                                <button type="button" name="btnSearch" id="btnSearch" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </form>
                    <button type="button" onclick="toTop()" class="navbar-toggle" data-toggle="collapse" data-target="#menu-content">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <!-- <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i> -->
            </div>
        </nav>
        <nav class="nav-side-menu">
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">
                    <li class="active">
                        <a href="./"><i class="fa fa-home fa-lg"></i> Accueil</a>
                    </li>

                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                        <a href="#"><i class="fa fa-envelope fa-lg"></i> Messages <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li class="active"><a href="index.php?p=inbox">Reçus</li>
                        <li><a href="index.php?p=sent">Envoyés</a></li>
                    </ul>

                    <li  data-toggle="collapse" data-target="#products" class="collapsed">
                        <a href="#"><i class="fa fa-comments fa-lg"></i> Forum <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="products">
                        <li class="active"><a href="index.php?p=forum">Afficher tout</a></li>
                        <li><a href="index.php?p=myQuestions">Mes questions</a></li>
                    </ul>

                    <li data-toggle="collapse" data-target="#service" class="collapsed">
                        <a href="#"><i class="fa fa-handshake-o fa-lg"></i> Services <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="service">
                        <li class="active">Service 1</li>
                        <li>Service 2</li>
                        <li>Service 3</li>
                    </ul>

                    <li>
                        <a href="index.php?p=profile"><i class="fa fa-user fa-lg"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- <div class="container content" id="content" style="margin-left: 350px;"> -->
            <!-- <div class="row"> -->
                <div style="margin-left:350px;margin-right:40px">
                    <?php
                        if (isset($_GET['p']) && $_GET['p'] == "inbox") {
                            include 'pages/inbox.php';
                        }
                        elseif (isset($_GET['p']) && $_GET['p'] == "sent") {
                            include 'pages/sent.php';
                        }
                        elseif (isset($_GET['p']) && $_GET['p'] == "forum") {
                            include 'pages/forum.php';
                        }
                        elseif (isset($_GET['p']) && $_GET['p'] == "myQuestions") {
                            include 'pages/myQuestions.php';
                        }
                        elseif (isset($_GET['p']) && $_GET['p'] == "profile") {
                            include 'pages/profile.php';
                        }
                        else {
                            echo "Xët wii dé jissefuko !";
                        }
                    ?>
                    <div class="dropdown clearfix">
                        <button class="btn btn-default dropdown-toggle dropdown-img" id="dropdown-img" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="../img/avatars/img_avatar3.png" width="100%" alt=""></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="../img/avatars/img_avatar3.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="" style="font-weight: bold; color: black;">
                                        Mr Serigne Amsatou SEYE
                                    </div>
                                    <div class="" style="color: grey;">
                                        hamzatou10@hotmail.fr
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div>
        </div> -->

        <script type="text/javascript" src="../dist/js/myScript.js"></script>
        <script type="text/javascript" src="../dist/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function toTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    </body>
</html>
