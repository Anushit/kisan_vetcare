<div class="form-background"> 

  <div class="login-box">

    <div class="login-logo">

      <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>

    </div>

    <!-- /.login-logo -->

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Forget Password</p>



        <?php $this->load->view('includes/_messages.php') ?>

        

         <?php echo form_open(base_url('auth/forgot_password'), 'class="login-form" '); ?>

          <div class="form-group has-feedback">

            <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" >

          </div>

          <div class="row">

            <!-- /.col -->

            <div class="col-12">

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Submit">

            </div>

            <!-- /.col -->

          </div>

        <?php echo form_close(); ?>



        <p class="mt-3"><a href="<?= base_url('auth/login'); ?>">You remember Password? Sign In </a></p>



      </div>

      <!-- /.login-card-body -->

    </div>

  </div>

  <!-- /.login-box -->

</div>

          





