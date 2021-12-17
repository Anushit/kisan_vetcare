<?php require_once('config.php');  ?>
<?php 
$general_settings = getData('setting', 1); 

if(isset($_POST['submit'])){ 
    session_start();
    $msg = ''; 
    if (isset($_POST['securityCode']) && ($_POST['securityCode']!="")){
        if(strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0){
            $msg = "You have entered incorrect security code! Please try again.";
        } 
    } else {
        $msg = "Enter security code."; 
    } 
    if($msg==''){
        $data = $_POST; 
        $contactData = postData('saveinquery', $data);  
        $msg = $contactData['message'];
    } 
}
?> 
<?php include('header.php'); ?>    
<!--Banner Wrap Start-->
   <!-- bread crumb section start -->
    <nav class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="<?=BASE_PATH?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#5b7dbd;">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb section end -->


   <section class="contact-section section-mb">
        <div class="container">
            <?php 
        if(!empty($msg)){
            echo "<div class='col-sm-12 kode-error'>".$msg."</div>";
        } 
        ?>

            <div class="row mb-n7">
                <div class="col-lg-6 mb-7">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">Get in touch</h3>
                        <p>
                            Top rated construction packages we pleasure rationally encounter
                            <br class="d-none d-xl-block">
                     consequences interesting who loves or pursue or desires
                        </p>
                    </div>
                    <!-- contact-title-section end -->

                    <form action="<?=BASE_PATH.'contact_us'?>" id="contactFrom" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group row"> 
                            <div class="col-sm-6">
                                <label for="name" class="control-label">Name <span class="red">*</span></label>  
                                <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" id="name" placeholder="" value="">
                                <span id="error_name" style="display:none; color:red"></span></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="control-label">Email <span class="red">*</span></label>  
                                <div class="col-sm-12"><input type="text" name="email" class="form-control" id="email" placeholder="" value="">
                                    <span id="error_email" style="display:none; color:red"></span></div>
                            </div>
                        </div>
                         <div class="form-group row"> 
                            <div class="col-sm-6">
                                <label for="mobile" class="control-label">Mobile <span class="red">*</span></label>  
                                <div class="col-sm-12">
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="" value="">
                             <span id="error_mobile" style="display:none; color:red"></span></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="subject" class="control-label">Subject <span class="red">*</span></label>  
                                <div class="col-sm-12"><input type="text" name="subject" class="form-control" id="subject" placeholder="" value="">
                                    <span id="error_subject" style="display:none; color:red"></span></div>
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-12">
                                <label for="message" style="width: 12.667%;" class="control-label">Message <span class="red">*</span></label>  
                                <div class="col-sm-12">
                                    <textarea name="message" class="form-control" rows="3" id="message" ></textarea>
                                    <span id="error_message" style="display:none; color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">  
                                <label for="message" class="control-label">Capcha <span class="red">*</span></label>  
                                <div class="col-sm-12" >
                                   <input type="text" name="securityCode"
 id="securityCode" class="form-control" placeholder="Enter Security Code"><br>
                                    <p><img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha'>
                                     &nbsp; Need another security code? <a href="javascript:void(0)" 
            id="reloadCaptcha">click</a></p>
                                </div> 
                        </div>
                        <div class="form-group row" style="margin-top: 10px;">
                            <div class="col-md-12">
                              <input type="submit" name="submit" value="Submit Message" class="btn btn-dark submitData" style="margin-right: 15px;">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 mb-7">
                    <div class="contact-address">
                        <!-- address-list start -->
                        <div class="address-list mb-4 mb-xl-10 pb-2">
                            <h4 class="title">Office Addres</h4>
                            <p>
                               <?=$general_settings['data']['address']?> 
                            </p>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list mb-4 mb-xl-10 pb-2">
                            <h4 class="title">Phone Number</h4>
                            <ul>
                                <li>
                                    <a class="phone-number" href="tel:<?=$general_settings['data']['phone']?>"><?=$general_settings['data']['phone']?> </a>
                                </li> 
                            </ul>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title">Web Address</h4>
                            <ul>
                                <li>
                                    <a class="mailto" href="mailto:<?=$general_settings['data']['email']?>"><?=$general_settings['data']['email']?></a>
                                </li> 
                            </ul>
                        </div>
                        <!-- address-list end -->
                    </div>
                </div>
            </div>
        </div>
    </section> 

 
<?php include('footer.php'); ?> 
<script>
//Refresh Captcha
$(document).ready(function(){
    $("#reloadCaptcha").click(function(){
        var captchaImage = $('#captcha').attr('src');   
        captchaImage = captchaImage.substring(0,captchaImage.lastIndexOf("?"));
        captchaImage = captchaImage+"?rand="+Math.random()*1000;
        $('#captcha').attr('src', captchaImage);
    });
 
$(document).on("click", ".submitData", function(e)
  { 
    var name = $("#name").val();
    var email= $("#email").val(); 
    var mobile = $("#mobile").val();
    var subject = $("#subject").val();
    var message= $("#message").val();
     
    var nname=$.trim(name);
    var eemail=$.trim(email);
    var mmobile=$.trim(mobile);
    var ssubject=$.trim(subject);
    var mmessage=$.trim(message);

     if (nname == ''){  
      var testt='Enter Your Name';
     $("#error_name").show();
     $("#error_name").html(testt);
      return false;
    }
    if (eemail == ''){  
      var testt='Enter Your Email';
     $("#error_email").show();
     $("#error_email").html(testt);
      return false;
    }
    if (ssubject == ''){  
      var testt='Enter Subject';
     $("#error_subject").show();
     $("#error_subject").html(testt);
      return false;
    }
    if (mmessage == ''){  
      var testt='Enter message';
     $("#error_message").show();
     $("#error_message").html(testt);
      return false;
    }
     
    $('#contactFrom').submit();
  
  });
});

</script>