	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			
		<?php if (! empty($message)) { ?>
			<div class="alert alert-error">
				<?php echo $message; ?>
			</div>
		<?php } ?>
			<?php echo form_open(current_url(), 'class="form-horizontal " id="shippingForm"');?>						
				<legend>Please enter your Shipping Details</legend>						
				<div class="span4" style="margin-left:0;width:450px">
				<fieldset>
					<input type="hidden" id="member_id" name="checkout[member_id]" value="<?=$userdata->id;?>">
					<input type="hidden" id="member_email" name="checkout[member_email]" value="<?=$userdata->email;?>">
					<div class="control-group">
						<label class="control-label">First Name</label>
						<div class='controls'>
							<input type='text' name="checkout[shipping][firstname]" id="checkout_shipping_name" maxlength="50" value="<?=isset($userdata->firstname)?$userdata->firstname:'';?>" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Last Name</label>
						<div class='controls'>
							<input type='text' name="checkout[shipping][lastname]" id="checkout_shipping_name" maxlength="50" value="<?=isset($userdata->lastname)?$userdata->lastname:'';?>"/>
						</div>
					</div>	
					<div class="control-group">
						<label class="control-label">Address</label>
						<div class='controls'>
							<input type='text' name="checkout[shipping][add_01]" id="checkout_shipping_add_01" maxlength="100" value="<?=isset($userdata->address1)?$userdata->address1:'';?>"/>
							<input type='hidden' name="checkout[shipping][add_02]" id="checkout_shipping_add_02" maxlength="100" value="<?=isset($userdata->address1)?$userdata->address2:'';?>"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">City</label>
						<div class='controls'>
							<input type='text' name="checkout[shipping][city]" id="checkout_shipping_city" maxlength="100"  value="<?=isset($userdata->city)?$userdata->city:'';?>" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Country</label>
						<div class='controls'>
							<?php echo country_select($members['country'],'US','checkout[shipping][country]'); ?>    
						</div>
					</div>		
					<div class="control-group">
						<label class="control-label">Zip/Postal Code</label>
						<div class='controls'>
							<input type='text' name="checkout[shipping][post_code]" id="checkout_shipping_post_code" maxlength="10" value="<?=isset($userdata->postal)?$userdata->postal:'';?>"/>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Phone</label>
						<div class='controls'>
							<input type='text' name="checkout[phone]" id="checkout_phone" maxlength="15" value="<?=isset($userdata->phone)?$userdata->phone:'';?>" />
							<p style="padding-top:10px;color:#CCCCCC;font-size:9pt;width:206px">
								Your phone number is required in case we need to contact you regarding your order. It will not be used for any other purpose.
							</p>
						</div>
					</div>											
				<fieldset class="w100">
					<div class="control-group">
						<div class='controls'>
            			<button name="save"  class="btnHarn" type="submit" >
            			SHIP TO THIS ADDRESS</button>              
            			</div>
          			</div>   
				</fieldset>
				</div>
				<div class="span6" id="checkout_rightpanel">
					<h4>Delivery partners</h4>
					<img src="/assets/images/dhl.png">					
					<h4 style="padding-top:20px">Payment methods</h4>
					<img src="/assets/images/payment.png">
					<h4 style="padding-top:20px">Harn Gallery service:</h4>
					<table style="padding:0;border:0;margin:0">
						<tr>
						<td><img src="/assets/images/check.png"></td>
						<td style="color:#666666">Online tracking of your shipment</td>
						</tr>
						<tr>
						<td><img src="/assets/images/check.png"></td>
						<td style="color:#666666">Guaranteed final prices - no additional charges</td>
						</tr>
						<tr>
						<td><img src="/assets/images/check.png"></td>
						<td style="color:#666666">100% secure payments with buyer protection</td>
						</tr>
					</table>
				</div>

			<?php echo form_close();?>				
			</div>				
		</div>
