<?php if (!defined('basePath')) exit('No direct script access allowed');

//adodb_pr($this->session('adminmenu'));

$admin = $this->session('admin');
echo $this->form->alert('ok','Welcome '.ucwords($admin['name']));
$month 	= '';
$year	= '';
?>

<div class="row">
	<div class="col-sm-7 col-sm-7 col-xs-12">
		<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">This Month</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php $this->stats->displayVisitorStatistic($month, $year); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		<div class="space"></div>
	</div>
	<div class="col-sm-5 col-sm-6 col-xs-12">
		<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Referrer Websites</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php $this->stats->displayVisitorReferrer($month, $year); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		<div class="space"></div>
	</div>
</div>
