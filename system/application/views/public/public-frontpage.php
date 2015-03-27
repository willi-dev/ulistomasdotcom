<?php
	$this->load->view('public/templates/public-header');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.frontpageimage').hide();
		$('.loadingimg').css('margin-left', 467+"px");
		$('.loadingimg').css('margin-top', 227+"px");
		$(window).load(function(){
			// CENTER FRONTPAGE IMAGE
			$('.loadingimg').hide();
			$('.frontpageimage').show();
			$('.frontpageimage').css('height', 470+"px");
			$('.frontpageimage').css('margin-left', ($('.span-24').width()-$('.frontpageimage').width())/2 +"px" );
		});
		
	});
</script>
	
<div class="span-24"><!-- START OF DIV MAIN CONTENT -->

	<div class="span-24" id="header">
		<div id="top" class="span-10"><!-- START OF DIV TOP // HEADER IMAGE -->
			<?php $this->load->view('public/templates/public-logoheader') ?>
		</div><!-- END OF DIV TOP // HEADER IMAGE -->
		
		<div id="menu-right" class="span-14 last"><!-- START OF DIV MENU-RIGHT -->
			<?php $this->load->view('public/templates/public-mainmenu') ?>
		</div><!-- END OF DIV MENU-RIGHT --> 
	</div>
	
	<div id="content" class="span-24">
		<div id="frontpagecontent">
			<div class="photo span-24" ><!-- START OF DIV  -->
				<?php 
				if(isset($getfrontpage)){
					if(!empty($getfrontpage->frontpage_content)){
				echo '<span>';
						$img_pro = array(
							'src' => base_url().$getfrontpage->frontpage_content,
							'class' => 'frontpageimage'
						);
						echo img($img_pro).'<br />';
				echo '</span>';
					}else{
						echo 'photo unavailable';
					}
				}
				?>
				<img src="<?php echo base_url();?>asset/load.gif" class="loadingimg"/>
			</div><!-- END OF DIV -->
		</div>
	</div>
	
</div><!-- END OF DIV MAIN CONTENT -->
	
<?php 
	$this->load->view('public/templates/public-footer');
?>