<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />      
        <title>Harngallery Admin</title>
        
        <link rel="stylesheet" type="text/css" href="http://www.harngallery.com/themes/default/css/bootstrap.min.css" media="screen" />
        <script type="text/javascript" src="http://www.harngallery.com/assets/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="http://www.harngallery.com/assets/js/jquery.validate.js" ></script>  
        
        <style>
        .login-form{
            background-color: #FFFFFF;
            margin:200px auto auto;
            border-color: #CCCCCC;
            border-style: solid;
            border-width: 1px;
            width: 400px;
            padding:20px;
        }   
        .text-input{
            border-radius: 0 !important;
            font-size: 14px !important;
            padding: 0 !important;
            margin: 0 !important;   
            height:30px !important;         
        }
        </style>              
    </head>
  
    <body style="background-color:#CCC">
<div class="login-form" >

        <h3 style="padding:0;margin:0">Admin Login</h3>
                <?php echo form_open('','class="form-horizontal" id="changePasswordForm"'); ?>                            

                    <div class="control-group" style="padding-top:10px">
                        <label style="float: left;padding: 0;text-align: right;width: 160px;font-size:14pt;margin-top:8px" for="pswd">Password</label>
                        <div class='controls'>            
                            <input id="pswd" name="pswd" class="text-input" type="password" />
                            <?php if(isset($error_msg)){ ?>
                            <label id="error" class="error"><?=$error_msg;?></label>
                            <?php } ?>
                        </div>           
                    </div>       
                    <div class="control-group">
                        <div class='controls'>  
                        <button name="save"  class="btn btn-inverse pull-left" type="submit">Sign In</button>
                        </div>
                    </div>                     
                <?php echo form_close(); ?>  
</div>                
<script>
$(function () {
    $('#changePasswordForm').validate({
        debug : true,
        ignore: [],
        rules: {
        pswd: 'required'
    } ,
    submitHandler: function(form) {  
        if ($(form).valid()) 
            form.submit(); 
            return false; // prevent normal form posting
        } 
    });
});
</script>        
</body>
</html>
