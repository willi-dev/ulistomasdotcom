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
				if(isset($contactcontent)){
					if(!empty($contactcontent->contact)){
						echo '<div class="contactcontent span-11 last">'.str_replace(array('_','&#34'),array(' ','"'), html_entity_decode($contactcontent->contact)).'</div>';
					}else{
						echo '<div class=" span-11 last notice">Unavailable</div>';
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