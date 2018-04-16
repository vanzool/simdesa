<?php 
  $controller = $this->router->fetch_class();
  $method     = $this->router->fetch_method();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/bootstrap/dist/css/bootstrap.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/components/select2/dist/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php //echo base_url('assets/dist/css/custom.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/morris.js/morris.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/jvectormap/jquery-jvectormap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url('assets/components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <style type="text/css">
    .content-wrapper {
      min-height: 950px !important;
    }
    .nav-tabs-custom>.nav-tabs>li.active>a {
      font-weight: bold;
    }
    .heading {
      font-size: 14px;
      background: #f5f5f5;
      padding: 10px;
      font-weight: bold;
      margin-top: 0;
      border: 1px solid #f4f4f4;
      border-top: 2px solid #3c8dbc;
      border-radius: 3px;
    }

    @media (min-width: 992px) {
    .modal-lg {
        width: 95% !important;
    }
  </style>
</head>
<?php
/*
  $time_allowed = 0;
   
  if($this->session->userdata('time_allowed')){
    $time_allowed = $this->session->userdata('time_allowed');
  }
  if (!$this->session->userdata('endOfTimer')){
    $endOfTimer = time() + $time_allowed;
    $this->session->set_userdata('endOfTimer',$endOfTimer);
  }
   
  if(($this->session->userdata('endOfTimer') - time()) < 0) {
    $timeTilEnd = 0;
  }else{
    $timeTilEnd = $time_allowed;
  }
   
  function secondsToWords($seconds){
    $ret = "";
    $hours = intval(intval($seconds) / 3600);
    if($hours > 0){
      $ret .= "$hours:";
    }
    $minutes = bcmod((intval($seconds) / 60),60);
    if($hours > 0 || $minutes > 0){
      $ret .= "$minutes:";
    }
    $seconds = bcmod(intval($seconds),60);
    if($seconds < 10){
      $ret .= "0"."$seconds";
    }else{
      $ret .= "$seconds";
    }
    return $ret;
  }
  */
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>SIM</b>Desa</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-clock-o"></i>
                <span class="top-timer"> 
                  Sisa Waktu <span id="timer"><?php //echo secondsToWords($timeTilEnd); ?></span>
                </span>
              </a>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="hidden-xs"><?php echo $this->session->userdata('Nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('Nama').' - '.$this->session->userdata('GrupMenu'); ?> 
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <?php //$this->load->view('sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Breadcrumb -->
    <section class="content-header">
      <h1><?php echo $breadcrumb; ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
      </ol>
    </section>
    <!-- Breadcrumb -->

    <!-- Flash Message -->


    <!-- Main content -->
    <section class="content">
      <?= $contents; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Alkana Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab"></div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('assets/components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="<?php echo base_url('assets/components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/fastclick/lib/fastclick.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/bootbox.min.js'); ?>"></script>
<script>
  $(function () {
  	$('.delete_product').click(function(e){
			
			e.preventDefault();
			
			var pid 	= $(this).attr('data-id');
			var name 	= $(this).attr('data-name');
			var parent 	= $(this).parent("td").parent("tr");
			
			bootbox.dialog({
			  message: "Apakah Anda yakin ingin menghapus data <strong>"+name+"</strong> ini ?",
			  title: "<i class='fa fa-question-circle'></i> Konfirmasi",
			  buttons: {
				success: {
				  label: "Kembali",
				  className: "btn-default",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "Hapus",
				  className: "btn-danger",
				  callback: function() {
					  $url = "<?php echo base_url('master/deletependuduk'); ?>";
					  $.post($url, {'NIK':pid })
						  .done(function(response){
							  bootbox.alert(response);
							  parent.fadeOut('slow');
						  })
						  .fail(function(){
							  bootbox.alert('Terjadi Kesalahan');
						  })
					
					  					  
				  }
				}
			  }
			});
			
		});

  	$('.dataTables_length label').val('Tampilkan');

  	$('#filterparam').hide();
  	$('#filter').change(function() {
  		if($(this).val() == '0') {
  			$('#filterparam').hide('slow');
  		} else {
  			$('#filterparam').show('slow');
  			$('#filtervalue').text($(this).val());
  		}
  	})

    $('#example1').DataTable();


  	$('button').click(function() {
  		var hh = $(this).attr('id');
  		
  	});


  	$('#validasi').hide();

  	$('#ddlkawin').change(function() {
      if($(this).val() == 'Belum Kawin') {
      	$('#txtaktaperkawinan').attr('disabled',true);
      }
      else {
      	$('#txtaktaperkawinan').removeAttr('disabled');
      }
    })

    $('#ddldivisi').change(function() {
      var val = $(this).val();
      
      $.ajax({
        url: '<?php echo base_url('master/getMappingDivisi'); ?>',
        type : 'post',
        data : { iddivisi : val },
        dataType: 'json',
        success: function(data) {
          $('#ddljabatan').children('option').remove();
          $.each( data, function( key, value ) {
            $("#ddljabatan").append('<option value='+value.ID+'>'+value.Jabatan+'</option>');
          });
        },
        error: function(error) {
          alert(error);
        }
      })
    })


    $('#informal').hide();
    $('#formal').hide();

    $('#ddljp').change(function() {
      var val = $(this).val();
      if (val == '1') {
        $('#formal').slideDown('slow');
        $('#informal').slideUp('slow');
      } else if(val == '2') {
        $('#informal').slideDown('slow');
        $('#formal').slideUp('slow');
      } else {
        $('#informal').hide();
        $('#formal').hide();
      }
    })

    $('#modal-jabatan').click(function() {

      $.ajax({
        url: '<?php echo base_url('master/getjabatan'); ?>',
        dataType: 'json',
        success: function(data) {
          var table = $('#tweetPost').children();
          $.each(data, function(i, item) {
            table.append("<tr><td>"+item.ID+"</td><td>"+item.Jabatan+"</td></tr>");
          });
        },
        error: function(error) {
          alert(error);
        }
      })
    })

    $('.select2').select2();
    $('#datepicker').datepicker({
      autoclose: true
      //format : 'yyyy-mm-dd',
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
  });

</script>
</body>
</html>