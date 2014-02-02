<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Harngallery Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

 <?php echo Assets::css(); ?>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  
  <script type="text/javascript" src="http://www.harngallery.com/assets/js/wysihtml5-0.3.0.js" ></script>
  <script type="text/javascript" src="http://www.harngallery.com/assets/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="http://www.harngallery.com/assets/js//bootstrap.min.js"></script>
  <script type="text/javascript" src="http://www.harngallery.com/assets/js/bootstrap-wysihtml5.js" ></script>
  <style>
  select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
    border-radius: 4px;
    color: #555555;
    display: inline-block;
    font-size: 14px;
    height: 28px;
    line-height: 20px;
    margin-bottom: 0;
    padding: 4px 6px;
    vertical-align: middle;
}
.btn{
  padding: 2px 12px;
}
.container{
  background-color: #FFFFFF;
    border-color: #DDDDDD #DDDDDD rgba(0, 0, 0, 0);
    border-image: none;
    border-style: solid;
    border-width: 1px;
    color: #555555;
    cursor: default;
}
th{background-color: #F5F5F5}
.btnHarn{
  padding:5px 10px;
  text-align:center;font-style:italic;height:28px;font-size:11pt;
  margin:0;
  text-transform:uppercase;
  color:#fff;
    background:#000;
    border: none;
    outline:none;
    cursor: pointer;

}
select,input,textarea{
    -webkit-border-radius: 0 !important;
     -moz-border-radius: 0 !important;
          border-radius: 0 !important;
}

.btnHarn:hover, .btnHarn:visited, .btnHarn:link, .btnHarn:active{
  color:#fff !important;
  text-decoration: none !important;
}
.control-label{
  padding:0 !important;
}
  </style>
</head>

<body style="background-color: #F5F5F5">