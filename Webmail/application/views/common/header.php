<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Robert">

        <title>RocsMail</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/common/css/common.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/Kendo/styles/kendo.common.min.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/Kendo/styles/kendo.fiori.min.css"); ?>" />

    </head>
<body class="index">

        <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                                <li>
                                    <a title="Salida" href="<?php echo base_url("index.php/email/index/") ?>"><span class="glyphicon glyphicon-send" aria-hidden="true">Salida</span></a>
                                </li>
                                <li>
                                    <a title="Enviados" href="<?php echo base_url("index.php/enviados/index/") ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">Enviados</span></a>
                                </li>
                                <li>
                                    <a title="Borradores" href="<?php echo base_url("index.php/borradores/index/") ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">Borradores</span></a>
                                </li>
                                <li>
                                    <?php
                                    echo'<a title="Cerrar Sesión" href="' . base_url("") . '"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>';
                                    ?>
                                </li>
                                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
        <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <h2>Rocsmail</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>