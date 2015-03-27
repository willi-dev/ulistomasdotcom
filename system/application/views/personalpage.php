<div class="span-24"><!-- START OF DIV MAIN CONTENT -->
	<div class="span-24" id="header">
		<div id="top" class="span-15"><!-- START OF DIV TOP // HEADER IMAGE -->
			<?php $this->load->view('top_header') ?>
		</div><!-- END OF DIV TOP // HEADER IMAGE -->
		
		<div id="menu-right" class="span-9 last"><!-- START OF DIV MENU-RIGHT -->
			<?php $this->load->view('menuutama') ?>
		</div><!-- END OF DIV MENU-RIGHT --> 
	</div>
	<div id="content" class="span-24"><hr />
		<div class="photo prepend-12 span-12">
		
			<?php 
			
			if(isset($getphotopersonal)){
				$no=1;
				foreach($getphotopersonal as $gpp){
						/* if($no%3==0){
							$last='last';
						}else{
							$last='';
						} */
					if(!empty($gpp->thumb)){	
			?>		
					<div class="loading">
						<img src="<?php echo base_url();?>asset/loading.gif"/>
					</div>
					<div class="span-12 <?php //echo $last; ?> <?php echo $no; ?>">
						
						<div class="span-12 listjudul">
			<?php
						$judul=str_replace("_"," ",$gpp->title_photopost);
						echo anchor('portfolio/personalphoto/'.str_replace(array('_','&'), array('-',''), $gpp->title_photopost), '<div class="capcat boxcaption">'.$judul.'</div>');
						
			?>
						</div>
					</div>
			<?php		
					}else{		
						echo "";
					}
					$no++;
				}
				 echo '<div class="span-24">'.$this->pagination->create_links().'</div>';
			}else{
				echo '<div class="error">personal work(s) unavailable</div>';
			}
			
			//echo $links;
			?>
		</div>
	</div>
</div><!-- END OF DIV MAIN CONTENT -->