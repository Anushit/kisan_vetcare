<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Term </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('team'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Term List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('team/add'), 'class="form-horizontal"');  ?>                            
              <div class="form-group row"> 
                <div class="col-sm-6">
                <label for="name" class="col-sm-6 control-label">Name <span class="red">*</span></label>  
                  <input type="text" name="name" class="form-control" id="name" placeholder="" value="<?= set_value('name'); ?>">
                </div>
                <div class="col-sm-6">
                <label for="department" class="col-sm-6 control-label">Department<span class="red">*</span></label>  
                  <input type="text" name="department" class="form-control" id="department" placeholder="" value="<?= set_value('department'); ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                <label for="designation" class="col-sm-6 control-label">Designation <span class="red">*</span></label>  
                  <input type="text" name="designation" class="form-control" id="designation" placeholder="" value="<?= set_value('designation'); ?>">
                </div>
                <div class="col-sm-6">
                  <label for="twitter " class="col-sm-6 control-label">Twitter Link</label>
                  <input type="text" name="twitter" class="form-control" id="twitter" placeholder="" value="<?= set_value('twitter'); ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6">
                <label for="facebook" class="col-sm-6 control-label">Facebook Link</label>  
                  <input type="text" name="facebook" class="form-control" id="facebook" placeholder="" value="<?= set_value('facebook'); ?>">
                </div>
                <div class="col-sm-6">
                  <label for="instagram " class="col-sm-6 control-label">Instagram Link</label>
                  <input type="text" name="instagram" class="form-control" id="instagram" placeholder="" value="<?= set_value('instagram'); ?>">
                </div>
              </div>

                  <div class="form-group row">
                <div class="col-sm-6">
                <label for="linkedin" class="col-sm-6 control-label">Linkedin Link</label>  
                  <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="" value="<?= set_value('linkedin'); ?>">
                </div>
                <div class="col-sm-6">
                  <label for="google " class="col-sm-6 control-label">Google Link</label>
                  <input type="text" name="google" class="form-control" id="google" placeholder="" value="<?= set_value('google'); ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label for="sort_order " class="col-sm-6 control-label">Sort Order <span class="red">*</span></label>
                  <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^\d\.]/g, '')" value="<?= set_value('sort_order'); ?>">
                </div>
                <div class="col-md-6">
                  <label for="status" class="col-sm-6 control-label">Select Status <span class="red">*</span></label>                  
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= (set_value('status')  == '1')?'selected': '' ?>>Active</option>
                    <option value="0" <?= (set_value('status')  == '0')?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div> 
               
              <div class="form-group row"> 
                <div class="col-md-6">
                <label class="control-label">Image</label><br/>
                  <?php if(!empty($team['image'])): ?>
                     <p><img src="<?= base_url($team['image']); ?>" class="image logosmallimg"></p>
                 <?php endif; ?>
                 <input type="file" name="image" accept=".png, .jpg, .jpeg, .gif, .svg">
                 <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
                 <input type="hidden" name="old_image" value="<?php echo html_escape(@$team['image']); ?>">
               </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Term" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div> 