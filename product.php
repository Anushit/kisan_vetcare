<?php require_once('config.php');  ?>
<?php 
$id = $_REQUEST['id'];    
$productData = getData('product', $id);  
$product = $productData['data']['product'];
$image = $productData['data']['image'];
?> 
<?php include('header.php'); ?>    
   <!-- bread crumb section start -->
    <nav class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="<?=BASE_PATH?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#5b7dbd;"><?php echo $product['name']; ?> </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb section end -->
   
     <section>

        <div class="container">
            <div class="row mb-n7">
                <div class="col-md-5 mb-7">
                    <div class="modal-gallery-slider">
                        <div class="gallery position-relative">
                            <?php 
                            $newDate = date('Y-m-d',strtotime($product['created_at']. '+7 days'));
                            if(date('Y-m-d',strtotime($product['created_at'])) < $newDate){ ?>
                            <span class="badge bg-success product-badge">new</span>
                            <?php } ?>

                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php if(!empty($image)){ 
                                        foreach ($image as $ikey => $ivalue) {
                                        ?> 
                                    <div class="swiper-slide gallery-item">
                                        <img src="<?=getimage($ivalue['image'],'default.png')?>" alt="<?=$product['name']?>">
                                    </div>
                                    <?php } } ?> 
                                </div>
                            </div>

                        </div>

                        <div class="gallery-thumbs">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php if(!empty($image)){ 
                                        foreach ($image as $ikey => $ivalue) {
                                        ?> 
                                    <div class="swiper-slide gallery-thumbs-item">
                                        <a href="#?">
                                        <img src="<?=getimage($ivalue['image'],'default.png')?>" alt="<?=$product['name']?>">
                                        </a>
                                    </div>
                                    <?php } } ?>  
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7 mb-7">
                    <div class="modal-product-des">
                        <h3 class="modal-product-title"><?=$product['name']?></h3>
                        <h3 class="modal-product-sub-title">Model: <?=$product['model']?></h3>

                        <!-- <div class="reviews">
                            <span class="las la-star"></span>
                            <span class="las la-star"></span>
                            <span class="las la-star"></span>
                            <span class="las la-star"></span>
                            <span class="las la-star"></span>
                        </div> -->
                  <!--       <div class="product-price-wrapp-lg">
                            <?php if(!empty($tsvalue['special_price'])){ ?>
                            <span class="product-regular-price-lg"><?=$general_settings['data']['currency'].''.number_format($product['price'],2,'.','')?></span>
                            <span class="product-price-on-sale-lg"><?=$general_settings['data']['currency'].''.number_format($product['special_price'],2,'.','')?></span>
                            <?php }else{ ?>
                                <span class="product-price-on-sale-lg"><?=$general_settings['data']['currency'].''.number_format($product['price'],2,'.','')?></span>
                            <?php } ?>
                           <?php if(!empty($tsvalue['special_price'])){ ?> 
                            <span class="badge badge-lg bg-dark"><?php 
                           $difper = $product['special_price']*100/$product['price'] ;
                           echo '-'.round(100-$difper).'%';
                            ?></span> <?php } ?> 
                        </div> -->

                        <div class="product-description-short pb-7 mb-7">
                            <?=$product['sort_description'];?>
                        </div>  

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-mb section-mt">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs single-product-tab justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#description" role="tab" aria-selected="true">Description</a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#productdetails" role="tab" aria-selected="false">Product Details</a>
                        </li>  -->
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="description" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-product-desc">
                                <p>
                                    <?=$product['description'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-pane fade" id="productdetails" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-product-desc">
                                <div class="product-anotherinfo-wrapper">
                                    <ul>
                                        <li><span>Weight</span> 400 g</li>
                                        <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                                        <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                        <li>
                                            <span>Other Info</span> American heirloom jean shorts
                                            pug seitan letterpress
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  -->
            </div>
        </div>

    </section>
    
<?php include('footer.php'); ?> 
   