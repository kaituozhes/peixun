<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta name="viewport" content="width=device-width, height=device-height, mininum-scale=1.0, maximum-scale=1.0,inital-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>网站信息</title>
    <script src="<?php echo C('home_js') ?>/public/tip/js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo C('home_css') ?>/public/tip/css/tipDialog.css"/>
    <script type="text/javascript" src="<?php echo C('home_js') ?>/public/tip/js/tipDialog.js"></script>
</head>
<body>
    <?php if(isset($message)) {?>
        <script>
            $(function(){
                tipDialog('<?php echo $message ?>','ok','',1);
                setTimeout(function(){
                    window.location='<?php echo($jumpUrl); ?>';
                },1000);
            })    
        </script>
    <?php }else{ ?>
        <script>
            $(function(){
                tipDialog('<?php echo $error ?>','error','',1);
                setTimeout(function(){
                    window.location='<?php echo($jumpUrl); ?>';
                },1000);
            })    
        </script>
    <?php } ?>
</body>
</html>