<?php
return array(
	'TMPL_PARSE_STRING'=>array(
		'__RES__'=>dirname($_SERVER['SCRIPT_NAME'])."/".APP_NAME."/Modules/".GROUP_NAME."/Resource",
		'__PUBLIC__'=>__ROOT__."/".APP_NAME."/Public",
	),

	//指定布局文件
	'LAYOUT_NAME'=>'layouts/home',
);