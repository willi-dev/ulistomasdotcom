<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Dashboard ~ Ulistomas</title>
	<link href="<?php echo base_url(); ?>asset/css/src/reset.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/print.css" type="text/css" media="print">
	<!--[if lt IE 8]>
	  <link rel="stylesheet" href="<?php echo base_url();?>asset/css/ie.css" type="text/css" media="screen, projection">
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.contentdetail, .maincontent, .panes').hide();
		$('.contentdetail, .maincontent, .panes').fadeIn('slow');
		$("div.css-tabs").tabs("div.css-panes > div",{
			effect: 'fade',
			rotate:false,
			initialIndex: 0
		});
		$("a[rel].addicona, a[rel].edicona, a[rel].adddesc, a[rel].pilih").overlay({
			closeOnClick: true
		});
		$('.addicona, .edicona, .pilih, .adddesc').click(function(){
			$('document').mask(
				{
				closeOnClick: false,
				closeSpeed:'slow',
				color:"#000",
				opacity:0.7
				}
			);
		});
		$('.close').click(function(){
			$.mask.close();
		});
	})
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
    tinyMCE.init({
    //opsi umum
    mode : "textareas",
    theme : "advanced",
    plugins :"pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    //opsi theme
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,|,print,|,ltr,rtl,|,fullscreen",
    // theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : false,
    //kode css pada website andacontent_css : "includefile/tiny.css"
    });
    </script>
</head>
<body id="backend">
	<div class="container">
		<div id="header" class="span-24"><!-- START OF HEADER -->
			<div class="span-24">
				
			<?php 
				$this->load->view('admin/admin_menu'); 
			?>
				
				<?php echo anchor('login/logout','<span class="icon icon151"></span><span class="label">logout</span>', array('class'=>'button')); ?>
			</div>
			
		</div><!-- END OF HEADER -->
		<hr />