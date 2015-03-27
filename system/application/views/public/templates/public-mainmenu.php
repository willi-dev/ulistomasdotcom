<script type="text/javascript">
$(document).ready(function(){
	//DROPDOWN MENU
		$('.submenu').hide();
		$('#portfolio.mainmenu').hover(
			function(){
				$('.submenu').css('z-index', 9999);
				$('.submenu').css('position', 'absolute');
				$('.submenu').css('width', $('.span-3').width()+"px");
				$('.submenu', this).show(0);
			},
			function(){$('.submenu', this).hide(0);}
		);
})
</script>

<div id="menuutama">
	<ul id="listmainmenu">
		<li>
			<div id="home" class="mainmenu menu-sideborder">
				<?php echo anchor('frontpage/', 'Home')?>
			</div><hr />
		</li>
		<li>
			<div id="portfolio" class="mainmenu menu-sideborder">
				<?php echo anchor(current_url().'#', 'Portfolio') ?>
				<div class="submenu" >
					<div class="subitem menu-sideborder"><?php echo anchor('portfolio/personal', 'Personal');?></div>
					<div class="subitem menu-sideborder"><?php echo anchor('portfolio/commision', 'Commision');?></div>
				</div>
			</div><hr />
		</li>
		<li>
			<div id="about" class="mainmenu menu-sideborder">	
				<?php echo anchor('about', 'About');?>
			</div><hr />
		</li>
		<li>
			<div id="contact" class="mainmenu">	
				<?php echo anchor('contact', 'Contact');?>
			</div><hr />
		</li>
	</ul>
	
	
	
	
</div>