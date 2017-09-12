<?php


/**----index.php-----**/


class user{


	 * session
	 * 存储/读取 session
	 * @param $name session名
	 * @param $value session值
	 * @param $start 是否需要开启session
	 * @access public
	 */
	public static function session($name,$value=null,$start=true){
		$return = false;
		$start && session_start();
		if ($value!==null){
		    $_SESSION[$name] = $value;
		    $return = true;
		}else {
			$return = isset($_SESSION[$name])?$_SESSION[$name]:'';
		}
		$start && session_write_close();
		return $return;
	}

	/**
	 * user
	 * 登录用户信息
	 * @access public
	 * 待开发
	 */
	public static function user(){
		session_start();
		$uid = system::session('admin_uid',null,false);
		$unick = system::session('admin_nick',null,false);
		$city = system::session('admin_city',null,false);
		$right = system::session('admin_right',null,false);
		session_write_close();
		if ($uid>0){
			return array($uid,$unick,0,$city,explode(',',$right));
		}else {
			return array(0,'',0,0,array());
		}
	}

}

//对管理路径下的ACT执行身份验证操作
if (strpos($_route['act'],'admin/')===0){
	list($_G['admin_uid'],$_G['admin_unick'],$_G['admin_type'],$_G['admin_city'],$_G['admin_right']) = system::user();
	if ($_G['admin_uid']<=0 && $_route['act']!='admin/login'){
		header('location:/admin/login');
	}
}


//admin_uid>0说明了啥？



