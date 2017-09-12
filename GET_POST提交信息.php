<?php
/**
 * 输入类文件
 * @author skinawang
 * */
class input{
	/**
	 * get
	 * 获取GET请求数据
	 * @access public
	 * @param $name 参数名
	 * @param $default 默认值
	 */
	public static function get($name,$default=''){
		return isset($_GET[$name])?$_GET[$name]:$default;
	}
	
	/**
	 * post
	 * 获取POST请求数据
	 * @access public
	 * @param $name 参数名
	 * @param $default 默认值
	 */
	public static function post($name,$default=''){
		return isset($_POST[$name])?$_POST[$name]:$default;
	}

