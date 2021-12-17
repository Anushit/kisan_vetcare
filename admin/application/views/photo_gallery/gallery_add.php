  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i>

              Add New Photo Gallery </h3>

          </div>

          <div class="d-inline-block float-right">

            <a href="<?= base_url('gallery/photo'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Photo Gallery List</a>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('gallery/addphoto'), 'class="form-horizontal"');  ?> 
                           
              <div class="form-group row"> 
                <div class="col-sm-6">
                <label for="album" class="col-sm-6 control-label">Album Name <span class="red">*</span></label>  
                  <input type="text" name="album" class="form-control" id="album" placeholder="" value="<?= set_value('album'); ?>">
                </div> 
                
                <div class="col-sm-6">
                <label for="description" class="col-sm-6 control-label">Description </label>  
                  <input type="text" name="description" class="form-control" id="description" placeholder="" value="<?= set_value('description'); ?>">
                </div> 
              </div> 
              
              <div class="form-group row">  
                <div class="col-sm-6">
                  <label for="sort_order " class="col-sm-6 control-label">Sort Order <span class="red">*</span></label>
                  <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '')" value="<?= set_value('sort_order'); ?>">
                </div>   
                <div class="col-md-6">
                  <label for="status" class="col-sm-6 control-label">Select Status <span class="red">*</span></label>                  
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= (set_value('status') == '1')?'selected': '' ?>>Active</option>
                    <option value="0" <?= (set_value('status') == '0')?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div> 


               
              <div class="form-group row"> 
                
                <div class="col-md-6">
                <label class="control-label">Cover Photo</label><br/>
                  <?php if(!empty($gallery['cover_photo'])): ?>
                     <p><img src="<?= base_url($gallery['cover_photo']); ?>" class="image logosmallimg"></p>
                 <?php endif; ?>
                 <input type="file" name="cover_photo" accept=".png, .jpg, .jpeg, .gif, .svg">
                 <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
                 <input type="hidden" name="old_cover_photo" value="<?php echo html_escape(@$gallery['cover_photo']); ?>">
               </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Photo Album" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div> 