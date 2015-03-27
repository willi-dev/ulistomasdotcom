<?php
	 $this->load->view('frontend_header');
?>

	<div id="formcontent">
	<div class="span-24" id="screen">
	<div id="signinform" class="span-6 push-6">
		<fieldset>
		<legend>LOGIN</legend>
		<table>
			<?php
				$attributes = array('name' => 'login', 'id' => 'login');
				echo form_open('login/login_process', $attributes);
			?>
			<?php
				$message = $this->session->flashdata('message');
				echo $message == '' ? '' : '<p id="message">' . $message . '</p>';
			?>
			<tr>
				<td>username</td>
				<td></td>
				<td><input type="text" id="user" name="user" size="20" maxlength="20" class="text span-8" value="<?php echo set_value('username'); ?>"  placeholder="type username here..."/></td>	
			</tr>
			<p>
				<?php echo form_error('user', '<div class="error">','</div>'); ?>
			</p>
			<tr>
				<td>password</td>
				<td></td>
				<td><input type="password" id="pass" name="password" size="20" maxlength="20" class="text span-8" value="<?php echo set_value('password'); ?>" placeholder="type password here..."/></td>
			</tr>
			<p>
				<?php echo form_error('password', '<div class="error">', '</div>'); ?>
			</p>
			<tr>
				<td></td>
				<td></td>
				<td>
				<button name="submit" class="action"><span class="icon icon124"></span><span class="label">Login</span></button>
				</td>
			</tr>
			<?php echo form_close(); ?>
		</table>
		</fieldset>
	</div>
	</div>
	</div>
<?php
	$this->load->view('frontend_footer');
?>