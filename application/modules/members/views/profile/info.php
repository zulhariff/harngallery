
    <ul class="breadcrumb">
        <li>
          <a href="/">Home</a> <span class="divider">></span>
        </li>
        <li class="active">
          My Account  
        </li>               
      </ul> 

<h4 style="color:#333333">My Account</h4>

<?php if($members['type']==1): ?>
<a href="/members/upload_art">Upload Art</a> / 
<a href="/members/my_art">My Art</a> / 
<a href="/members/sales">Sales</a> / 
<a href="/members/profile/info">Account Information - Profile</a> /
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> 
<?php else: ?>
<a href="/members/favourite_art">Favourite Art</a> / 
<a href="/members/favourite_artists">Favourite Artists</a> / 
<a href="/members/orders">Orders</a> / 
<a href="/members/profile/info">Account Information</a>
<?php endif; ?>
<br /><br />
<h4 style="color:#333333">Account Information</h4>
<?php
 //include('./../nav_artist.php'); 
$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors:</h4>
  <?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($members))
{
  $members = (array) $members;
}
$id = isset($members['id']) ? $members['id'] : '';

?>

<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/jquery.fileupload.css">
<style>
.control-label{
  width:200px !important;
  padding-right:10px !important;
}
.controls{
  margin-left:210px !important;
}
</style>
<?if (isset($error_message)){
  echo '<h4>'.$error_message.'</h4>';
}
?>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="registrationForm"'); ?>  
<fieldset>
      <div class="control-group <?php echo form_error('firstname') ? 'error' : ''; ?>">
        <?php echo form_label('First Name', 'members_firstname', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_firstname' type='text' name='members_firstname' maxlength="100" disabled value="<?php echo set_value('members_firstname', isset($members['firstname']) ? $members['firstname'] : ''); ?>" />
        </div>
      </div>

      <div class="control-group <?php echo form_error('lastname') ? 'error' : ''; ?>">
        <?php echo form_label('Last Name', 'members_lastname', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_lastname' type='text' name='members_lastname' disabled maxlength="100" value="<?php echo set_value('members_lastname', isset($members['lastname']) ? $members['lastname'] : ''); ?>" />
        </div>
      </div>

      <div class="control-group <?php echo form_error('email') ? 'error' : ''; ?>">
        <?php echo form_label('Email', 'members_email', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_email' type='text' name='members_email' disabled maxlength="100" value="<?php echo set_value('members_email', isset($members['email']) ? $members['email'] : ''); ?>" />
        </div>
      </div>    
      <div class="control-group ">
        <label class="control-label">Password</label>        
        <div class="controls">
          <a href="/members/profile/changepassword" style="position:relative;top:5px">Change Password</a>
        </div>
      </div>
       <div class="control-group <?php echo form_error('dob') ? 'error' : ''; ?>">
        <label class="control-label" >Date of Birth</label>           
        <div class='controls'>          
           <div class="input-append date datepicker" id="dpYears" data-date="<?php echo $dob;?>" data-date-format="dd-mm-yyyy" >
            <input id='members_dob' type='text' name='members_dob' value="<?php echo $dob;?>"/>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
        </div>
      </div>  
      <div class="control-group <?php echo form_error('members_country') ? 'error' : ''; ?>">
        <?php echo form_label('Country', 'members_country', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <?php echo country_select($members['country'],'US','members_country'); ?>          
        </div>
      </div>

      <div class="control-group <?php echo form_error('address1') ? 'error' : ''; ?>">
        <?php echo form_label('Street address', 'members_address1', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_address1' type='text' name='members_address1' maxlength="255" value="<?php echo set_value('members_address1', isset($members['address1']) ? $members['address1'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('address1'); ?></span>
        </div>
      </div>


      <div class="control-group <?php echo form_error('phone') ? 'error' : ''; ?>">
        <?php echo form_label('Phone', 'members_phone', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_phone' type='text' name='members_phone' maxlength="50" value="<?php echo set_value('members_phone', isset($members['phone']) ? $members['phone'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('phone'); ?></span>
        </div>
      </div>

      <div class="control-group <?php echo form_error('city') ? 'error' : ''; ?>">
        <?php echo form_label('City', 'members_city', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_city' type='text' name='members_city' maxlength="100" value="<?php echo set_value('members_city', isset($members['city']) ? $members['city'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('city'); ?></span>
        </div>
      </div>

      <div class="control-group <?php echo form_error('postal') ? 'error' : ''; ?>">
        <?php echo form_label('Postal / Zip code', 'members_postal', array('class' => 'control-label') ); ?>
        <div class='controls'>
          <input id='members_postal' type='text' name='members_postal' maxlength="50" value="<?php echo set_value('members_postal', isset($members['postal']) ? $members['postal'] : ''); ?>" />
          <span class='help-inline'><?php echo form_error('postal'); ?></span>
        </div>
      </div>
      <?php $countries = config_item('address.countries'); ?>
      <div class="control-group <?php echo form_error('ship_type') ? 'error' : ''; ?>">
        <?php echo form_label('I ship my art', '', array('class' => 'control-label', 'id' => 'shipping_type_label') ); ?>
        <div class='controls'>
          <label class='radio'>
            <input id='members_ship1' name='members_ship' type='radio' class='' value='1' <?=$members['ship_type']==1?'checked':'';?> />
            Worldwide (recommended)
          </label>
          <label class='radio'>
            <input id='members_ship2' name='members_ship' type='radio' class='' value='2' <?=$members['ship_type']==2?'checked':'';?> />
            <span id="span_ship_country"><?=$countries[$members['country']]['printable'];?></span> only
            <p style="padding-top:10px">
            For each sale you will receive <span id="ship_perc" style="font-weight:bolder;font-size:medium"><?=$members['ship_type']==1?'80%':'65%';?></span> of the selling price
          </p>
          </label>
        </div>

      <input type="hidden" name="member_type" id="member_type" value="<?=$members['type'];?>">
      <?php if ($members['type']==1) { ?>
      <div class="control-group" id="aboutDiv">          
          <label class="control-label">       
          About you and about your work 
        </label>
          <div class='controls'>
          <textarea id="members_about" name="members_about" rows="8" cols="80" style="width:500px;height:200px;padding:5px;" placeholder="This part is crucial. Tell Collectors more about your Education, background events, artist statement"><?=$members['about'];?></textarea>
        </div>
      </div>
      
      <div class="control-group" id="ProfilePhotoDiv">
         <label class="control-label" for="fileupload">Profile Photo</label>
         <div class='controls'>
            <input id='members_photo' type='hidden' name='members_photo' value="<?=$members['photo'];?>" />
            <input id="btnRegistrationImageUpload" type="file" name="files[]" <?=($members['photo']!="")?'style="display:none"':'';?>>             
            <div id="files" class="files"></div>
            <?php if($members['photo']!=""): ?>
                <img src="http://www.harngallery.com/uploads/<?=$members['id'];?>/registration/<?=$members['photo'];?>">
                <a href="javascript:void(0)" class="removeimage" style="display:block;">Remove</a>
            <?php else: ?>
            <br />Photo will be resized to 200*150 pixel
            <?php endif; ?>            
          </div>           
      </div>                         
      <?php } ?>                   			
      <div class="control-group"> 
          <div class='controls'> 
            <button name="save" class="pull-left btnHarn">
              SAVE</button>              
          </div>
      </div>        
</fieldset>          
<?php echo form_close(); ?>