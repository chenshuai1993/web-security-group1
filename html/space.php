<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>查看用户-基于Redis实现的简单微博系统</title>

    <link rel="stylesheet" href="./html/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="./html/static/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./html/static/css/mybase.css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	<div class="user_nav pull-right">
        <?php if (empty($result['user_info'])) { ?>
            <a type="button" class="btn btn-default" role="button" href="login.htm">登录</a>
            <a type="button" class="btn btn-default" role="button" href="register.htm">注册</a>
        <?php } else { ?>
            <p> 欢迎 <span class="label label-success"><?php echo $result['user_info']['username']; ?></span> ，<a href="#">退出</a></p>
        <?php } ?>
	</div>
      <div class="header">
		<h3 class="text-muted"><a style="vertical-align: bottom;" href="index.htm">简单微博系统</a></h3>
      </div>


<div class="row">
  <div class="col-md-2" style="margin-top: 20px;">
<!--    <a href="#" class="thumbnail">-->
<!--      <img data-src="holder.js/100x100"  style="width: 100px; height: 100px;" >-->
<!--    </a>-->
  </div>
  <div class="col-md-10">
  	<h2 ><?php echo $result['user_info']['username']; ?></h2>
  	<p>微博：<?php echo $result['user_info']['bbs']; ?></p>
  	<p>粉丝：<?php echo $result['user_info']['fs']; ?></p>
  	<p><a href="javascript:;" class="btn btn-primary" role="button" id="follow" data-id="<?php echo $lookUid ; ?>">关注</a> <a href="javascript:;  " class="btn btn-default" role="button">取消</a></p>
  </div>
</div>

	<hr />

        <?php if($fs_id == 3): ?>
            <form id="bbs"  action="http://localhost/web-security-group1/bbs.php" method="post">
                内容:<input name="content" id="content" type="text">
                <input name="to_userid" id="to_userid" type="hidden" value="3">
                <input type="submit" value="提交" >
            </form>
        <?php endif; ?>



        <?php if(isset($result['user_fs'])): ?>
        <?php  foreach ($result['user_fs'] as $key => $val): ?>
                粉丝id:<a class="fs" id="<?php echo $val['fs_id']; ?>" href="javascript:;"><?php echo $val['fs_id']; ?></a>&nbsp;
        <?php endforeach; ?>
        <?php endif; ?>


    </div>
<script src="./html/static/js/jquery.min.js"></script>
<script src="./html/static/js/bootstrap.min.js"></script>
<script src="./html/static/js/holder.min.js"></script>
<script type="text/javascript">
$('body').on('click','#follow',function(){
  var url = '../web-security-group1/action.php';
  var id  = $('#follow').data('id');
  var data = {id:id};

  $.ajax({
    type:'post',
    url: url,
    data:data,
    dataType:'json',
    success:function(res){
      alert(res.msg);
    },
    error:function(request,status,err){
      console.log(request);
    }
  });
})



    $(function(){
        $(document).on('click','.fs',function(){
            var id = $(this).attr('id');
            window.location.href='http://localhost/web-security-group1/perInfo.php?uid='+id
        })



    })
</script>



</body></html>