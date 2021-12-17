<?php require_once('config.php');  ?>
<?php include('header.php'); 
    $filter = array(
        'table'=>'ci_banners',
        'sort'=>'sort_order',
        'order'=>'asc',
        'start'=>'0',
        'limit'=>'5',
        'where'=> 'is_active=1'
    );  
    $bannerData = postData('listing', $filter);  
    $homecmsData = getData('cms', 5); 
    $filter = array(
        'table'=>'ci_categories',
        'sort'=>'sort_order',
        'order'=>'asc',
        'start'=>'0',
        'limit'=>'10',
        'where'=> 'is_active=1 and is_feature=1'
    );  
    $categoryData = postData('listing', $filter); 
    $filter = array( 
        'sort'=>'p.sort_order',
        'order'=>'asc',
        'start'=>'0',
        'limit'=>'10',
        'where'=> 'is_active=1 and is_topsell=1'
    );  
    $topsellingData = postData('productlist', $filter); 
    $filter = array( 
        'sort'=>'p.sort_order',
        'order'=>'asc',
        'start'=>'0',
        'limit'=>'10',
        'where'=> 'is_active=1 and is_feature=1'
    );  
    $topfeatureData = postData('productlist', $filter); 
?>   

  <!-- Hero Slider Start -->
    <section class="hero-section">
        <div class="hero-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- swiper-slide start -->
                    <?php  
                    if(!empty($bannerData['data'])){
                        foreach ($bannerData['data'] as $bkey => $bvalue) { ?>              
                    <div class="hero-slide-item slider-height1 swiper-slide animate-style1" style="background-image:url('<?=ADMIN_PATH.$bvalue['image'];?>')" >
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="hero-slide-content">
                                        <h2 class="title text-white delay1 animated">
                                            <?=$bvalue['title_first'];?>
                                        </h2>
                                        <br />
                                        <h2 class="title text-white delay2 animated">
                                           <?=$bvalue['title_second'];?>
                                        </h2>
                                        <!-- <br />
                                        <p class="text text-white animated">
                                            Free Shipping On Qualified Orders Over $35
                                        </p> -->

                                        <!-- <br />
                                        <a href="<? //$bvalue['url_link'];?>" class="btn animated btn-light">More Info</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                    <!-- swiper-slide end--> 
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- swiper navigation -->
            <div class="d-none d-lg-block">
                <div class="swiper-button-prev">
                    <i class="las la-chevron-circle-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="las la-chevron-circle-right"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->

   <!-- Food Category section start -->
    <section class="food-category-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="food-category-carousel food-carousel-box-shadow food-carousel-negative-space">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                            <?php  
                            if(!empty($categoryData['data'])){
                                foreach ($categoryData['data'] as $key => $value) { ?>
                                <div class="food-category-item swiper-slide">
                                    <a href="<?=BASE_PATH?>category/<?=$value['id']?>" class="food-catery-thumb">
                                        <img src="<?=ADMIN_PATH.$value['image']?>" alt="<?=$value['name']?>" />
                                    </a>
                                    <h3 class="food-catery-title">
                                        <a href="<?=BASE_PATH?>category/<?=$value['id']?>"><?=$value['name']?></a>
                                    </h3>
                                </div> 
                            <?php } } ?>
                            </div>
                        </div>

                        <!-- swiper navigation -->
                        <div class="swiper-button-prev">
                            <i class="las la-angle-left"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="las la-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Food Category section end -->   

        <!-- featured carousel section start --> 
    <section class="featured-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Top Selling products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="featured-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php  
                                if(!empty($topsellingData['data'])){ 
                                foreach ($topsellingData['data'] as $tskey => $tsvalue) { ?>
                                <div class="featured-carousel-item swiper-slide">
                                    <!-- product-card-list start -->
                                    <div class="product-card-list">
                                        <!-- product-card start -->
                                        <div class="product-card">
                                            <?php 
                                            $newDate = date('Y-m-d',strtotime($tsvalue['created_at']. '+7 days'));
                                            if(date('Y-m-d',strtotime($tsvalue['created_at'])) < $newDate){ ?>
                                            <span class="badge bg-success product-badge">new</span>
                                            <?php } ?>
                                            <div class="product-thumb-nail">
                                                <a href="<?=BASE_PATH?>product/<?=$tsvalue['id']?>">
                                                    <img class="product-image" src="<?=getimage($tsvalue['image'],'default.png')?>" alt="<?=$tsvalue['name']?>" />
                                                </a>
                                                <ul class="actions"> 
                                                    <li class="action quick-view">
                                                       <a href="<?=BASE_PATH?>product/<?=$tsvalue['id']?>"> <button data-bs-toggle="modal" ><i class="las la-eye"></i></button></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-sub-title">Model: <?=$tsvalue['model']?></h4>
                                                <h3 class="product-title"><?=$tsvalue['name']?></h3>
                                          <!--       <div class="product-price-wrapp">
                                                   <?php if(!empty($tsvalue['special_price'])){ ?>
                                                    <span class="product-regular-price"><?=$general_settings['data']['currency'].''.number_format($tsvalue['price'],2,'.','')?></span>
                                                    <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($tsvalue['special_price'],2,'.','')?></span>
                                                    <?php }else{ ?>
                                                        <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($tsvalue['price'],2,'.','')?></span>
                                                    <?php } ?>
                                                   <?php if(!empty($tsvalue['special_price'])){ ?> 
                                                    <span class="badge bg-danger"><?php 
                                                   $difper = $tsvalue['special_price']*100/$tsvalue['price'] ;
                                                   echo '-'.round(100-$difper).'%';
                                                    ?></span> <?php } ?>
                                                </div>  -->
                                            </div>
                                        </div>
                                        <!-- product-card end -->
                                    </div>
                                    <!-- product-card-list end -->
                                </div>
                                <?php } } ?>
                            </div>
                        </div>

                        <!-- swiper navigation -->
                        <div class="swiper-button-prev common-swiper-button-prev">
                            <i class="las la-angle-left"></i>
                        </div>
                        <div class="swiper-button-next common-swiper-button-next">
                            <i class="las la-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured carousel section end -->

    <!-- main banner section start -->
    <div class="main-banner-section section-mt section-mb">
        <?php echo $homecmsData['data']['cms_contant'];  ?>
    </div>
    <!-- main banner section end -->

    <!-- featured carousel section start --> 
    <section class="featured-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Featured products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="featured-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php  
                                if(!empty($topfeatureData['data'])){ 
                                foreach ($topfeatureData['data'] as $tskey => $tsvalue) { ?>
                                <div class="featured-carousel-item swiper-slide">
                                    <!-- product-card-list start -->
                                    <div class="product-card-list">
                                        <!-- product-card start -->
                                        <div class="product-card">
                                            <?php 
                                            $newDate = date('Y-m-d',strtotime($tsvalue['created_at']. '+7 days'));
                                            if(date('Y-m-d',strtotime($tsvalue['created_at'])) < $newDate){ ?>
                                            <span class="badge bg-success product-badge">new</span>
                                            <?php } ?>
                                            <div class="product-thumb-nail">
                                                <a href="<?=BASE_PATH?>product/<?=$tsvalue['id']?>">
                                                    <img class="product-image" src="<?=getimage($tsvalue['image'],'default.png')?>"alt="<?=$tsvalue['name']?>" />
                                                </a>
                                                <ul class="actions"> 
                                                    <li class="action quick-view">
                                                       <a href="<?=BASE_PATH?>product/<?=$tsvalue['id']?>"> <button data-bs-toggle="modal" ><i class="las la-eye"></i></button></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-sub-title">Model: <?=$tsvalue['model']?></h4>
                                                <h3 class="product-title"><?=$tsvalue['name']?></h3>
                                             <!--    <div class="product-price-wrapp">
                                                   <?php if(!empty($tsvalue['special_price'])){ ?>
                                                    <span class="product-regular-price"><?=$general_settings['data']['currency'].''.number_format($tsvalue['price'],2,'.','')?></span>
                                                    <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($tsvalue['special_price'],2,'.','')?></span>
                                                    <?php }else{ ?>
                                                        <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($tsvalue['price'],2,'.','')?></span>
                                                    <?php } ?>
                                                   <?php if(!empty($tsvalue['special_price'])){ ?> 
                                                    <span class="badge bg-danger"><?php 
                                                   $difper = $tsvalue['special_price']*100/$tsvalue['price'] ;
                                                   echo '-'.round(100-$difper).'%';
                                                    ?></span> <?php } ?>
                                                </div>  -->
                                            </div>
                                        </div>
                                        <!-- product-card end -->
                                    </div>
                                    <!-- product-card-list end -->
                                </div>
                                <?php } } ?>
                            </div>

                        </div>

                        <!-- swiper navigation -->
                        <div class="swiper-button-prev common-swiper-button-prev">
                            <i class="las la-angle-left"></i>
                        </div>
                        <div class="swiper-button-next common-swiper-button-next">
                            <i class="las la-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured carousel section end -->

        <!-- service section start -->
    <section class="service-section section-mt section-mb">
        <div class="container">
            <div class="services">
                <div class="row mb-n7">

                    <div class="col-sm-6 col-lg-3 mb-7">
                        <div class="service-item">
                            <img class="service-icon" src="./images/icon/service1.png" alt="images_not_found">
                            <h3 class="service-title">100% SECURE PAYMENTS</h3>
                            <p>Moving your card details to a much more secured place</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-7">
                        <div class="service-item">
                            <img class="service-icon" src="./images/icon/service2.png" alt="images_not_found">
                            <h3 class="service-title">TRUSTPAY</h3>
                            <p>100% Payment Protection. Easy Return Policy</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-7">
                        <div class="service-item">
                            <img class="service-icon" src="./images/icon/service3.png" alt="images_not_found">
                            <h3 class="service-title">HELP CENTER</h3>
                            <p>GGot a question? Look no further.Browse our FAQs or submit your query here.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-7">
                        <div class="service-item">
                            <img class="service-icon" src="./images/icon/service4.png" alt="images_not_found">
                            <h3 class="service-title">Express Shipping</h3>
                            <p>Fast, reliable delivery from global warehouses</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

<?php include('footer.php'); ?> 
   