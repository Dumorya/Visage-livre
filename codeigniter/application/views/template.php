<! DOCTYPE html>
<html>
<head >
    <meta charset = "utf-8" />
    <title>Visage livre</title >

    <link rel="shortcut icon" href="<?php echo base_url(); ?>application/public/images/logo2_visage_livre.png"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/public/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id ="global">
    <nav class="navbar navbar-default" id="nav">
        <div class="container-fluid alignItems">
            <div class="alignItems">
                <img src="<?php echo base_url(); ?>application/public/images/logo_visage_livre.png" class="navbar-logo">
                <a class="navbar-brand" href="#" id="linkVisageLivre">Visage livre</a>
            </div>

            <?php
                error_log('template ' . $this->session->userdata('connect_nickname'));
                if($this->session->userdata('connect_nickname') != null)
                {

            ?>
                    <div class="row alignItems">
                        <div class="marginIconNavbar">
                            <a onclick="window.location='<?php echo site_url("visage_livre/redirect_page_home");?>'" class="cursorPointer">
                                <i class="fa fa-home fa-2x"></i>
                            </a>
                        </div>
                        <div class="marginIconNavbar">
                            <a onclick="window.location='<?php echo site_url("visage_livre/friend_requests");?>'" class="cursorPointer">
                                <i class="fa fa-users fa-2x"></i>
                            </a>
                        </div>
                        <span class="separationLine"></span>
                        <div class="dropdown">
                            <button class="dropbtn">
                                <form id="searchForm" method="post">
                                    <div class="input-group">
                                        <i class="fa fa-user fa-2x"></i>
                                        <p class="navbar-user">
                                            <?php
                                                if(count($this->visage_livre_model->connection($this->session->userdata('connect_nickname'),$this->session->userdata('connect_pass'))) !== 0)
                                                {
                                                    echo $this->visage_livre_model->get_user_connected();
                                                }
                                            ?>
                                        </p>
                                        <i class="fa fa-sort-down fa-2x"></i>
                                    </div>
                                </form>
                            </button>
                            <div class="dropdown-content">
                                <?php $this->load->view('button_user_info'); ?>
                                <?php $this->load->view('logout'); ?>
                            </div>
                        </div>


                    </div>
            <?php
                }
                else
                {
                    $this->load->view('connection');
                }
            ?>

        </div>
    </nav>

    <div class="row">
        <?php $this->load->view($content);?>
        <?php if($this->session->userdata('connect_nickname') != null)
            {
        ?>
                <div class="col-lg-2" id="userList">
                    <?php $this->load->view('user_list'); ?>
                </div>
        <?php
            }
        ?>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/public/js/style.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/public/js/smoothScroll.js"></script>
</body>
</html>

