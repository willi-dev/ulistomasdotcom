<?php
	$this->load->view('admin/admin_header');
	
	$aboutsuccess = $this->session->flashdata('aboutsuccess');
	echo $aboutsuccess == '' ? '' : '<p class="message">' . $aboutsuccess . '</p>';
	
	$updated = $this->session->flashdata('updated');
	echo $updated == '' ? '' : '<p class="message">' . $updated . '</p>';
	
	$uploaded = $this->session->flashdata('uploaded');
	echo $uploaded == '' ? '' : '<p class="message">' . $uploaded . '</p>';
	
	$deleted = $this->session->flashdata('deleted');
	echo $deleted == '' ? '' : '<p class="message">' . $deleted . '</p>';
?>
	<div id="dashboard" class="maincontent" ><!-- START OF DASHBOARD -->
	<div class="css-tabs">
		<a href="#" class="tab button left"><span class="icon icon111"></span><span class="label">About</span></a>
		<a href="#" class="tab button right"><span class="icon icon191"></span><span class="label">Photo</span></a>
		<a href="#" class="tab button"><span class="icon icon125"></span><span class="label">Contact</span></a>
	</div><hr />
		
	<?php
		if(isset($getabout)){
	?>	
		<div class="css-panes"><!-- START OF CSS PANES -->
			<div class="panes"><!-- START OF ABOUT -->
			<?php
				echo form_open('admin/update_about');
			?>
				<input type="hidden" name="idabout" value="<?php echo $getabout->id ;?>"/>
				<label for="about" class="labeltext">About</label><br />
				<textarea name="content" id="about"><?php echo str_replace(array('_','&#34'),array(' ','"'), $getabout->about); ?></textarea>
				<button name="submit" class="action blue"><span class="label labelbutton">Save</span></button><br />
			<?php
				echo form_close();
			?>
			</div><!-- END OF ABOUT -->
	
			<div class="panes"><!-- START OF FOTO -->
			<?php
			if(empty($getabout->photo)){
				echo form_open_multipart('admin/foto_about');
				echo form_upload(array('name'=>'fotodiri','id'=>'fotodiri'));
				echo '<br /><button name="submit" class="action button left blue"><span class="label labelbutton">Upload New Photo</span></button>';
				echo form_close();
			}else{	
			?>	
				<img src="<?php echo base_url().$getabout->photo; ?>" alt="" width="25%"/><br />
			<?php
				echo form_open_multipart('admin/foto_about');
				echo '<hr />';
				echo form_upload(array('name'=>'fotodiri','id'=>'fotodiri'));
				echo '<br /><button name="submit" class="action button left blue"><span class="label labelbutton">Upload New Photo</span></button>';
				echo anchor('admin/del_foto_about','<span class="label labelbutton">Delete</span>',array('class'=>'button right red'));
				echo form_close();
			}
			?>
			</div><!-- END OF FOTO -->
		
			<div class="panes"><!-- contact -->
				<?php
				echo form_open('admin/update_contact');
				?>
				<input type="hidden" name="idabout" value="<?php echo $getabout->id ;?>"/>
				<label for="about" class="labeltext">Contact</label><br />
				<textarea name="contentcontact" id="contact"><?php echo str_replace(array('_','&#34'),array(' ','"'), $getabout->contact); ?></textarea>
				<button name="submit" class="action blue"><span class="label labelbutton">Save</span></button><br />
				<?php
				echo form_close();
				?>
			</div>
		
		</div><!-- END OF CSS PANES -->
	<?php
		}else{
			echo "<div class='notice'>".$error."</div>";
			
			echo form_open('admin/add_about');
	?>	
			<ul class="css-tabs">
				<li class="tab"><a href="#">about</a></li>
			</ul>
			<div class="css-panes">
				<div class="about">
					<label for="about" class="labeltext">About</label><br />
					<textarea name="content" id="" cols="30" rows="10"></textarea>
					<input type="submit" name="submit" value="submit" class="title" />
				</div>
			</div>
	<?php		
			echo form_close();
		}
	?>
	</div><!-- END OF DASHBOARD -->
<?php
	$this->load->view('admin/admin_footer');
?>	