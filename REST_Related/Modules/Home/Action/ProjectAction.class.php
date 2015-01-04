<?php
 class ProjectsAction extends Action{
 	//获取信息的方法
   public function gets(){
	    	//引入unirest第三方类
			Vendor('unirest-php.lib.Unirest');
			//取出配置文件中的url配置内容
			$urlArr = C('project');
			//得到issue.json，并删除数组第一个元素
			$url_first = array_shift($urlArr);
			//循环数组去掉数组中的空配置项
			foreach ($urlArr as $key => $val) {  
	        	if (empty($val)) {  
	            	continue;  
	        	}  
	        	$arr[] = $key."=".$val;  
	   		 } 
	   		//用&分隔数组中的各元素 
			$url_next = implode('&',$arr);
			//拼接Url地址
			$url = C('baseurl').$url_first."?key=".C('token').'&'.$url_next;
			var_dump($url);
			$response = Unirest::get($url,array( "Accept" => "application/json" ));
			$raw_body = $response->raw_body;
			$results = json_decode($raw_body,true);
			$result = $results['projects'];
			$this -> assign('result',$result);
			$this -> display('Projects/gets');
	    }
 }
 ?>