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
		<h2>Portfolio of ulistomas</h2>
		<div class="eachlink">
			<?php
				echo anchor('portfolio/personal','Personal Work(s)');
				echo br();
				echo anchor('portfolio/commision','Commision Work(s)');
			?>
		</div>
	</div>
</div><!-- END OF DIV MAIN CONTENT -->