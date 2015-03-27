<div class="span-24"><!-- START OF DIV MAIN CONTENT -->
	<div class="span-24" id="header">
		<div id="top" class="span-15"><!-- START OF DIV TOP // HEADER IMAGE -->
			<?php $this->load->view('top_header') ?>
		</div><!-- END OF DIV TOP // HEADER IMAGE -->
		
		<div id="menu-right" class="span-9 last"><!-- START OF DIV MENU-RIGHT -->
			<?php $this->load->view('menuutama') ?>
		</div><!-- END OF DIV MENU-RIGHT --> 
	</div>
	
	<div id="content" class="span-24">
		<div id="frontpagecontent"><hr />
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
			</div><!-- END OF DIV -->
		</div>
	</div>
</div><!-- END OF DIV MAIN CONTENT -->