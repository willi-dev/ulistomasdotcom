<div class="span-24"><!-- START OF DIV MAIN CONTENT -->
	<div id="header" class="span-24" >
		<div id="top" class="span-15"><!-- START OF DIV TOP // HEADER IMAGE -->
			<?php $this->load->view('top_header') ?>
		</div><!-- END OF DIV TOP // HEADER IMAGE -->
		
		<div id="menu-right" class="span-9 last"><!-- START OF DIV MENU-RIGHT -->
			<?php $this->load->view('menuutama') ?>
		</div><!-- END OF DIV MENU-RIGHT --> 
	</div>
	<div id="contentdetail" class="span-24"><hr /><!-- START OF DIV CONTENT -->
		<div class="span-16" id=""><!-- START OF DIV PHOTOSLIDE -->
			<div class="loading">
				<img src="<?php echo base_url();?>asset/loading.gif"/>
			</div>
			<div id="mainscroll" class="span-16">
				<div id="scrollable" >
		<?php
			if(isset($getphoto)){
				foreach($getphoto as $gpt){
					$arrayA=array('#','"');
					$arrayB=array('&#35','&#34');
					echo '<div class="wrap">
						<div class="itemsphoto">';
						echo '<img src="'.base_url().str_replace($arrayA, $arrayB, $gpt->photopost).'"  class="itemphoto"/>';
						if(!empty($gpt->description)){
							echo '<div id="" class="desc">'.str_replace(array('_', '"', '#'), array(' ', '&#34;', '#'), $gpt->description).'</div>';
						}else{
							echo "";
						}
					echo '</div>
							</div>';
				}
			}else{
				echo '<div class="span-16"><div class="error">'.$notice.'</div></div>';
			}
		?>		</div>
			</div>
		</div><!-- END OF DIV PHOTOSLIDE -->
		
		<div class="span-8 last">
			<div class="wrapdesc">
			<?php
				$arrayfrom=array("_","&#34");
				$arrayout=array(' ','"');
				if(isset($gettitlephoto)){
					echo '<blockqoute><h2 id="titlephoto">'.str_replace($arrayfrom, $arrayout, $gettitlephoto->title_photopost).'</h2></blockqoute>';
					echo '<span id="spandesc" ><p class="span-5">'.str_replace($arrayfrom, $arrayout, $gettitlephoto->description).'</p></span>';
				}else{
					echo '<div class="span-8"><div class="error">'.$notice.'</div></div>';
				}
			?>
			</div>
			<div><!-- START OF DIV ~ LINK BACK -->
				<p class="linkback">
				<?php
					echo $link_back;
				?>
				</p>
			</div><!-- END OF DIV ~ LINK BACK -->	
			<hr />
			<div class="loading">
				<img src="<?php echo base_url();?>asset/loading.gif"/>
			</div>
			<div id="navi" class="span-8">
				<?php
					if(isset($getphoto)){
						$nourut=1;
						foreach($getphoto as $gp){
							$arrayA=array('#','"');
							$arrayB=array('&#35','&#34');
							if($nourut%4==0){
								$last='last';
							}else{
								$last='';
							}
							echo '<div class="fluid span-2 '.$last.'">';
								echo '<img src="'.base_url().str_replace($arrayA, $arrayB, $gp->thumbsquare).'" width="69px" class="thumbsquare" />';
							echo '</div>';
							$nourut++;
						}
					}else{
						echo '<div class="span-8 last"><div class="error">thumbnail(s) unavailable</div></div>';
					}
				?>
			</div>
		</div>
		<div class="clear"></div>
		
	</div><!-- END OF DIV CONTENT -->
	<hr />
</div><!-- END OF DIV MAIN CONTENT -->