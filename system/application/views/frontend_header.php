<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>ulistomas, photography is reflections. It reflects what you see, feel, and think</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>asset/U.png">
	<link href="<?php echo base_url(); ?>asset/css/src/reset.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/print.css" type="text/css" media="print">
	<!--[if lt IE 8]>
	  <link rel="stylesheet" href="<?php echo base_url();?>asset/css/ie.css" type="text/css" media="screen, projection">
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		// LOGIN FORM
		$('fieldset').each(function(){
			var heading = $('legend', this).remove().text();
			$('<h3 class="titleform"></h3>').text(heading).prependTo(this);
			}
		);
		$('.loading img').css('width',40+"px");
		$('.frontpagephoto, #contentdetail, #aboutcontent, #formcontent, #menusubcatp, #menusubcatc, .gambar,.itemsphoto, #navi').hide();	
		$('#contentdetail, #aboutcontent, #formcontent').fadeIn('slow');
		// CENTER WELCOME PAGE
		$('#front').css('margin-top', ($(window).height()- $('#frontimg').height()) / 2 + "px");
		$('#front').css('margin-left', ($('.container').width()- $('#front').width()) / 2 + "px");
		$(window).load(function(){
			$('.loading img').hide();
			$('.itemsphoto, #navi, .gambar, .frontpagephoto').fadeIn();
			// CENTER FRONTPAGE IMAGE
			$('.frontpageimage').css('height', 550+"px");
			$('.frontpageimage').css('margin-left', ($('.span-24').width()-$('.frontpageimage').width())/2 +"px" );
		});
		//DROPDOWN MENU
		$('.submenu').hide();
		$('#portfolio.mainmenu').hover(
			function(){
				$('.submenu').css('z-index', 9999);
				$('.submenu').css('position', 'absolute');
				$('.submenu').css('width', $('.span-3').width()+"px");
				$('.submenu', this).show('slow');
			},
			function(){$('.submenu', this).hide('slow');}
		);
	});
	</script>
	<script type="text/javascript"><!-- SCROLLABLE -->
		$(document).ready(function(){
			$('#mainscroll').scrollable({easing : 'swing', speed:800, circular: true}).navigator('#navi');
			var mainscroll = $('#mainscroll');
			var itemsphoto = $('.itemsphoto');
			var itemphoto = $('.itemsphoto').children('img');
			var msWidth = $(mainscroll).width();
			var msHeight = $(mainscroll).height();
			var jumlahimg= $('.itemsphoto').length;
			var newwidth = [];
			var newheight = [];
			$('.wrap').css('width', 630+"px");
			var wrap = $('.wrap').width();
			var oriWidth, oriHeight = 0;
			var marginleft = [], border=[];
			$(window).load(function(){
				$('.itemsphoto').each(function(i){
					oriWidth = $(this).children().width();
					oriHeight = $(this).children().height();
					aspectratio = parseFloat(oriWidth/oriHeight);
					$(this).children('img').css('height', 400+"px");
					newheight[i]= 400;
					newwidth[i]= aspectratio*400;
					marginleft[i]=(wrap-newwidth[i])/2;
					//APPLY BORDER, CAN DELETE OR COMMENT
					//$(this).children('.itemphoto').css({'border' : 10+'px solid #000'});
					$(this).children('.desc').css('width', newwidth[i]+"px");
					$(this).children('.desc').css('margin-left', marginleft[i]+"px");
					$(this).children('.itemphoto').css('margin-left', marginleft[i]+"px");
					$(this).children('.itemphoto').css('margin-top', (msHeight-newheight[i])/2+"px");
					//$(this).text(marginleft[i]);
				});
			});
		});
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
	
