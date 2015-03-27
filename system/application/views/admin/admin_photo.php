<?php
	$this->load->view('admin/admin_header');
	
	$titlekosong = $this->session->flashdata('titlekosong');
	echo $titlekosong == '' ? '' : '<p id="message">' . $titlekosong . '</p>';
	
	$uptitlekosong = $this->session->flashdata('uptitlekosong');
	echo $uptitlekosong == '' ? '' : '<p id="message">' . $uptitlekosong . '</p>';
	
	$insertsuccess = $this->session->flashdata('insertsuccess');
	echo $insertsuccess == '' ? '' : '<p id="message">' . $insertsuccess . '</p>';
	
	$updatesuccess = $this->session->flashdata('updatesuccess');
	echo $updatesuccess == '' ? '' : '<p id="message">' . $updatesuccess . '</p>';
?>
		
	<div id="dashboard" class="maincontent" ><!-- START OF DASHBOARD -->
		<div class="css-tabs">
			<a href="#" class="tab button left"><span class="icon icon120"></span><span class="label">Photo Project</span></a>
			<a href="#formaddphoto" id="photoprojectclick" class="tab button right"><span class="icon icon68"></span><span class="label">New Photo Project</span></a>
		</div><hr />
		<div class="css-panes">
			<div id="#listphoto" class="panes">
	<?php
		$no=1;	
		if(isset($gettitlephoto)){
	?>
			<table id="listtitle">
				<tr>
					<thead>
					<th>No</th>
					<th>Title Photo</th>
					<th>Category</th>
					<th>Add Photo(s)</th>
					<th>Action</th>
					</thead>
				</tr>
	<?php
			foreach($gettitlephoto as $gtp){//FOREACH
				if($no%2==0){
					$color="even";
				}else{
					$color="";
				}
				$arrayfrom=array("_","&#34");
				$arrayout=array(' ','"');
	?>
				<tr class="<?php echo $color; ?>">
					<td><?php echo $no+$this->session->userdata('row'); ?></td>
					<td><?php echo anchor('admin/photodetail/'.$gtp->id.'/'.$this->session->userdata('row'), str_replace("_"," ",$gtp->title_photopost));?></td>
					<td><?php echo str_replace($arrayfrom,$arrayout,$gtp->main_category) ?></td>
					<td><a href="#" class="addicona button" rel="#ov<?php echo $no?>"><span class="icon icon189"></span><span class="label">Upload photo(s)</span></a>
					</td>
					<td><a href="#formedit" class="edicona button left blue" rel="#formedit<?php echo $no; ?>">
							<span class="label">Edit</span>
						</a>
					<?php
						if($this->uri->segment(4)==FALSE){
							echo anchor('admin/delphoto/'.$gtp->id, '<span class="label">Delete</span>',array('class'=>'button right red','onclick'=>"return confirm('Apakah photoset ini ingin dihapus?')"));
						}else{
							echo anchor('admin/delphoto/'.$this->uri->segment(4).'/'.$gtp->id, '<span class="label">Delete</span>',array('class'=>'button right red','onclick'=>"return confirm('Apakah photoset ini ingin dihapus?')"));
						}
						
					?>
					</td>
					<div id="ov<?php echo $no; ?>" class="overlay"><a class="close button"><span class="icon icon48"></span><span class="label">Close</span></a><!-- DIV OVERLAY FOR UPLOAD PHOTO -->
							<?php
							echo form_open_multipart('admin/addphoto');
								$i=5;
								for($j = 1; $j <= $i; $j++){//FOR
								?>
								<input type="hidden" name="idtitle" value="<?php echo $gtp->id; ?>"/>
								<input type="hidden" name="urisegment" value="<?php echo $this->uri->segment(4); ?>"/>
								<?php
								echo form_upload(array('name' => 'photo'.$j, 'id' => 'photo'.$j, 'size' => '36')).'<br />';
								
								}//ENDFOR
							?>
								<button name="submit" class="action blue"><span class="label labelbutton">Upload Photo(s)</span></button><br /><br />
							<?php
								// echo form_submit('kirim', 'Upload Photo(s)');
							echo form_close();
							?>
								<blockquote>
									upload maksimal 5 gambar, dengan format *.jpg dan ukuran maksimal masing-masing file 1 Mb. Jika ingin lebih dari 5 gambar, ulangi proses upload.
								</blockquote>
					</div><!-- END DIV OVERLAY FOR UPLOAD PHOTO -->
					
					<div id="formedit<?php echo $no; ?>" class="overlay"><a class="close button"><span class="icon icon48"></span><span class="label">Close</span></a><!-- DIV OVERLAY FOR EDIT -->
						<?php
							echo form_open('admin/uptitlephoto');
						?>
							<input type="hidden" name="idtitle" value="<?php echo $gtp->id; ?>"/>
							<input type="hidden" name="urisegment" value="<?php echo $this->uri->segment(4); ?>"/>
							<label class="labeltext">Title : </label>
							<input type="text" name="titlephoto" id="title" class="title" value="<?php echo str_replace($arrayfrom, $arrayout,$gtp->title_photopost); ?>"/> <br />
							<label class="labeltext">Select type of project : </label>
							<select name="selectproject" class="selectproject">
						<?php
								if($gtp->idcat==1){
						?>		
									<option value="1" SELECTED>personal project</option>
									<option value="2" >commision project</option>
						<?php		
								}else{
						?>		
									<option value="1" >personal project</option>
									<option value="2" SELECTED >commision project</option>
						<?php		
								} //END IF
						?>
								
							</select> <br />
							<label class="labeltext" for="content<?php echo $no ?>">Description of Photo(s)</label>
							<textarea name="content" id="descphotoedit<?php echo $no; ?>"><?php echo str_replace($arrayfrom, $arrayout, $gtp->description); ?></textarea>
							<button name="submit" class="action blue"><span class="label">Save</span></button>
						<?php
							echo form_close();
						?>
					</div><!-- END DIV OVERLAY FOR EDIT -->
				</tr>
	<?php
			$no++;
			}//END FOREACH
			
			
	?>			
			</table>
	<?php
				
			echo $this->pagination->create_links();
		}else{
			echo '<div class="notice">no photo(s)</div>';
		}
	?>
			</div>
			<div id="formaddphoto" class="span-17 panes">
		<?php
			echo form_open('admin/addtitlephoto');
		?>
			<table>
			<tr>
				<td><label for="titlephoto" class="labeltext">Title</label></td>
				<td><input type="text" name="titlephoto" id="title" class="title"/></td>
			</tr>
			<tr>
				<td><label for="selectproject" class="labeltext">Select type of project</label></td>
				<td>
					<select name="selectproject" class="selectproject">
						<option value="1">personal project</option>
						<option value="2">commision project</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="content" class="labeltext">Description of Photo(s)</label></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="description" id="descphoto"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><button name="submit" class="action blue"><span class="label labelbutton">Save</span></button></td>
			</tr>
			</table>
			
		<?php
			echo form_close();
		?>
			</div>
		</div>
	</div><!-- END OF DASHBOARD -->
<?php	
	
	$this->load->view('admin/admin_footer');
?>	