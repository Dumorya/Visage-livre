<! DOCTYPE html>
<html>
<head >
    <meta charset = "utf-8" />
    <title>Visage livre</title >

    <link rel="shortcut icon" href="../public/images/logo2_visage_livre.png"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/public/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id ="global">
    <nav class="navbar navbar-default" id="nav">
        <div class="container-fluid">
            <div>
                <img src="<?php echo base_url(); ?>application/public/images/logo_visage_livre.png" class="navbar-logo">
                <a class="navbar-brand" href="#" id="linkOpenFoodFacts">Visage livre</a>
            </div>

            <form id="searchForm" method="post">
                <div class="input-group">
                    <i class="fa fa-user fa-3x"></i>
                    <p class="navbar-user"><?php echo $this->visage_livre_model->get_user_connected();?></p>
                    <i class="fa fa-sort-down fa-2x"></i>
                </div>
            </form>
        </div>
    </nav>

    <div id ="contenu" style="margin-top: 150px;">
        <?php $this->load->view($content);?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/public/js/style.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/public/js/smoothScroll.js"></script>
</body>
</html>

