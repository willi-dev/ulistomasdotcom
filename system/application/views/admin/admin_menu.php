<div>
	<?php 
		echo anchor('admin/main/','<span class="icon icon108"></span><span class="label">Dashboard</span>', array('class'=>'button left', 'id'=>'dashboard'));
		echo anchor('admin/photo/','<span class="icon icon34"></span><span class="label">Photo Project</span>', array('class'=>'button middle', 'id'=>'photobut'));
		echo anchor('admin/about/','<span class="icon icon111"></span><span class="label">About & Contact </span>', array('class'=>'button middle', 'id'=>'aboutbut'));
		echo anchor('admin/option/','<span class="icon icon96"></span><span class="label">Option</span>', array('class'=>'button right', 'id'=>'optionbut')); 
	?>
</div>