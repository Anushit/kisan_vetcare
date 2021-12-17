<?php  
if(!empty($this->uri->segment(2))){
  $cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
}else{
  $cur_tab = $this->uri->segment(1)==''?'dashboard': $this->uri->segment(1);  
}
?>  

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
    <img src="<?= base_url($this->general_settings['logo']); ?>" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $this->general_settings['application_name']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/dist/img/avatar01.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= ucwords($this->session->userdata('username')); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li id="profile" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Profile
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('profile'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Change Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('profile/change_pwd'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
          </ul>
        </li>

        <?php if($this->general_premissions['dashboard']['is_allow']==1){ ?>
        <li id="dashboard" class="nav-item">
          <a href="<?= base_url('dashboard'); ?>" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Dashboard 
            </p>
          </a> 
        </li>
        <?php } ?>
        
        <?php if($this->general_premissions['subadmin']['is_allow']==1){ ?>
        <li id="subadmin" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user-circle"></i>
            <p>
              Sub Admin
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('subadmin'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Sub Admin List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('subadmin/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Sub Admin</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
        
        <?php if($this->general_premissions['users']['is_allow']==1){ ?>
        <li id="users" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Users
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('users'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Users List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('users/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New User</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php if($this->general_premissions['cms']['is_allow']==1){ ?>
        <li id="cms" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file-text-o"></i>
            <p>
              CMS
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('cms'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>CMS List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('cms/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Page</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['category']['is_allow']==1){ ?>
        <li id="category" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tags"></i>
            <p>
              Categories
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('category'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Categories List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('category/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Category</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['product']['is_allow']==1){ ?>
        <li id="product" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-shopping-basket"></i>
            <p>
              Products
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('product'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Products List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('product/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Product</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['service']['is_allow']==1){ ?>
        <li id="service" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-server"></i>
            <p>
              Services
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('service'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Services List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('service/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Service</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['partner']['is_allow']==1){ ?>
        <li id="partner" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-address-book-o"></i>
            <p>
              Partners
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('partner'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Partners List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('partner/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Partner</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['events']['is_allow']==1){ ?>
        <li id="events" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
            <p>
              Events
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('events'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Events List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('events/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Event</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['news']['is_allow']==1){ ?>
         <li id="news" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-newspaper-o"></i>
            <p>
              News & Updates
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('news'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>News & Updates List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('news/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New News & Updates</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['blogs']['is_allow']==1){ ?>        
        <li id="blogs" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-rss"></i>
            <p>
              Blogs
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('blogs'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Blogs List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('blogs/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Blogs</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['team']['is_allow']==1){ ?>
        <li id="team" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-vcard-o"></i>
            <p>
              Teams
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('team'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Teams List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('team/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Team</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['career']['is_allow']==1){ ?>
        <li id="carrer" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-graduation-cap"></i>
            <p>
              Carrer
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('carrer'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Carrer List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('carrer/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Carrer</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php if($this->general_premissions['testimonial']['is_allow']==1){ ?>
        <li id="testimonial" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-comments-o"></i>
            <p>
              Testimonials
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('testimonial'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Testimonials List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('testimonial/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Testimonial</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php if($this->general_premissions['banner']['is_allow']==1){ ?>
        <li id="banner" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-picture-o"></i>
            <p>
              Banners
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('banner'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Banners List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('banner/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Banner</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['photo_gallery']['is_allow']==1){ ?>
        <li id="photo" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file-image-o"></i>
            <p>
              Photo Gallery
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('gallery/photo'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Photo List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('gallery/addphoto'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Photo</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['video_gallery']['is_allow']==1){ ?>
        <li id="video" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-youtube-square"></i>
            <p>
              Video Gallery
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('gallery/video'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Video List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('gallery/addvideo'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Video</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_premissions['inquery']['is_allow']==1){ ?>
        <li id="inquiry" class="nav-item">
          <a href="<?= base_url('inquiry'); ?>" class="nav-link">
            <i class="nav-icon fa fa-question-circle"></i>
            <p>
              Inquires
            </p>
          </a>
        </li>
        <?php } ?>

        <?php if($this->general_premissions['general_settings']['is_allow']==1){ ?>
        <li id="general_settings" class="nav-item">
          <a href="<?= base_url('general_settings'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              General Settings
            </p>
          </a>
        </li>
        <?php } ?>

        <?php if($this->general_premissions['export']['is_allow']==1){ ?>        
        <li id="export" class="nav-item">
          <a href="<?= base_url('export'); ?>" class="nav-link">
            <i class="nav-icon fa fa-life-ring"></i>
            <p>
              Backup & Export Database 
            </p>
          </a> 
        </li>
        <?php } ?>          

       
  
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>