<?php
include("application/Account.php")
?>
<!DOCTYPE html>
<html>
<?php include("application/views/html.php");?>
<body class="v35 webkit <?=$database->bodyClass($_SERVER['HTTP_USER_AGENT']); ?> ar-AE activate  perspectiveBuildings <?php echo DIRECTION; ?> season- buildingsV1">
	<div id="background">
		<img id="staticElements" src="img/x.gif" alt=""/>
		<div id="bodyWrapper">
			<img style="filter:chroma();" src="img/x.gif" id="msfilter" alt=""/>
			<div id="header">
				<div id="mtop">
					<a id="logo" href="<?php echo HOMEPAGE; ?>" target="_blank" title="<?php echo SERVER_NAME; ?>"></a>
					<div class="clear"></div>
				</div>
			</div>
			<div id="center">
            <?php include('application/views/menu.php');?>
				<div id="contentOuterContainer" class="size1">
					<div class="contentTitle">&nbsp;</div>
					<div class="contentContainer">
								<div id="content" class="activate">
<h1 class="titleInHeader">استعادة كلمة المرور</h1>
<div id="passwordForgotten">
<?php
$npw = $_GET['npw'];
$act = $_GET['code'];
$user = $_GET['user'];
$pagehide = false;
$userid=$database->getUserField($user,'id',1);
if($userid>0){
    $getProc = $database->getNewProc($userid);
    if($npw == $getProc['npw']){
    	if($act == $getProc['act']){
        	$newPassword = md5($getProc['npw'].mb_convert_case($user,MB_CASE_LOWER,"UTF-8"));
        	$database->updateUserField($user, 'password', $newPassword, 0);
            $database->editTableField('newproc', 'proc', 1, 'uid', $userid);
			echo 'تم تغيير كلمة المرور <br /><br />سجل الدخول بكلمة المرور الجديدة <a class="a arrow" href="login.php">تسجيل الدخول</a>';
			$database->removeProc($userid);
        }else{
        	echo '<font color="#FF0000">الكود خاطيء أو تم إستعماله بالفعل</font>';
        }
    }else{
        	echo '<font color="#FF0000">كود خاطيء</font>';
        }
}else{
	echo '<font color="#FF0000">مستخدم خاطيء!</font>';
}
?>

</div>
</div>
							<div class="clear"></div>
					</div>
						<div class="contentFooter">&nbsp;</div>
					</div>
						<div id="sidebarAfterContent" class="sidebar afterContent">



		</div><?php include("application/views/footer.php");?>

					</div>
					

				</div>
				<div id="ce"></div></div></div></div>
			
</body>
</html>
