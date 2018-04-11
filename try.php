<?php 
require_once 'phplib/securimage/securimage.php';
 require_once ('phplib/mysql/MysqliDb.php'); 
$image = new Securimage();
$flag = isset($_POST['name'])&&isset($_POST['phone'])&&isset($_POST['danwei'])&&isset($_POST['address'])&&isset($_POST['captcha_code'])&&($image->check($_POST['captcha_code']) == true);


if($flag){






$db = new MysqliDb ('localhost', 'root', 'Dt337683', 'jl');

$data = Array (
	"name" => $_POST['name'],
	"phone" => $_POST['phone'],
	"danwei" => $_POST['danwei'],
	"address" => $_POST['address'],
);
$id = $db->insert ('try', $data);





}

?>
<html>
<head>
    <title>Example include</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/all.css">
</head>
<body>
    <div class="header">
  <div class="content">
    <div class="logo"><h1 class="logo-img"><a href="./"><img src="images/logo.png" alt="安徽同徽信息技术有限公司" width="146" height="70"></a></h1>
    <h2 class="logo-text">国内领先的<span style="color:#FF6600;"> 电商+仓储+物流+金融 </span>电子商务服务提供商</h2></div>
    <!--S nav-->
    <div class="nav">
      <ul class="menu">
        <li>
         <div class="dt"><a href="javascript:void(0)">产品中心</a></div>
          <div class="dd">
            <div class="submenu">
              <div class="submenu-links">
              		
	                    <p>
								<a href="./product-1.html">电子交易平台</a>
	                    </p>
								<a href="">仓储管理系统</a>
	                    </p>
								<a href="">融资监控系统</a>
	                    </p>
								<a href="">物流运输系统</a>
	                    </p>
								<a href="">贸易进销存系统</a>
	                    </p>
								<a href="">加工管理系统</a>
	                    </p>
								<a href="">手机APP开发</a>
	                    </p>
								<a href="">网站开发</a>
	                    </p>
                    
              </div>
              <div class="submenu-desc-bg">
                <div class="submenu-txt">
                  <h2 class="h2">核心产品</h2>
                  <p style="height:130px;overflow:hidden;">知行合一，不断创新。浓厚工程师文化，十多年基于Java的互联网软件及电子商务平台研发经验,严格遵循ISO9001、六西格玛等质量标准，成就行业技术优势</p>
                </div>
                 <div class="submenu-img">
                  <div id="slideBox" class="slideBox">
                    <div class="bd">
                      <ul>
		                    <li style="display: none;"><a href="/product_10010010010130.html"><img src=""><div class="slideBox-title">供应链B2B</div></a></li>
	                    
		                    <li style="display: none;"><a href="/product_10010010010330.html"><img src=""><div class="slideBox-title">B2B招投标系统</div></a></li>
	                    
		                    <li style="display: list-item; opacity: 0.987456;"><a href="/product_10010010010279.html"><img src=""><div class="slideBox-title">B2B渠道订单系统</div></a></li>
	                    
		                    <li style="display: none;"><a href="/product_10010010010341.html"><img src=""><div class="slideBox-title">大宗商品B2B</div></a></li>
	                    
		                    <li style="display: none;"><a href="/product_10010010010325.html"><img src=""><div class="slideBox-title">交易所电商系统</div></a></li>
	              
		                    <li style="display: none;"><a href="/product_10010010010338.html"><img src=""><div class="slideBox-title">供应链B2B集采平台</div></a></li>
	                    
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="dt"><a href="./solutionlist.html">解决方案</a></div>
        </li>
        <li>
          <div class="dt"><a href="./customers.html">典型客户</a></div>
          
          <div class="dd">
            <div class="submenu">
              <div class="submenu-links">
                  
                      <p>
<a href="./caselist.html">仓储案例</a>                      </p>
                      <p>
<a href="./shop.html">电商案例</a>                      </p>
                    
              </div>
              </div>
              </div>
        </li>
        <li>
          <div class="dt"><a href="./support.html">服务支持</a></div>
          
        </li>
        <li>
          <div class="dt"><a href="./try.php">试用申请</a></div>
          
        </li>
        <li>
          <div class="dt"><a href="./about.html">关于我们</a></div>
          
        </li>
        <li>
          <div class="dt"><a href="./contact.html">联系我们</a></div>
          
        </li>
      </ul>
    </div>
    <!--E nav-->
  </div>
</div>
</div>

<div class="space"></div>
<br>
<br>


<div class="main">
	<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">




<form id="try" action="try.php" method="post">
	<h1>
<?php if($flag){
	echo '保存成功！';
}else{ ?></h1>
	<div class="form-group">
	  <input name="name" class="form-control" value="<?php echo  isset($_POST['name'])?$_POST['name']:'' ?>"  placeholder="申请人">
	</div>
	<div class="form-group">
	  <input name="phone" class="form-control"  value="<?php echo  isset($_POST['phone'])?$_POST['phone']:'' ?>" placeholder="联系电话">
	</div>
	<div class="form-group">
	  <input name="danwei" class="form-control"  value="<?php echo  isset($_POST['danwei'])?$_POST['danwei']:'' ?>" placeholder="申请单位">
	</div>
	<div class="form-group">
	  <input name="address" class="form-control"  value="<?php  echo isset($_POST['address'])?$_POST['address']:'' ?>" placeholder="地址">
	</div>

	<div class="form-group">

    <?php
        echo Securimage::getCaptchaHtml();
    ?>
	</div>
  <button type="submit" class="btn btn-primary">Sign in</button>
<?php

	} ?>
</form>




















      </div>
    </div>
  </div>
	</section>
</div>





<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="f-logo" src="./images/logo-m.png">
				<ul>
					<li>招贤纳士</li>
					<li>意见反馈</li>
					<li>法律声明</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h1>互联网+云平台软件技术开发商</h1>
				<table>
					<tr>
						<td>
							<span>服务热线</span>
							<h1 class="red">
								<strong>400-180-1790</strong>
							</h1>
						</td>
						<td>
							<span>服务QQ</span>
							<h1 class="red">
								457487827
							</h1>
						</td>
					</tr>
				</table>
				<div class="copyright">Copyright 1998-2016</div>
			</div>
			<div class="col-md-4">
				<table class="qrcodes">
					<tr>
						<td>
							<img src="#">
							<p>微信公众号</p>
						</td>
						<td>
							<img src="#">
							<p>微信</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	document.oncontextmenu = function(){
                event.returnValue = false;
            };
</script>
<script type="text/javascript" src="./dist/all.min.js"></script>
	<img  style="CURSOR: pointer;position: fixed;
    right: 0;
    bottom: 100px;" onclick="javascript:window.open('http://b.qq.com/webc.htm?new=0&sid=337683617&o=smdsada.com&q=7', '_blank', 'height=502, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');"  border="0" SRC=http://wpa.qq.com/pa?p=1:337683617:1 alt="联系我们">

</body>
</html>
