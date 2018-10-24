<?php
echo'
<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Readbook || '.$pageTitle.'</title>
<link rel="icon" href="'.base_url().'assets/images/icon32.png" type="image/png"> <!-- Favicon-->
<link rel="stylesheet" href="'.base_url().'assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="'.base_url().'assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="'.base_url().'assets/plugins/morrisjs/morris.min.css" />
<link rel="stylesheet" href="'.base_url().'assets/plugins/sweetalert2/sweetalert2.min.css">
<link href="'.base_url().'assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link href="'.base_url().'assets/plugins/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="'.base_url().'assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<link rel="stylesheet" href="'.base_url().'assets/css/main.css">
<link rel="stylesheet" href="'.base_url().'assets/css/color_skins.css">
</head>
<body class="theme-orange menu_dark">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="'.base_url().'assets/images/logoDark.png" width="100" height="100" alt="Oreo"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="'.base_url().'"><img src="'.base_url().'assets/images/logoDark.png" width="30" alt="Oreo"><span class="m-l-10">Readbook</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
       
        
       
           
        <li class="float-right">
            <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            <a href="'.base_url().'logout" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
            
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
   
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="#"><img src="'.base_url().'assets/images/user.png" alt="User"></a></div>
                            <div class="detail">
                                <h4>'.$_SESSION["username"].'</h4>
                                                 
                            </div>
                                           
                        </div>
                    </li>
                
                    <li> <a href="'.base_url().'dashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                    <li> <a href="'.base_url().'users"><i class="zmdi zmdi-account"></i><span>Users</span></a></li>
                    <li> <a href="javascript:void(0);"  class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Books</span></a>
                        <ul class="ml-menu">
                            <li><a href="'.base_url().'category">Category</a> </li>
                            <li><a href="'.base_url().'books">Books</a></li>
                            
                        </ul>
                    </li>
                    <li> <a href="'.base_url().'questions"><i class="zmdi zmdi-help"></i><span>Questions</span></a></li>
                    <li> <a href="'.base_url().'administrator"><i class="zmdi zmdi-accounts-alt"></i><span>Administrator</span></a></li>
                    <li> <a href="'.base_url().'leaderboard"><i class="zmdi zmdi-star-circle"></i><span>Leaderboard</span></a></li>
                    <li> <a href="'.base_url().'advertisement"><i class="zmdi zmdi-announcement"></i><span>Advertisement</span></a></li>
                    <li> <a href="javascript:void(0);"  class="menu-toggle"><i class="zmdi zmdi-globe"></i><span>Website Content</span></a>
                        <ul class="ml-menu">
                            <li><a href="'.base_url().'about">About Us</a> </li>
                            <li><a href="'.base_url().'contact">Contact Information</a> </li>
                            <li><a href="'.base_url().'faqs">FAQS</a> </li>
                            <li><a href="'.base_url().'team">Team</a> </li>
                            <li><a href="'.base_url().'process">How it Works</a> </li>
                            <li><a href="'.base_url().'stories">Stories</a> </li>
                            <li><a href="'.base_url().'newsletter">Newsletter Subscriber</a> </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
        
    </div>    
</aside>



';
?>