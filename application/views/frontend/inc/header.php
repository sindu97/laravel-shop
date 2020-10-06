<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="<?php echo $seo_description; ?>">
      <meta name="keywords" content="<?php echo $seo_keywords; ?>">
      <title><?php echo $site_title; ?></title>
      <link rel="stylesheet" href="<?php echo base_url('public'); ?>/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
      <link rel="icon" href="<?php echo base_url('public/img') ?>/logo.png" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/style.css'); ?>" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <?php echo isset($extra_header)? $extra_header : "" ; ?>
   </head>
   <body>
      <header>
      <!--Start.........................Topbaar-->
      <div class="main-head">
      <div class="top-header">
      </div>
      </div>   
      <!--End.........................Topbaar-->
      <!-- Start ......................navbar -->
      <div class="second-header">
                  <nav class="navbar navbar-inverse">
                    <div class="container">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>                        
                        </button>
                         <img src="<?php echo base_url('public/img') ?>/logo.png" alt="logo-img" >
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                          <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li><a href="#">Owner Portal</a></li>
                          <li><a href="#">Tenant Portal</a></li>
                          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Find A Rental<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Rental Requirements</a></li>
                            </ul>
                          </li>
                          
                          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Management<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Our Values</a></li>
                              <li><a href="<?php echo base_url('maintaining-your-rental-property') ?>"> Maintaining your Rental Property</a></li>
                            </ul>
                          </li>

                          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Contact Us<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Rental Verification</a></li>
                            </ul>
                          </li>

                           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> For Sale<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Sold Properties by BMRealtor.com</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>
              </div><!--.second-header end-->
      <!-- End   ......................navbar -->
      </header>
      