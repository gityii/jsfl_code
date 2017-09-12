<?php
/**
 * 后台登录页
 * @author skinawang
 */
defined('__R__') or exit('');
if ($_G['admin_uid']>0){
	header('location:/admin/index');
}
$msg = '';
//有提交登录信息
if (!empty($_POST)){
	$name = input::post('name','');  //表单获取用户名和密码
	$pswd = input::post('pswd','');
	if ($name!='' && $pswd!=''){
			system::db();
			$info = db::first('select `uid`,`pswd`,`citykey`,`right` from '.db::table('admin_user').' where `nick`=\''.$name.'\'');  //从数据库查用户信息
			if (!empty($info) && $info['pswd']==md5($pswd)){       //密码加密处理
				session_start();
				system::session('admin_uid',$info['uid'],false);   //把用户名信息等存入数据库中
				system::session('admin_nick',$name,false);
				system::session('admin_city',$info['citykey'],false);
				system::session('admin_right',$info['right'],false);
				session_write_close();
				header('location:/admin/index');
			}else {
				$msg = '用户名或密码输入有误';
			}
	}else {
		$msg = '请输入用户名和密码';
	}
}
view::render('admin/login',array(
'msg'=>$msg
));

