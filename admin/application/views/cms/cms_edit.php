<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit CMS </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Cms List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('includes/_messages.php') ?>
           
            <?php echo form_open(base_url('cms/edit/'.$cms['id']), 'class="form-horizontal"' )?> 
              <div class="form-group row">
                 <div class="col-sm-6">
                  <label for="cms_name" class="col-sm-6 control-label">CMS Page Name</label>
                  <div class="form-control bggray"><?= $cms['cms_name']; ?></div>
                  <input type="hidden" name="cms_name" class="form-control" value="<?= @$cms['cms_name']; ?>">
                </div>
                <div class="col-sm-6">
                   <label for="cms_title" class="col-sm-6 control-label">Title <span class="red">*</span></label>
                  <input type="text" name="cms_title" class="form-control" id="cms_title" placeholder="" value="<?= set_value('cms_title',$cms['cms_title']); ?>">
                </div>
              </div> 
               
              <div class="form-group row"> 
                <label for="cms_contant" class="col-sm-6 control-label">Contant <span class="red">*</span></label>
                <div class="col-sm-12">   
                  <textarea name="cms_contant" class="form-control textarea" id="cms_contant" placeholder=""><?= set_value('cms_contant',$cms['cms_contant']); ?></textarea> 
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label for="meta_title" class="col-sm-6 control-label">Meta Title <span class="red">*</span></label>
                  <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="" value="<?= set_value('meta_title',$cms['meta_title']); ?>">
                </div>
                <div class="col-sm-6">
                  <label for="meta_keyword" class="col-sm-6 control-label">Meta Keyword <span class="red">*</span></label>
                  <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="" value="<?= set_value('meta_keyword',$cms['meta_keyword']); ?>">
                </div>
              </div>
 
              <div class="form-group row">
                <label for="meta_description" class="col-sm-6 control-label">Meta Description <span class="red">*</span></label>
                <div class="col-sm-12">
                 <textarea name="meta_description" class="form-control" id="meta_description" placeholder=""><?= set_value('meta_description',$cms['meta_description']); ?></textarea>  
                </div>
              </div>
               
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status <span class="red">*</span></label>

                <div class="col-md-12">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= (set_value('is_active',$cms['is_active']) == '1')?'selected': '' ?> >Active</option>
                    <option value="0" <?= (set_value('is_active',$cms['is_active']) == '0')?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update CMS" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>  
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
 $(function () { 
    // bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5({
      toolbar: { fa: true, "html": true},
      "html": true,  
      parser: function(html) {
        return html;
      }
    }) 
  })
</script>     