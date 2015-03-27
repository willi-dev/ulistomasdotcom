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
				if(isset($getphoto)){
					$arrayfrom=array("_","&#34");
					$arrayout=array(' ','"');
					$no=1;
			?>		
					<div class="span-7">
					<br />
						<h2 id="judulfoto"><?php echo str_replace($arrayfrom, $arrayout,$gettitlephoto->title_photopost);?></h2> <br />
						<div id="deskripsifoto" class="span-7">
							<?php echo str_replace($arrayfrom, $arrayout, $gettitlephoto->description);?>
						</div>
						
					</div>
					<script type="text/javascript">
					$(document).ready(function(){
						$('.grid-thumb').hide();
						$('.loadingimg').css('margin-left', 67+"px");
						$('.loadingimg').css('margin-top', 67+"px");
						
						var gridouterthumb = $('.grid-outerthumb');
						var gridinnerthumb = $('.grid-innerthumb');
						var gitWidth = gridinnerthumb.width();
						var gitHeight = gridinnerthumb.height();
						var orWidth, orHeight = 0;
						var newWidth = [], newHeight = [], mLeft = [], mTop = [];
						$(window).load(function(){
							$('.loadingimg').hide();
							$('.grid-thumb').show();
							$('.grid-thumb').each(function(i){
								orWidth = $(this).width();
								orHeight = $(this).height();
								if(orWidth != orHeight){
									if(orWidth < orHeight){
										$(this).css('width', 150+"px");
										ar = parseFloat(orHeight/orWidth);
										newWidth[i] = 150;
										newHeight[i] = ar*newWidth[i];
										mLeft[i] = (gitWidth-newWidth[i])/2;
										mTop[i] = (gitHeight-parseInt(newHeight[i]))/2;
										$(this).css('margin-left', mLeft[i]+"px");
										$(this).css('margin-top', mTop[i]+"px");
									}else{
										$(this).css('height', 150+"px");
										ar = parseFloat(orWidth/orHeight);
										newHeight[i] = 150;
										newWidth[i] = ar*newHeight[i];
										mLeft[i] = (gitWidth-parseInt(newWidth[i]))/2;
										mTop[i] = (gitHeight-newHeight[i])/2;
										$(this).css('margin-left', mLeft[i]+"px");
										$(this).css('margin-top', mTop[i]+"px");
									}
								}else{
									$(this).css('width', 150+"px");
									$(this).css('height', 150+"px");
									newWidth[i] = 150;
									newHeight[i] = 150;
									mLeft[i] = (gitWidth-newWidth[i])/2;
									mTop[i] = (gitHeight-newHeight[i])/2;
									$(this).css('margin-left', mLeft[i]+"px");
									$(this).css('margin-top', mTop[i]+"px");
								}
							});
						});
					});
					</script>
					<br />
					<div class="prepend-1 span-16 last">
					<?php
						foreach($getphoto as $gp){
							if($no%4==0){
								$last='last';
							}else{
								$last='';
							}
							
					?>
							<a href="<?php echo base_url();?>portfolio/commisionphoto/<?php echo str_replace(array('_','&'), array('-',''), $gettitlephoto->title_photopost); ?>/page/<?php echo $no-1;?>">
								<div class="grid-outerthumb span-4 <?php echo $last;?>">
									<div class="grid-innerthumb span-4">
										<img src="<?php echo base_url();?><?php echo $gp->thumb;?>" alt="" class="grid-thumb" />
										<img src="<?php echo base_url();?>asset/load.gif" alt="" class="loadingimg"/>
									</div>
								</div>
							</a>
					<?php
							$no++;
						}
					?>
					</div>
				<?php
				}else{
				
				}
			?>
		
		</div>
		
	</div>
	
<?php 
	$this->load->view('public/templates/public-footer');
?>