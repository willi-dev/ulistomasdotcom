<?php
	$this->load->view('public/templates/public-header');
?>
	
	<div class="span-24">
		<div class="span-24" id="header">
			<div id="top" class="span-10"><!-- START OF DIV TOP // HEADER IMAGE -->
				<?php $this->load->view('public/templates/public-logoheader') ?>
			</div><!-- END OF DIV TOP // HEADER IMAGE -->
			
			<div id="menu-right" class="span-14 last"><!-- START OF DIV MENU-RIGHT -->
				<?php $this->load->view('public/templates/public-mainmenu') ?>
			</div><!-- END OF DIV MENU-RIGHT --> 
		</div>
		
		<div class="span-24" id="content">
		
			<div class="prepend-11">
			<?php
				if(isset($aboutcontent)){
					if(!empty($aboutcontent->photo)){
						echo '<div class="span-4 fotoabout"><img src="'.$aboutcontent->photo.'" alt="" width="150px"/></div>';
						echo '<div class="aboutcontent span-11 last">'.str_replace(array('_','&#34'),array(' ','"'), $aboutcontent->about).'</div>';
					}else{
						echo '<div class="aboutcontent span-11 last">'.str_replace(array('_','&#34'),array(' ','"'), $aboutcontent->about).'</div>';
					}
				}else{
					echo '<div class="notice">nothing</div>';
				}
			?>
			</div>
		</div>
		
	</div>
	
<?php 
	$this->load->view('public/templates/public-footer');
?>