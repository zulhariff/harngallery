<h4>Messages</h4>
<?php echo form_open(); ?>
<h6>Registration Activation</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="registration_activation" id="registration_activation"><?=$messages['registration_activation'];?></textarea>
<br />
<h6>Artist Approval</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="artist_approval" id="artist_approval"><?=$messages['artist_approval'];?></textarea>
<br />
<h6>Artist Rejected</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="artist_reject" id="artist_reject"><?=$messages['artist_reject'];?></textarea>
<br />
<h6>New Artwork uploaded</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="new_artwork_uploaded" id="new_artwork_uploaded"><?=$messages['new_artwork_uploaded'];?></textarea>
<br />
<h6>Sales (mail sent to the Artist)</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="sales_artist" id="sales_artist"><?=$messages['sales_artist'];?></textarea>
<br />
<h6>Sales (mail sent to the Collector)</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="sales_collector" id="sales_collector"><?=$messages['sales_collector'];?></textarea>
<br />
<button name="save"  class="btnHarn" type="submit">Save</button>
</fieldset>          
<?php echo form_close(); ?>   
