<?php
	$this->load->view('public/templates/public-header');
?>
	
	<div class="span-24">
		
		<div id="logo">
			<?php 
				echo anchor('home', '<img src="'.base_url().'uploads/header/header_logo.png" id="headerlogo" width="350px"/>');
			?>
		</div><div class="clear"></div>
		
		<hr style="background: #fff;"/>
		<div class="span-4">
		<?php
			// SIDE MENU
			$this->load->view('public/templates/public-sidemenu');
		?>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
			$(window).load(function(){
				// CENTER FRONTPAGE IMAGE
				$('.frontpageimage').css('height', 450+"px");
				$('.frontpageimage').css('margin-left', ($('.span-20').width()-$('.frontpageimage').width())/2 +"px" );
			})
		})
		</script>
		
		<div id="feature" class="span-20 last">
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
		
		</div>
		
	</div>
	
	
	
	
<?php 
	$this->load->view('public/templates/public-footer');
?>