<div class="span-24"><!-- START OF DIV MAIN CONTENT -->
	<div class="span-24" id="header">
		<div id="top" class="span-15"><!-- START OF DIV TOP // HEADER IMAGE -->
			<?php $this->load->view('top_header') ?>
		</div><!-- END OF DIV TOP // HEADER IMAGE -->
		
		<div id="menu-right" class="span-9 last"><!-- START OF DIV MENU-RIGHT -->
			<?php $this->load->view('menuutama') ?>
		</div><!-- END OF DIV MENU-RIGHT --> 
	</div>
	
	<div id="aboutcontent" class="span-24"><hr />
		<div id="right">
			<div class="span-20 last">
			<?php
				if(isset($aboutcontent)){
					if(!empty($aboutcontent->photo)){
						echo '<div class="span-4 fotoabout"><img src="'.$aboutcontent->photo.'" alt="" width="150px"/></div>';
						echo '<div class="aboutcontent span-12 last">'.str_replace(array('_','&#34'),array(' ','"'), $aboutcontent->about).'</div>';
					}else{
						echo '<div class="aboutcontent span-12 last">'.str_replace(array('_','&#34'),array(' ','"'), $aboutcontent->about).'</div>';
					}
				}else{
					echo '<div class="notice">nothing</div>';
				}
			?>
			</div>
			
		</div>
	</div>
</div><!-- END OF DIV MAIN CONTENT -->