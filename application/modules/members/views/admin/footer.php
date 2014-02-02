<h4>Footer</h4>

<?php echo form_open(); ?>
<h6>About Us</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="about_us" id="about_us"><?=$messages['about_us'];?></textarea>
<br />
<h6>How it works</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="how_it_works" id="how_it_works"><?=$messages['how_it_works'];?></textarea>
<br />
<h6>Privacy Policy</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="privacy_policy" id="privacy_policy"><?=$messages['privacy_policy'];?></textarea>
<br />
<h6>Buyer's Guide</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="buyers_guide" id="buyers_guide"><?=$messages['buyers_guide'];?></textarea>
<br />
<h6>Artist's Guide</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="artists_guide" id="artists_guide"><?=$messages['artists_guide'];?></textarea>
<br />
<h6>Newsletter</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="newsletter" id="newsletter"><?=$messages['newsletter'];?></textarea>
<br />
<h6>Copyright</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="copyright" id="copyright"><?=$messages['copyright'];?></textarea>
<br />
<h6>Terms</h6>
<textarea class="textarea" style="width: 810px; height: 200px" name="terms" id="terms"><?=$messages['terms'];?></textarea>
<br />
<button name="save"  class="btnHarn" type="submit">Save</button>

<?php echo form_close(); ?>   
