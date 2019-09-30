<?php if(!defined('basePath')) exit('No direct script access allowed');

$this->getHeader();
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
		<div class="user-container">
			<div class="user-panel">
				<div class="pull-left image">
				  <img src="<?php echo uploadURL?>modules/user/thumbs/mini/<?php echo $this->admin('image')?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
				  <p><?php echo $this->admin('name');?></p>
				  <small><?php echo $this->admin('group_name');?></small>
				</div>
			</div>
			<div class="user-button">
				<ul class="btn-group">
				  <li><a href="<?php echo $this->adminURL()?>my-profile<?php echo $this->permalink()?>" class="btn btn-user"><i class="fa fa-user-o"></i>My profile</a></li>
          <li><a href="<?php echo $this->logoutURL()?>" class="btn btn-power-off"><i class="fa fa-power-off"></i>Sign out</a></li>
				</ul>
			</div>
		</div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
	   <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		</ul>
	  <?php echo $this->adminMenu('left','sidebar-menu');?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $this->pageTitle();?><small><?php echo $this->pageTagline();?></small></h1>
      <?php echo $this->breadcrumb(); ?>
    </section>

    <!-- Main content -->
    <section class="content">
    <? $this->getContent(); ?>

    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->

<?php $this->getFooter(); ?>
