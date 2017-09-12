<?php

/**
 * 前端页面类文件
 * @author skinawang
 * */
class view{
	private static $_layout = false;
	private static $_layout_data = array();
	/**
	 * render
	 * 页面渲染
	 * @access public
	 * @param $temp 页面名称
	 * @param $data 渲染数据
	 */
	public static function render($temp,$data=array()){
		global $_G;
		foreach ($data as $k=>$v) {
			$$k = $v;
		}
		if (self::$_layout===false){//没有使用模板
			include __ROOT__.'/view/'.$temp.'.php';              //嵌入显示页面
		}else {
			ob_start();
			include __ROOT__.'/view/'.$temp.'.php';
			$layout_content = ob_get_contents();
			ob_end_clean();
			foreach (self::$_layout_data as $k=>$v) {
				$$k = $v;
			}
			include __ROOT__.'/view/layout/'.self::$_layout.'.php';
		}
	}
	
	/*
	 * include
	 * */
	public static function pinclude($temp,$data=array()){
		foreach ($data as $k=>$v) {
			$$k = $v;
		}
		include __ROOT__.'/view/'.$temp.'.php';
	}
	
	/**
	 * layout
	 * 页面渲染模板
	 * @access public
	 * @param $name 模板名称
	 */
	public static function layout($name,$data=array()){
		self::$_layout = $name;
		self::$_layout_data = $data;
	}

}


/**
 * 后台框架页
 * @author skinawang
 */
defined('__R__') or exit('');
view::layout('admin');
view::render('admin/index',array(
'nick'=>$_G['admin_unick']
));

