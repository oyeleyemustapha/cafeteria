<?php

echo'

<div class="col-md-6 col-xl-6">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-light"><i class="fa fa-money text-danger"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter text-danger"> &#8358; '.$not_paid_day.'</span>
                                Change Not Paid ['.date("F d, Y").']
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-xl-6">
                        <div class="mini-stat clearfix bg-info">
                            <span class="mini-stat-icon bg-light"><i class="fa fa-money text-warning"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter text-white">&#8358; '.$not_paid_month.'</span>
                                Change Not Paid  ['.date('F').']
                            </div>
                        </div>
                    </div>



';



?>