<div id="menuutama">
	<div id="home" class="mainmenu span-3">
		<?php echo anchor('frontpage/', 'Home')?>
	</div>
	<div id="portfolio" class="mainmenu span-3">
		<?php echo anchor(current_url().'#', 'Portfolio') ?>
		<div class="submenu" >
			<div class="subitem"><?php echo anchor('portfolio/personal', 'Personal');?></div>
			<div class="subitem"><?php echo anchor('portfolio/commision', 'Commision');?></div>
		</div>
	</div>
	<div id="about" class="mainmenu span-3 last">	
		<?php echo anchor('about', 'About');?>
	</div>
</div>
