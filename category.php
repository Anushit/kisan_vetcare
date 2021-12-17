<?php require_once('config.php');  ?>
<?php 
$id = $_REQUEST['id'];   
$category = getData('category', $id);
$limit = 12;
if (isset($_REQUEST['sort'])) {
    $sort = $_REQUEST['sort'];
} else {
    $sort = 'sort_order';
}
if (isset($_REQUEST['order'])) {
    $order = $_REQUEST['order'];
} else {
    $order = 'asc';
}
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
} 
$filter_data = array(
    'category_id'   => $id,  
    'sort'          => $sort,
    'order'         => $order,
    'start'         => ($page - 1) * $limit,
    'limit'         => $limit
);
$product_total = postData('totalproduct', $filter_data);
$total_pages = ceil($product_total['data'] / $limit);
$results =  postData('allproducts',$filter_data);
$nurl = '';
if (isset($_REQUEST['sort'])) {
    $nurl .= '&sort=' . $_REQUEST['sort'];
}
if (isset($_REQUEST['order'])) {
    $nurl .= '&order=' . $_REQUEST['order'];
}

$purl = BASE_PATH.'category/'.$id.'';

?> 
<?php include('header.php'); ?>    
   <!-- bread crumb section start -->
    <nav class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="<?=BASE_PATH?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#5b7dbd;"><?php echo $category['data']['name']; ?> </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb section end -->
   
      <!-- shop product tab start-->
    <div class="shop-product-tab section-mb">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-3 order-lg-first">
                    <div class="widgets">
                        <div class="widget-card">
                            <h3 class="title"><span>Categories</span></h3> 
                            <div class="search-filter">  
                                    <div class="widget-inner">
                                        <?php  
                                        if(!empty($allcategoryData['data'])){
                                        foreach ($allcategoryData['data'] as $ckey => $cvalue) { ?>  
                                        <div class="widget-check-box"> 
                                            <a class="pro-menu-link <?php if($cvalue['id']==$id){ echo 'active'; } ?>" href="<?=BASE_PATH?>category/<?=$cvalue['id']?>"> <?=$cvalue['name']?> (<?=$cvalue['totpro']?>)</a>
                                        </div> 
                                        <?php } } ?>
                                    </div> 
                                    <!-- <h3 class="title"><span>Price</span></h3>
                                    <div class="price-filter mb-7">
                                        <div class="price-slider-amount">
                                            <input type="text" id="amount" name="price" readonly placeholder="Add Your Price" />
                                        </div>
                                        <div id="slider-range"></div>
                                    </div>  -->
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="kf_heading_1"><h2><?php echo $category['data']['name']; ?></h2> <span></span></div>
                    <div class="grid-nav-wraper bg-lighten2 mb-30">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <nav class="shop-grid-nav">
                                    <ul class="nav nav-tabs align-items-center" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab">
                                                <i class="ion-grid"></i></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"><i
                                       class="ion-android-menu"></i></a>
                                        </li>
                                        <li>
                                            <span class="total-products">There are <?=$product_total['data']?> products.</span>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-12 col-md-6 position-relative">
                                <div class="shop-grid-button d-flex align-items-center">
                                    <span class="sort-by">Sort by:</span>
                                    <span class="chevron-arrow-down ion-android-arrow-dropdown"></span>
                                    <select class="form-select filterData" aria-label="Default select example">
                                        <option <?php if($sort=='sort_order'){ echo 'selected="selected"'; } ?> value="<?=$purl.'?sort=sort_order&order=asc'; ?>">Default</option>
                                        <option <?php if($sort=='name' && $order=='asc'){ echo 'selected="selected"'; } ?> value="<?=$purl.'?sort=name&order=asc'?>">Name, A to Z</option>
                                        <option <?php if($sort=='name' && $order=='desc'){ echo 'selected="selected"'; } ?> value="<?=$purl.'?sort=name&order=desc'?>">Name, Z to A</option>
                                        <option <?php if($sort=='price' && $order=='asc'){ echo 'selected="selected"'; } ?> value="<?=$purl.'?sort=price&order=asc'?>">Price, low to high</option>
                                        <option <?php if($sort=='price' && $order=='desc'){ echo 'selected="selected"'; } ?> value="<?=$purl.'?sort=price&order=desc'?>">Price, high to low</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  if(!empty($results)){  ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row grid-view mb-n7">
                               <?php 
                               foreach ($results['data'] as $rkey => $rvalue) { ?>  
                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-7">
                                    <!-- product-card start -->
                                   <div class="product-card-list">
                                        <!-- product-card start -->
                                        <div class="product-card">
                                            <?php 
                                            $newDate = date('Y-m-d',strtotime($rvalue['created_at']. '+7 days'));
                                            if(date('Y-m-d',strtotime($rvalue['created_at'])) < $newDate){ ?>
                                            <span class="badge bg-success product-badge">new</span>
                                            <?php } ?>
                                            <div class="product-thumb-nail">
                                                <a href="<?=BASE_PATH?>product/<?=$rvalue['id']?>">
                                                    <img class="product-image" src="<?=getimage($rvalue['image'],'default.png')?>" alt="<?=$rvalue['name']?>" />
                                                </a>
                                                <ul class="actions"> 
                                                    <li class="action quick-view">
                                                       <a href="<?=BASE_PATH?>product/<?=$rvalue['id']?>"> <button data-bs-toggle="modal" ><i class="las la-eye"></i></button></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-sub-title">Model: <?=$rvalue['model']?></h4>
                                                <h3 class="product-title"><?=$rvalue['name']?></h3>
                                           <!--      <div class="product-price-wrapp">
                                                   <?php if(!empty($rvalue['special_price'])){ ?>
                                                    <span class="product-regular-price"><?=$general_settings['data']['currency'].''.number_format($rvalue['price'],2,'.','')?></span>
                                                    <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($rvalue['special_price'],2,'.','')?></span>
                                                    <?php }else{ ?>
                                                        <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($rvalue['price'],2,'.','')?></span>
                                                    <?php } ?>
                                                   <?php if(!empty($rvalue['special_price'])){ ?> 
                                                    <span class="badge bg-danger"><?php 
                                                   $difper = $rvalue['special_price']*100/$rvalue['price'] ;
                                                   echo '-'.round(100-$difper).'%';
                                                    ?></span> <?php } ?>
                                                </div> --> 
                                            </div>
                                        </div>
                                        <!-- product-card end -->
                                    </div>
                                    <!-- product-card end -->
                                </div> 
                                <?php }?>
                                <div class="col-12 mt-7 mb-7">
                                    <?php if($total_pages>1){ ?>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="<?=$purl?>?page=1<?=$nurl?>">
                                                    <span class="ion-ios-arrow-left"></span>
                                                </a>
                                            </li>
                                            <?php for($i=1;$i<=$total_pages;$i++){ ?>
                                            <li class="page-item  <?php if($i==$page){ echo 'active'; } ?> "><a class="page-link" href="<?=$purl?>?page=<?=$i.''.$nurl;?>"><?=$i?></a></li>
                                            <?php } ?> 
                                            <li class="page-item">
                                                <a class="page-link" href="<?=$purl?>?page=<?=$total_pages.''.$nurl; ?>">
                                                    <span class="ion-ios-arrow-right"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="row grid-view-list overflow-hidden">
                                <div class="row grid-view-list mb-n7">
                                    <?php 
                                    foreach ($results['data'] as $rkey => $rvalue) { ?>  
                                    <div class="col-12 mb-7">
                                        <!-- product-card start -->
                                        <div class="product-card">
                                            <?php 
                                            $newDate = date('Y-m-d',strtotime($rvalue['created_at']. '+7 days'));
                                            if(date('Y-m-d',strtotime($rvalue['created_at'])) < $newDate){ ?>
                                            <span class="badge bg-success product-badge">new</span>
                                            <?php } ?>
                                            <div class="product-thumb-nail">
                                                 <a href="<?=BASE_PATH?>product/<?=$rvalue['id']?>">
                                                    <img class="product-image" src="<?=getimage($rvalue['image'],'default.png')?>" alt="<?=$rvalue['name']?>" />
                                                </a> 
                                                <ul class="actions"> 
                                                    <li class="action quick-view">
                                                         <a href="<?=BASE_PATH?>product/<?=$rvalue['id']?>"> <button data-bs-toggle="modal" ><i class="las la-eye"></i></button></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-sub-title">Model: <?=$rvalue['model']?></h4>
                                                <h3 class="product-title"><?=$rvalue['name']?></h3>
                                               <!--  <div class="product-price-wrapp">
                                                   <?php if(!empty($rvalue['special_price'])){ ?>
                                                    <span class="product-regular-price"><?=$general_settings['data']['currency'].''.number_format($rvalue['price'],2,'.','')?></span>
                                                    <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($rvalue['special_price'],2,'.','')?></span>
                                                    <?php }else{ ?>
                                                        <span class="product-price-on-sale"><?=$general_settings['data']['currency'].''.number_format($rvalue['price'],2,'.','')?></span>
                                                    <?php } ?>
                                                   <?php if(!empty($rvalue['special_price'])){ ?> 
                                                    <span class="badge bg-danger"><?php 
                                                   $difper = $rvalue['special_price']*100/$rvalue['price'] ;
                                                   echo '-'.round(100-$difper).'%';
                                                    ?></span> <?php } ?>
                                                </div>  -->
                                                <p> <?=$rvalue['sort_description'];?></p> 
                                            </div>
                                        </div>
                                        <!-- product-card end -->
                                    </div>
                                    <?php }?> 
                                     <div class="col-12 mt-7 mb-7">
                                    <?php if($total_pages>1){ ?>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="<?=$purl?>?page=1<?=$nurl?>">
                                                    <span class="ion-ios-arrow-left"></span>
                                                </a>
                                            </li>
                                            <?php for($i=1;$i<=$total_pages;$i++){ ?>
                                            <li class="page-item  <?php if($i==$page){ echo 'active'; } ?> "><a class="page-link" href="<?=$purl?>?page=<?=$i.''.$nurl;?>"><?=$i?></a></li>
                                            <?php } ?> 
                                            <li class="page-item">
                                                <a class="page-link" href="<?=$purl?>?page=<?=$total_pages.''.$nurl; ?>">
                                                    <span class="ion-ios-arrow-right"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php } ?>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php }else{ ?>
                        <div class="col-12"> No Record Found !!!</div>
                    <?php } ?>    

                </div>
            </div>

        </div>
    </div>
    <!-- shop product tab end--> 
    
<?php include('footer.php'); ?> 
<script type="text/javascript">
    
    $( document ).ready(function() {
        $('.filterData').on('change', function() {
          var page = $(this).val();
          window.location.href=page;
        });
    });

</script>
   