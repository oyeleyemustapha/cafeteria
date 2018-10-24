



<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Administrator Portal
                </h2>
            </div>            
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                
            
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="zmdi zmdi-home"></i> Administrator Portal</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">

                            <?php
                                echo'

                                             <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="'.$no_books.'" data-speed="1000" data-fresh-interval="700">'.$no_books.'</h2>
                                    <p class="text-muted">Books Registered</p>
                                    <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="'.$no_users.'" data-speed="2000" data-fresh-interval="700">'.$no_users.'</h2>
                                    <p class="text-muted ">Registered Users</p>
                                    <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="'.$points.'" data-speed="2000" data-fresh-interval="700">'.$points.'</h2>
                                    <p class="text-muted">Points Accrued</p>
                                    <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                                </div>
                            </div>






                                ';


                            ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Sales</strong> Report</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row text-center">
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 106 <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted"> Today's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 907 <i class="zmdi zmdi-trending-down col-red"></i></h4>
                                <p class="text-muted">This Week's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 4210 <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Month's Sales</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 67,000 <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">This Year's Sales</p>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
                    </div>
                </div>
            </div>
        </div>-->
             
       
       
    </div>
</section>
