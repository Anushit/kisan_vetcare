<?php 
$footer_settings = getData('setting'); 

if(isset($footer_settings['data']['whatsapp_button']) && !empty($footer_settings['data']['whatsapp_button'])){
    $whatsapp_button = $footer_settings['data']['whatsapp_button'];
}

///echo "<pre>"; print_r($footer_settings); 
?>
  <!-- footer section start -->
    <footer class="footer">
        <div class="container">
            <div class="row mb-n7">
                <div class="col-lg-6 col-sm-6 mb-7">
                    <div class="footer-widget">
                       <div class="col-lg-4"> <a class="footer-brand" href="<?=BASE_PATH?>">
                            <img src="<?=ADMIN_PATH.$footer_settings['data']['footer_logo']?>" alt="<?=$footer_settings['data']['application_name']?>">
                        </a>
                    	</div>
                        <p>We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>

                        <ul class="footer-des">
                            <li class="footer-des-list" style="text-align: justify;"><i class="las la-map-marked"></i> <span><?=$footer_settings['data']['address']?></span>
                            </li>
                            <li class="footer-des-list"><i class="las la-envelope-open"></i> <a href="mailto:<?=$footer_settings['data']['email']?>"><?=$footer_settings['data']['email']?></a>
                            </li>
                            <li class="footer-des-list"><i class="las la-phone-volume"></i> <a href="tel:<?=$footer_settings['data']['phone']?>"><?=$footer_settings['data']['phone']?></a></li>
                        </ul>
                    </div>
                </div> 
                <div class="col-lg-3 col-sm-6 mb-7">
                    <div class="footer-widget">
                        <h4 class="title">Information</h4>
                        <ul class="footer-menu">
                            <li class="footer-menu-items"><a class="footer-menu-link" href="<?=BASE_PATH?>about_us">About Us</a></li>
                           
                            <li class="footer-menu-items"><a class="footer-menu-link" href="<?=BASE_PATH?>product_processing">Products</a></li>
                           
                            <li class="footer-menu-items"><a class="footer-menu-link" href="<?=BASE_PATH?>contact_us">Contact Us</a></li> 
                        </ul>
                    </div>

                </div> 
                <div class="col-lg-3 col-sm-6 mb-7">
                    <div class="footer-widget">
                        <h4 class="title">Social Link</h4>
                        <div class="social-links social-links-dark">
	                        <?php if(!empty($footer_settings['data']['facebook_link'])){ ?>
	                        	<a class="social-link facebook" href="<?=$footer_settings['data']['facebook_link']?>"><i class="lab la-facebook"></i></a> 
							<?php } ?>	
                            <?php if(!empty($footer_settings['data']['twitter_link'])){ ?>
	                        	<a class="social-link twitter" href="<?=$footer_settings['data']['twitter_link']?>"><i class="lab la-twitter"></i></a> 
							<?php } ?>	
							<?php if(!empty($footer_settings['data']['google_link'])){ ?>
	                        	<a class="social-link google" href="<?=$footer_settings['data']['google_link']?>"><i class="lab la-google"></i></a> 
							<?php } ?>	
							<?php if(!empty($footer_settings['data']['youtube_link'])){ ?>
	                        	<a class="social-link youtube" href="<?=$footer_settings['data']['youtube_link']?>"><i class="lab la-youtube"></i></a> 
							<?php } ?>	
							<?php if(!empty($footer_settings['data']['linkedin_link'])){ ?>
	                        	<a class="social-link linkedin" href="<?=$footer_settings['data']['linkedin_link']?>"><i class="lab la-linkedin"></i></a> 
							<?php } ?>	
							<?php if(!empty($footer_settings['data']['instagram_link'])){ ?>
	                        	<a class="social-link instagram" href="<?=$footer_settings['data']['instagram_link']?>"><i class="lab la-instagram"></i></a> 
							<?php } ?>	 
                        </div>
                        <!-- <a class="footer-payment" href="#">
                            <img src="<?=BASE_PATH?>/images/payment.png" alt="images_not_found">
                        </a> -->
                    </div>
                </div>

            </div>
        </div>

        <div class="copy-right bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-12"> 
                            <p><?=$footer_settings['data']['copyright']?></p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12"> 
                           <p><b>Developed By:</b> <a href="https://adiyogitechnosoft.com" target="_blank">Adiyogi Technosoft</a></p>
                    </div>
                    
                </div>
            </div>
        </div>

    </footer>
    <div class="<?php echo ($whatsapp_button != "")?"":"hide"; ?>">
         <?=$whatsapp_button?>
        </div>
  
    <!-- footer section end -->
 <!-- Vendor JS -->

    <script src="<?=BASE_PATH?>js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?=BASE_PATH?>js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="<?=BASE_PATH?>js/plugins/jquery-ui.min.js"></script>
    <script src="<?=BASE_PATH?>js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=BASE_PATH?>js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="<?=BASE_PATH?>js/plugins/ajax-contact.js"></script>
    <script src="<?=BASE_PATH?>js/plugins/ajax-mailchimp.js"></script>
    <script src="<?=BASE_PATH?>js/plugins/form-validation.js"></script>
    <script src="<?=BASE_PATH?>js/plugins/swiper-bundle.min.js"></script>
    <script src="<?=BASE_PATH?>js/plugins/scroll-up.js"></script>
    <script src="<?=BASE_PATH?>js/main.js"></script>    
</body>
</html>