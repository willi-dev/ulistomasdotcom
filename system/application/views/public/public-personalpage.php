<?php
	$this->load->view('public/templates/public-header');
?>
	
	<div id="middlecontent" class="span-24">
		<div class="span-24" id="header">
			<div id="top" class="span-10"><!-- START OF DIV TOP // HEADER IMAGE -->
				<?php $this->load->view('public/templates/public-logoheader') ?>
			</div><!-- END OF DIV TOP // HEADER IMAGE -->
			
			<div id="menu-right" class="span-14 last"><!-- START OF DIV MENU-RIGHT -->
				<?php $this->load->view('public/templates/public-mainmenu') ?>
			</div><!-- END OF DIV MENU-RIGHT --> 
		</div>
		
		<div class="span-24" id="content">
			
			<?php
				if(isset($getphotos)){
					$arrayfrom=array("_","&#34");
					$arrayout=array(' ','"');
			?>		
					<div class="span-7">
					<br />
						<h2 id="judulfoto"><?php echo str_replace($arrayfrom, $arrayout,$gettitlephoto->title_photopost);?></h2> <br />
						<div id="deskripsifoto" class="span-7">
							<?php echo str_replace($arrayfrom, $arrayout, $gettitlephoto->description);?>
						</div>
						<?php 
						foreach($getphotos as $gp){
							if(!empty($gp->description)){
								echo '<div id="" class="desc">'.str_replace(array('_', '"', '#'), array(' ', '&#34;', '#'), $gp->description).'</div>';
							}else{
								echo "";
							}
						}
						?>
					</div>
					
					<script type="text/javascript">
					$(document).ready(function(){
						$('.photo-single').hide();
						$('.loadingimg').css('margin-left', 306+"px");
						$('.loadingimg').css('margin-top', 226+"px");
						var photowrapsingle = $('.photo-wrapsingle');
						var photoinnerwrapsingle = $('.photo-innerwrapsingle');
						var pwsWidth = photowrapsingle.width();
						var pwsHeight = photowrapsingle.height();
						var orWidth, orHeight = 0;
						var newWidth = [], newHeight = [], mLeft = [], mTop = [];
						$(window).load(function(){
							$('.loadingimg').hide();
							$('.photo-single').show();
							$('.photo-single').each(function(i){
								orWidth = $(this).width();
								orHeight = $(this).height();
								if(orWidth != orHeight){
									if(orWidth < orHeight){
										ar = parseFloat(orWidth/orHeight);
										$(this).css('height', 450+"px");
										newHeight[i] = 450;
										newWidth[i] = ar*newHeight[i];
										mLeft[i] = (pwsWidth-parseInt(newWidth[i]))/2;
										mTop[i] = (pwsHeight-newHeight[i])/2;
										$(this).css('margin-left', mLeft[i]+"px");
										$(this).css('margin-top', mTop[i]+"px");
									}else{
										ar = parseFloat(orHeight/orWidth);
										$(this).css('width', 450+"px");
										newWidth[i] = 450;
										newHeight[i] = ar*newWidth[i];
										mLeft[i] = (pwsWidth-newWidth[i])/2;
										mTop[i] = (pwsHeight-parseInt(newHeight[i]))/2;
										$(this).css('margin-left', mLeft[i]+"px");
										$(this).css('margin-top', mTop[i]+"px");
									}
								}else{
									$(this).css('width', 390+"px");
									$(this).css('height', 390+"px");
									newWidth[i] = 390;
									newHeight[i] = 390;
									mLeft[i] = (pwsWidth-newWidth[i])/2;
									mTop[i] = (pwsHeight-newHeight[i])/2;
									$(this).css('margin-left', mLeft[i]+"px");
									$(this).css('margin-top', mTop[i]+"px");
								}
							});
							
						});
					});
					</script>
			<?php
					foreach($getphotos as $gps){
			?>
					
					<div class="prepend-1 span-16 last">
						<div class="span-16">
							
							<span class="navpaging">
								<a href="<?php echo base_url();?>portfolio/personalphoto/<?php echo $titleuri;?>/grid">View as Thumbnail</a> |  
							</span>
							<span class="navpaging">
								<?php 
									$numawal = $this->uri->segment(5) + 1;
									$numakhir = $count;
								?>
								&nbsp;<?php echo $numawal ;?> of <?php echo $numakhir;?>&nbsp;
								
							</span> | 
							<?php echo $link;?>
						
						</div><br /><br />
							<div class="clear"></div>
						
						<div class="span-16 photo-wrapsingle">
							<div class="photo-innerwrapsingle">
								<img src="<?php echo base_url();?><?php echo $gps->photopost;?>" alt="" class="photo-single"/>
								<img src="<?php echo base_url();?>asset/load.gif" alt="" class="loadingimg"/>
							</div>
							
						</div>
					</div>
			<?php		
					
					}
						
				}else{
				
				}
			?>
			
		</div>
		
	</div>
	
<?php 
	$this->load->view('public/templates/public-footer');
?>