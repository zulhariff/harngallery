
    <ul class="breadcrumb">
        <li>
          <a href="/">Home</a> <span class="divider">></span>
        </li>
        <li >
          <a href="/members/profile/info">My Account</a><span class="divider">></span>
        </li>               
        <li class="active">
          Change Password
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
<h4 style="color:#333333">Change Password</h4>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal" id="cpForm" autocomplete="off"'); ?>  
  <fieldset>    
    <div class="control-group">
      <div class='controls'>
        <?php if ($message){
        echo $message;
        } ?> 
      </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="oldPassword">Current Password</label>
        <div class='controls'>            
            <input id='oldPassword' type='password' name='oldPassword'  />
        </div>           
    </div>   
    <div class="control-group">
        <label class="control-label" for="newPassword">New Password</label>
        <div class='controls'>            
            <input id='newPassword' type='password' name='newPassword'  />
        </div>           
    </div>   
    <div class="control-group">
        <label class="control-label" for="confirmPassword">Confirm Password</label>
        <div class='controls'>            
            <input id='confirmPassword' type='password' name='confirmPassword'  />
        </div>           
    </div>   
    <div class="control-group">
        <div class='controls'>  
        <button name="save"  class="btnHarn pull-left" type="submit">Save</button>
      </div>
    </div>        
</fieldset>  
<?php echo form_close(); ?>