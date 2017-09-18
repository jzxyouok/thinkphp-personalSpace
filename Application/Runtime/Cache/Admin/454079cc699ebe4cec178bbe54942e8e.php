<?php if (!defined('THINK_PATH')) exit();?><!DOCTYpE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>success</title>
<style type="text/css">
*{ padding: 0; margin: 0; }

</style>
</head>
<body >
<div style="display: none;">
  <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</div>
<img src="/Public/admin/img/success.jpg" width="100%" height="100%">

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
  var time = --wait.innerHTML;
  if(time <= 0) {
    location.href = href;
    clearInterval(interval);
  };
}, 1000);
})();
</script>
</body>
</html>