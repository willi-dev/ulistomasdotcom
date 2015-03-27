<?php
	$this->load->view('admin/admin_header');
?>
<div class="content contentdetail span-24">
<?php
	
		if(isset($gettitledetail)){
			echo '<h1><blockquote>detail of '.str_replace("_"," ",$gettitledetail->title_photopost).'</blockquote></h1>';
			
			if(isset($getdetail)){
				$no=1;
	?>		
			<div class="span-24">
			<hr>
			<div class="buttons">
				<a href="<?php echo base_url().'admin/photo/page/'.$this->uri->segment(4) ;?>" class="button center"><span class="icon icon188"></span><span class="label">Back</span></a>
			</div>
			<hr />
			<table id="tabledetail" class="span-18 prepend-1">
				
					<thead>
						<th>No</th>
						<th>Photo</th>
						<th>Description</th>
						<th>Action</th>
					</thead>
				
	<?php
				foreach($getdetail as $gd){
					if($no%2==0){
						$color="even";
					}else{
						$color="";
					}
				?>
					<tr class="<?php echo $color; ?>">
				<?php 
					echo '<td>'.$no.'</td>';
					echo '<td><img src="'.base_url().$gd->thumb.'" class="" height="105px"/></td>';
				?>
						<td><a href="#" class="adddesc button" rel="#adddesc<?php echo $no; ?>"><span class="icon icon137"></span><span class="label">Description</span></a></td>
				<?php
						echo '<td>';
						echo form_open('admin/upthumbphoto');
						echo '<input type="hidden" name="idtitlephotopost" value="'.$gd->id_title_photopost.'"/>';
						echo '<input type="hidden" name="urisegment" value="'.$this->uri->segment(4).'"/>';
						echo '<input type="hidden" name="thumb" value="'.$gd->thumb.'"/>';
						//echo '<input type="hidden" name="thumbsquare" value="'.$gd->thumbsquare.'"/>';
						echo '<button class="button left blue"><span class="label labelbutton">Set as Thumbnail</span></button>';
						echo anchor('admin/deleachphoto/'.$gd->id_title_photopost.'/'.$gd->id,'<span class="label labelbutton">Delete</span>',array('class'=>'button right red','onclick'=>"return confirm('Apakah photo ini ingin dihapus?')"));
						echo form_close();
						echo '</td>';
				?>
						<!-- DIV OVERLAY FOR ADD DESCRIPTION -->
						<div id="adddesc<?php echo $no; ?>" class="overlay"><a class="close button"><span class="icon icon48"></span><span class="label">Close</span></a>
						<blockquote><h2>"add description in text area"</h2></blockquote>
				<?php
						echo form_open('admin/adddescphoto');
				?>
							<input type="hidden" name="id" value="<?php echo $gd->id; ?>"/>
							<input type="hidden" name="urisegment" value="<?php echo $this->uri->segment(4); ?>"/>
							<input type="hidden" name="idtitlephotopost" value="<?php echo $gd->id_title_photopost; ?>"/>
							<textarea name="content" id="descphoto<?php echo $no; ?>"><?php echo str_replace("_"," ",$gd->description); ?></textarea>
							<button name="submit" class="action blue"><span class="label">Save</span></button>
				<?php
						echo form_close();
				?>
						</div>
						<!-- END OF DIV OVERLAY FOR ADD DESCRIPTION -->
					</tr>
				<?php
					$no++;
				}
	?>		
			</table>
			</div>
	<?php		
			}else{
				echo 'no selected';
			}
		}else{
			echo '<h2 class="notice">'.$error.'</h2>';
		}	
	
?>
</div>
<?php
	$this->load->view('admin/admin_footer');
?>