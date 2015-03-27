<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Ulistomas - <?php if(!empty($title)){ echo $title;}else{ redirect('frontpage/');} ?></title>
	<link rel="shortcut icon" href="<?php echo base_url();?>asset/U.png">
	<link href="<?php echo base_url(); ?>asset/css/src/reset.css" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/print.css" type="text/css" media="print">
	<!--[if lt IE 8]>
	  <link rel="stylesheet" href="<?php echo base_url();?>asset/css/ie.css" type="text/css" media="screen, projection">
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#container').css('min-height', $(window).height()+"px");
	})
	</script>
	
</head>
<?php 
	if($this->uri->segment(1)=="login"){
		$idbody="login";
	}else{
		$idbody="frontend";
	}
?>
<body id="<?php echo $idbody; ?>">
	<div class="container">