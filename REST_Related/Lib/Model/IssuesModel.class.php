<?php
class IssuesModel extends UrlModel{
	//获取所有issue
	public function gets($_params,$_method){
		$_config = C('issue.gets');
		$_token = C('token_from');
		$_base_url = C('baseurl.from');
		$_body="";
		return D('Issues')->get_url($_config,$_params,$_base_url,$_token,$_method,$_body);
	}

	//获取单个issue的方法
	public function get($_get_url,$_params,$_method){
		$_config = $_get_url;
		$_token = C('token_from');
		$_base_url = C('baseurl.from');
		$_body="";
		return D('Issues')->get_issue_url($_config,$_params,$_base_url,$_token,$_method,$_body);
	}

	//更新单个issue的方法
	public function put($_url,$_body,$_method){
		$_config = $_url;
		$_token = C('token_to');
		$_base_url = C('baseurl.to');
		return D('Issues')->url_put($_config,$_base_url,$_token,$_method,$_body);
	}
	
	//写入所有issue的方法
	public function posts($_body,$_method){
		$_config = C('issue.posts');
		$_token = C('token_to');
		$_base_url = C('baseurl.to');
		return D('Issues')->get_url($_config,$_params,$_base_url,$_token,$_method,$_body);	
	}

	//判断issue是写入还是更新的方法
	public function create(){
		//获取上次更新时间
	    	$updatetime = D('Issues')->getUpdateTime();
	    	// $updatetime=strtotime("2014-12-25");
	    	$updatetime = date("Y-m-d",$updatetime);
	    	//将更新时间放入GET数组
	    	$_GET['updated_on'] =">=".$updatetime;
	    	//更新数据库保存的时间值
	    	$data['updatetime'] = time();
			M('Config')->where('id=1')->save($data);
			//参数传递
			$_params =$_GET;
			$_issuesmodel = D('Issues');
			$_issues = $_issuesmodel->gets($_params,'get');
			//取出数据库中保存的init_isssues_id
			$_init_id = M('Issuesid')->getfield('init_issues_id',true);
			//判断是更新还是新建
			foreach($_issues['issues'] as $_issue){
				//判断issue_id是否在数组中，不在就新建，否则就更新数据
				if(!in_array($_issue['id'],$_init_id)){

					$_body=array(
						"key"=>'520fe1927cbff70a5b7f8ed912658a102b10fe29',
						"issue"=>array(
							  	'project_id'=>C('new_project_id'),
							  	'subject'=>$_issue['subject'],
							  	'priority_id'=>$_issue['priority']['id'],
							  	'tracker_id'=>$_issue['tracker']['id'],
							  	'status_id'=>$_issue['status']['id'],
							  	'author_id'=>$_issue['author']['id'],
							  	'start_date' =>$_issue['start_date'],
							  	'created_on' =>$_issue['created_on'],
							  	'updated_on' =>$_issue['updated_on'],
							  	'assigned_to_id' =>$_issue['assigned_to']['id'],
							  	),
						);
					$_create_issues=$_issuesmodel->posts($_body,'post');
					//将新id保存到数据库中
					$data['init_issues_id'] = $_issue['id'];
					$data['new_issues_id'] = $_create_issues['issue']['id'];
					M('Issuesid')->add($data);

			 }else{//更新issue

				 	//根据init_issues_id获取new_issues_id
				 	$_new_id = M('Issuesid') ->where("init_issues_id=".$_issue['id'])->getfield('new_issues_id');
				 	$_get_url=sprintf(C('issue.get')['url'],$_issue['id']);
				 	
					$_get_issue =  $_issuesmodel->get($_get_url,$_params="",'get');
					//根据init_issues_id 获取comments的条数
					$_comments_num = M('Issuesid') ->where("init_issues_id=".$_issue['id'])->getfield('comments');
					$_journals_len= count($_get_issue['issue']['journals']);
				
					//比较评论数与数据库保存评论数的大小
					if($_journals_len>$_comments_num){
						$_comments = array_slice($_get_issue['issue']['journals'], $_comments_num);
						
						$_body=array(
							"key"=>'520fe1927cbff70a5b7f8ed912658a102b10fe29',
							"issue"=>array(
								  	'project_id'=>C('new_project_id'),
								  	'subject'=>$_issue['subject'],
								  	'priority_id'=>$_issue['priority']['id'],
								  	'tracker_id'=>$_issue['tracker']['id'],
								  	'status_id'=>$_issue['status']['id'],
								  	'updated_on' =>$_issue['updated_on'],
								  	'assigned_to_id' =>$_issue['assigned_to']['id'],
								  	'notes' =>$_comments,
								  	
								  	),
							);
					//将新的评论条数存入数据库
					$data['comments'] = $_journals_len;
					M('Issuesid') ->where("init_issues_id=".$_issue['id'])->save($data);
				 	$_url=sprintf(C('issue.put')['url'],$_new_id);
					$_put_issues=$_issuesmodel->put($_url,$_body,'put');

				}else{

					$_body=array(
							"key"=>'520fe1927cbff70a5b7f8ed912658a102b10fe29',
							"issue"=>array(
								  	'project_id'=>C('new_project_id'),
								  	'subject'=>$_issue['subject'],
								  	'priority_id'=>$_issue['priority']['id'],
								  	'tracker_id'=>$_issue['tracker']['id'],
								  	'status_id'=>$_issue['status']['id'],
								  	'updated_on' =>$_issue['updated_on'],
								  	'assigned_to_id' =>$_issue['assigned_to']['id'], 	
								  	),
							);
				 	$_url=sprintf(C('issue.put.url')['url'],$_new_id);
					$_put_issues=$_issuesmodel->put($_url,$_body,'put');
				 
				}
			}
		}
	}


	//记录更新时间的方法
	public function getUpdateTime(){
		$_time_model = M('Config');
		$_update_time = $_time_model->getfield('updatetime');
		if($_update_time !=""){
				//取出上次更新时间
					return $_update_time;
				}else{
					//说明是第一次获取issue
					$data['updatetime'] = time();
					$_time_model->add($data);
		 }
	}
}
?>