<?php
/*
Plugin Name: Line Git
Plugin URI: 
Description: 简单的Github挂件
Version: 1.0.0
Author: hades
Author URI: http://blog.mayuko.cn
License: GPL
*/


// 引入css
function lg_add_styles() {
	echo "<link href='".plugins_url('css/linegit.css', __FILE__)."' rel='stylesheet'>";
}

add_action('wp_head', 'lg_add_styles');

function lg_add_f_styles() {
	echo "<link href='".plugins_url('css/iconfont.css', __FILE__)."' rel='stylesheet'>";
}

add_action('wp_head', 'lg_add_f_styles');


//加载linegit
add_shortcode('git','line_git');
function line_git($atts,$content='') {  
	extract(shortcode_atts(array('author'=>'0','project'=>'0'), $atts));
	$result = '
	<div class="linegit">
		<div class="linegit-logo">
			<a href="https://github.com" target="_blank"><i class="iconfont icon-githublogo"></i></a>
		</div>
		<div class="linegit-project">
		'.$author.' / '.$project.'
		</div>
		<div class="linegit-download">
			<a href="https://github.com/'.$author.'/'.$project.'" target="_blank"><i class="iconfont icon-icon3"></i></a>
		</div>
	</div>
	';
	return $result;
}  

add_filter('init',line_git); 
?>