<?php require_once('config.php');  ?>
<?php 
$id = $_REQUEST['id'];    
$cms = getData('cms', $id);  ?> 
<?php include('header.php'); ?>    
   <!-- bread crumb section start -->
    <nav class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="<?=BASE_PATH?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#5b7dbd;"><?php echo $cms['data']['cms_title']; ?> </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb section end -->
   
    <section class="about-section section-mb">
        <div class="container"> 
                <div class="kf_heading_1">
                    <h2><?php echo $cms['data']['cms_title']; ?></h2> <span></span></div>

        <div> <?php echo $cms['data']['cms_contant']; ?> </div>
        </div>
    </section> 
    
<?php include('footer.php'); ?> 
   