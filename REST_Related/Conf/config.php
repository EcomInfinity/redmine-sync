<?php
return array(
	'SHOW_PAGE_TRACE'=>True,
	'APP_GROUP_LIST'=>'Admin,Home',//分组列表
	'DEFAULT_GROUP'=>'Home',//默认分组
	'APP_GROUP_MODE'=>1,//开启独立分组模式

	//配置数据库
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_PORT'=>3306,
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_NAME'=>'rest',
	'DB_PREFIX'=>'rest_',
	'DB_CHARSET'=>'utf8',

	//设置时区
	'DEFAULT_TIMEZONE'=>'PRC', // 设置默认时区为新加坡

	//导入平台所建的project_id
	'new_project_id'=>'3',

	'baseurl' => array(
		'from' => 'http://portal.ecominfinity.com/',
		'to' => 'http://localhost:3000/'
	),
	// 'baseurl' => 'http://portal.ecominfinity.com/',
	//API access key
	'token_to'=>'520fe1927cbff70a5b7f8ed912658a102b10fe29',
	'token_from' => '88e11ea7c3f64e36eabfef5e1cbc0a198e0885b0',
	
	'issue' => array(
		'get' => array(
			'url' => 'issues/%s.json',
			'filters'=>array(
							'include' => 'attachments,journals',//attachments 附件 journals回复
							'project_id' => '',
							'subject_id' => '',
							'tracker_id' => '',// 1 =>bug 2 =>feature 3 =>support 4 =>disscussion 5 =>code review 6 =>Q&A
							'status_id' => '',// 1 =>new 2 =>in progress 3 =>resolved 4 =>feedback 5 =>closed 
							'assigned_to_id' => '',
							'author_id' => '',
							'priority_id' => '',// 3 =>low 4 =>normal 5 =>high 6 =>urgent 7 =>immediate
							'start_date' => '',// yyyy-mm-dd
							'created_on' => '',// yyyy-mm-dd
							'updated_on' => '',// yyyy-mm-dd 
				)
		),
		'gets' => array(
			'url' => 'issues.json',
			'filters' => array(	
							'project_id' => '',
							'subject_id' => '',
							'tracker_id' => '',// 1 =>bug 2 =>feature 3 =>support 4 =>disscussion 5 =>code review 6 =>Q&A
							'status_id' => '',// 1 =>new 2 =>in progress 3 =>resolved 4 =>feedback 5 =>closed 
							'assigned_to_id' => '',
							'author_id' => '',
							'priority_id' => '',// 3 =>low 4 =>normal 5 =>high 6 =>urgent 7 =>immediate
							'start_date' => '',// yyyy-mm-dd
							'created_on' => '',// yyyy-mm-dd
							'updated_on' => '',// yyyy-mm-dd 
							),
	
		),
		'posts' => array(
			'url' => 'issues.json',
	),
		'put' => array(
			'url' => 'issues/%s.json',
	),
),
);
?>