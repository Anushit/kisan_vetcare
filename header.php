<?php 
$general_settings = getData('setting'); 
$meta_title = $general_settings['data']['meta_title'];
$meta_keyword = $general_settings['data']['meta_keyword'];
$meta_description = $general_settings['data']['meta_description'];

if(isset($cms['data']['meta_title']) && !empty($cms['data']['meta_title'])){
    $meta_title = $cms['data']['meta_title'];
}
if(isset($cms['data']['meta_keyword']) && !empty($cms['data']['meta_keyword'])){
    $meta_keyword = $cms['data']['meta_keyword'];
}
if(isset($cms['data']['meta_description']) && !empty($cms['data']['meta_description'])){
    $meta_description = $cms['data']['meta_description'];
}
$url= explode('/',$_SERVER['REQUEST_URI']);  
$filter = array(
    'table'=>'ci_categories',
    'sort'=>'sort_order',
    'order'=>'asc',
    'where'=> 'is_active=1'
);  
$allcategoryData = postData('allcategory', $filter); 
?>    

<!DOCTYPE html>
<html lang="en"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$meta_title; ?></title>
    <meta name="Keywords" content="<?=$meta_keyword; ?>">
    <meta name="Description" content="<?=$meta_description; ?>">
    <link rel="shortcut icon" href="<?=ADMIN_PATH.$general_settings['data']['favicon']; ?>" type="image/x-icon"> 

    <link rel="stylesheet" href="<?=BASE_PATH?>css/vendor/ionicons.css" />
    <link rel="stylesheet" href="<?=BASE_PATH?>css/vendor/line-awesome.min.css" />
    <link rel="stylesheet" href="<?=BASE_PATH?>css/plugins/animate.min.css" />
    <link rel="stylesheet" href="<?=BASE_PATH?>css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?=BASE_PATH?>css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?=BASE_PATH?>css/style.css" /> 
</head>
<!-- head end --> 

<body>
    <!-- header section start -->
    <!-- Modal -->
    <div class="modal fade offcanvas-modal" id="exampleModal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <ul class="header-topbar-nav nav my-4 justify-content-center">
                    <li class="topbar-nav-item">
                        <a class="topbar-nav-link" href="#"><i class="icon las la-map-marker"></i>Store Locator</a>
                    </li> 
                </ul>
 

                <!-- offcanvas-mobile-menu start -->

                <nav id="offcanvasNav" class="offcanvas-menu">
                    <ul>
                                    <li>
                                        <a class="main-menu-link" href="<?=BASE_PATH?>">Home</a>
                                    </li>
                                    <li> 
                                        <a class="main-menu-link" href="<?=BASE_PATH?>about_us">About Us</a>
                                    </li>
                                    <li>
                                    <a class="main-menu-link" href="jacascript:void(0);">Products</a>
                                   <ul>
                                    <?php  
                                        if(!empty($allcategoryData['data'])){
                                        foreach ($allcategoryData['data'] as $ckey => $cvalue) { ?>   
                                        <li><a class="sub-menu-link" href="<?=BASE_PATH?>category/<?=$cvalue['id']?>"><?=$cvalue['name']?></a></li> 
                                        <?php } } ?>
                                    </ul>
                                    </li>
                                    <li>
                                        <a class="main-menu-link" href="<?=BASE_PATH?>contact_us">Contact Us</a>
                                    </li> 
                                </ul>

                    <div class="offcanvas-social">
                        <ul>
                          <?php if(!empty($general_settings['data']['facebook_link'])){ ?>
                                <li><a href="<?=$general_settings['data']['facebook_link']?>"><i class="lab la-facebook"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['twitter_link'])){ ?>
                                <li><a href="<?=$general_settings['data']['twitter_link']?>"><i class="ion-social-twitter"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['google_link'])){ ?>
                                <li><a href="<?=$general_settings['data']['google_link']?>"><i class="ion-social-google"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['youtube_link'])){ ?>
                                <li><a href="<?=$general_settings['data']['youtube_link']?>"><i class="ion-social-youtube"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['linkedin_link'])){ ?>
                                <li><a href="<?=$general_settings['data']['linkedin_link']?>"><i class="ion-social-linkedin"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['instagram_link'])){ ?>
                                <li><a href="<?=$general_settings['data']['instagram_link']?>"><i class="ion-social-instagram"></i></a> </li>
                            <?php } ?>   
                        </ul>
                    </div>
                </nav>
                 
            </div>
        </div>
    </div>

    <header>
        <!-- <div class="header-top-bar header-top-bar-two d-none d-md-block">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-3">
                        <div class="social-links social-links-dark">
                            <?php if(!empty($general_settings['data']['facebook_link'])){ ?>
                                 <li><a href="<?=$general_settings['data']['facebook_link']?>"><i class="lab la-facebook"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['twitter_link'])){ ?>
                                 <li><a href="<?=$general_settings['data']['twitter_link']?>"><i class="ion-social-twitter"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['google_link'])){ ?>
                                 <li><a href="<?=$general_settings['data']['google_link']?>"><i class="ion-social-google"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['youtube_link'])){ ?>
                                 <li><a href="<?=$general_settings['data']['youtube_link']?>"><i class="ion-social-youtube"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['linkedin_link'])){ ?>
                                 <li><a href="<?=$general_settings['data']['linkedin_link']?>"><i class="ion-social-linkedin"></i></a> </li>
                            <?php } ?>  
                            <?php if(!empty($general_settings['data']['instagram_link'])){ ?>
                                 <li><a href="<?=$general_settings['data']['instagram_link']?>"><i class="ion-social-instagram"></i></a> </li>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-9">
                        <ul class="header-topbar-nav nav">
                            <li class="topbar-nav-item">
                                <a class="topbar-nav-link" href="#"><i class="icon las la-map-marker"></i>Store Locator</a>
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- header top end -->
        <div id="active-sticky" class="header-two header-space bg-dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="flex-shrink-0">
                            <div class="d-flex align-items-center vertical-menu"> 
                                <a class="logo" href="<?=BASE_PATH?>"><img src="<?=ADMIN_PATH.$general_settings['data']['logo']?>"alt="<?=$general_settings['data']['application_name'];?>" /></a>  
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-8 col-md-9 col-xl-10">
                        <div class="d-flex justify-content-end justify-content-xl-between">
                            <div class="d-none d-xl-block">
                                <ul class="main-menu">
                                    <li class="main-menu-item position-relative">
                                        <a class="main-menu-link" href="<?=BASE_PATH?>">Home</a>
                                    </li>
                                    <li class="main-menu-item position-relative"> 
                                        <a class="main-menu-link" href="<?=BASE_PATH?>about_us">About Us</a>
                                    </li>
                                    <li class="main-menu-item position-relative">
                                    <a class="main-menu-link" href="jacascript:void(0);">Products<i class="ion-ios-arrow-down"></i></a>
                                   <ul class="sub-menu">
                                    <?php  
                                        if(!empty($allcategoryData['data'])){
                                        foreach ($allcategoryData['data'] as $ckey => $cvalue) { ?>   
                                        <li><a class="sub-menu-link" href="<?=BASE_PATH?>category/<?=$cvalue['id']?>"><?=$cvalue['name']?></a></li> 
                                        <?php } } ?>
                                    </ul>
                                    </li>
                                 
                                    <li class="main-menu-item position-relative">
                                        <a class="main-menu-link" href="<?=BASE_PATH?>contact_us">Contact Us</a>
                                    </li> 
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap align-items-center position-relative">
                                 
                                <ul class="quick-links">  
                                    <li class="quick-link-item d-lg-none">
                                        <button class="toggle-menu" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="las la-bars"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header middle end --> 
    </header>
    <!-- header section end -->