<?php
 
/**
 * 主配置文件
 * @author skinawang
 * */
$_CONFIG = array(
	'db'=>array(
		'db_host'=>'localhost',
		'db_port'=>'3306',
		'db_user'=>'root',
		'db_pswd'=>'',
		'db_db'=>'jsfl',
		'db_prex'=>'jsfl_',
	),
	'weixin'=>array(
		'appid'=>'wx0bc2bd6d57db8f0b',
		'appsecret'=>'7618b5f5323725a22593f656ed3325cd',
		'token'=>'',
		'mchid'=>'1231423302',
		'mchkey'=>'jssetjjhjssetjjhjssetjjhjssetjjh'
	),
	'weixin_fl'=>array(
		'appid'=>'wx0bc2bd6d57db8f0b',
		'appsecret'=>'7618b5f5323725a22593f656ed3325cd'
	)
);


/**
 * 数据库操作类文件
 * @author skinawang
 * */
class db{
	private static $conn;
	private static $isconnect = false;
	private static $config = array(
	'db_host'=>'localhost',
	'db_port'=>'3306',
	'db_user'=>'root',
	'db_pswd'=>'root',
	'db_db'=>'',
	'db_prex'=>'',
	'db_err_connect_fail'=>'can\'t connect to database'
	);
	
	private function __construct() {
	}
	
	public static function configset($configdata = array()){    //此方法功能是用$_CONFIG的信息来覆盖数据库配置信息
		if (self::$isconnect){
			return false;
		}
		self::$config = array_merge(self::$config,$configdata);  //合并数组，相同键名覆盖前值
	}



	public static function db_conn() {  //创建数据库连接
		$return = false;
		if (!self::$isconnect){
			if (!@self::$conn=mysqli_connect(self::$config['db_host'],self::$config['db_user'],self::$config['db_pswd'],self::$config['db_db'],self::$config['db_port'])) {
				exit(self::$config['db_err_connect_fail']);
				die();
			}
			if (self::$conn) {
				mysqli_query(self::$conn,'set names \'UTF8\'');
			}
			$return = true;
			self::$isconnect = true;
		}
		return $return;
	}


    public static function first($sql) {
    	self::db_conn();
		$row = array();
		$result='';
		$result=self::$conn && $sql?mysqli_query(self::$conn,$sql.' limit 0,1'):false;
		if($result && $r=mysqli_fetch_array($result,MYSQLI_BOTH)) {
			$row=$r;
		}
		return $row;
	}


}

class system{

	private static $_db = false;

	/**
	 * db
	 * 初始化数据库，使用数据库之前必须事先初始化
	 * @access public
	 */
	public static function db(){
		global $_CONFIG;
		if (!self::$_db){
			db::configset($_CONFIG['db']);
			self::$_db = true;
		}
		return db::db_conn();
	}
	
}




system::db();

$info = db::first('select `uid`,`pswd`,`citykey`,`right` from '.db::table('admin_user').' where `nick`=\''.$name.'\'');

session_write_close();


