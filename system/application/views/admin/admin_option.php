<?php 
	$this->load->view('admin/admin_header');

	$oldpassbeda = $this->session->flashdata('oldpassbeda');
	echo $oldpassbeda == '' ? '' : '<p class="message">' . $oldpassbeda . '</p>';
	
	$oldpassre = $this->session->flashdata('oldpassre');
	echo $oldpassre == '' ? '' : '<p class="message">' . $oldpassre . '</p>';
	
	$success = $this->session->flashdata('success');
	echo $success == '' ? '' : '<p class="message">' . $success . '</p>';
	
	$uploadsuccess = $this->session->flashdata('uploadsuccess');
	echo $uploadsuccess == '' ? '' : '<p class="message">' . $uploadsuccess . '</p>';
	
	$uploaderror = $this->session->flashdata('uploaderror');
	echo $uploaderror == '' ? '' : '<p class="message">' . $uploaderror . '</p>';
	
	$deletesuccess = $this->session->flashdata('deletesuccess');
	echo $deletesuccess == '' ? '' : '<p class="message">' . $deletesuccess . '</p>';
?>
	<div id="dashboard" class="maincontent" ><!-- START OF DASHBOARD -->
	<!-- START OF OPTION -->
	
	<div class="css-tabs">
		<a href="#" class="tab button left"><span class="icon icon122"></span><span class="label">User Password</span></a>
		<a href="#opfrontimage" class="tab button right"><span class="icon icon131"></span><span class="label">Frontpage Photo</span></a>
	</div><hr />
	<div id="option" class="css-panes">
		<div id="opuser"><!-- START OF DIV USER -->
			<blockquote>you can change your old password with a new password</blockquote>
			<?php
				echo form_open('admin/updatepass');
			?>
			<table class="span-20">
				<tr>
					<td style="text-align:right"><label for="Username" class="rightlabeltext">Username</label></td>
					<td></td>
					<td><input type="text" value="admin" class="text span-8" disabled="disabled"/></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-align:right"><label for="oldpass" class="rightlabeltext">Old Password</label></td>
					<td></td>
					<td><input type="password" name="oldpass" class="text span-8" size="15" maxlength="20"/></td>
					<td style="text-align:left"><blockquote>type old password</blockquote></td>
				</tr>
				<tr>
					<td style="text-align:right"><label for="retypeoldpass" class="rightlabeltext">Re-type Old Password</label></td>
					<td></td>
					<td><input type="password" name="retypeoldpass" class="text span-8" size="15" maxlength="20" /></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-align:right"><label for="newpass" class="rightlabeltext">New Password</label></td>
					<td></td>
					<td><input type="password" name="newpass" class="text span-8" size="15" maxlength="20"/></td>
					<td style="text-align:left"><blockquote>type new password (min 8 char)</blockquote></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button name="submit" class="action blue"><span class="label labelbutton">Save</span></button></td>
					<td></td>
				</tr>
			</table>
			<?php
				echo form_close();
			?>
		</div><!-- END OF DIV USER -->
		<div id="opfrontimage"><!-- START OF DIV FRONTIMAGE -->
		<?php
			if(isset($getfrontpage)){
				if(!empty($getfrontpage->frontpage_content)){
		?>
					<span><img src="<?php echo base_url().$getfrontpage->frontpage_content; ?>" width="400px" /></span>
					<br />
		<?php	
					echo anchor('admin/delfrontphoto','<span class="label labelbutton">Delete</span>',array('class'=>'button red','onclick'=>"return confirm('Are you sure ?')"));
					
				}else{
		?>
				<br /><span class="notice ">Please upload frontpage photo!</span><span class="clear"></span>
		<?php
					echo br(4);
					echo form_open_multipart('admin/upfrontphoto');
					echo form_upload(array('name'=>'frontphoto','id'=>'frontphoto'));
					echo '<br /><button name="submit" class="action button blue"><span class="label labelbutton">Upload New Photo</span></button>';
					echo form_close();
				}
			}
			
			
		?>
		</div><!-- END OF DIV FRONTIMAGE -->
	</div>
	<!-- END OF OPTION -->
	</div>
<?php 
	$this->load->view('admin/admin_footer');
?>