<div class="span-24"><!-- START OF DIV MAIN CONTENT -->
	<div class="span-24" id="header">
		<div id="top" class="span-15"><!-- START OF DIV TOP // HEADER IMAGE -->
			<?php $this->load->view('top_header') ?>
		</div><!-- END OF DIV TOP // HEADER IMAGE -->
		
		<div id="menu-right" class="span-9 last"><!-- START OF DIV MENU-RIGHT -->
			<?php $this->load->view('menuutama') ?>
		</div><!-- END OF DIV MENU-RIGHT --> 
	</div>
	
	<div id="content" class="span-24"> <hr />
		<div class="photo span-24">
			<?php 
			
			if(isset($getphotocommision)){
				$no=1;
				foreach($getphotocommision as $gpc){
					if($no%6==0){
						$last='last';
					}else{
						$last='';
					}
					if(!empty($gpc->thumb)){
			?>
					<div class="gambar fluid span-4 <?php echo $last; ?> <?php echo $no; ?>">
						<div class="span-4">
			<?php
						$judul=SUBSTR(str_replace("_"," ",$gpc->title_photopost), 0, 20);
						$arrayA=array('#','"');
						$arrayB=array('&#35','&#34');
						echo anchor('portfolio/commisionphoto/'.str_replace("_","-",$gpc->title_photopost), '<img src="'.base_url().str_replace($arrayA, $arrayB, $gpc->thumbsquare).'"  width="140px" class="gridimage"/>');
						if(strlen($gpc->title_photopost)<=20){
							echo anchor('portfolio/commisionphoto/'.str_replace("_", "-", $gpc->title_photopost), '<div class="capcat boxcaption">'.$judul.'</div>');
						}else{
							echo anchor('portfolio/commisionphoto/'.str_replace("_", "-", $gpc->title_photopost), '<div class="capcat boxcaption">'.$judul."...".'</div>');
						}
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
				echo '<span class="error">commision work(s) unavailable</span>';
			}
			?>
		</div>
	</div>
</div><!-- END OF DIV MAIN CONTENT -->