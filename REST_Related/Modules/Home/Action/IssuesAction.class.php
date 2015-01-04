<?php
	class IssuesAction extends Action {
	   //获取信息的方法
		// $_params = array('project_id' => 2, 'subject_id' => 1990, 'abc' => 123);
	  //   public function gets($_params=array()){
	  //   	// [TODO] GET parameters
			// $_params =$_GET;
			// $_issuesmodel = D('Issues');
			// $_issues=$_issuesmodel->gets($_params,'get');
			// // $_update_time=intval($_issuesmodel->getUpdateTime());
			// // $data['updatetime'] = time();
			// // M('Config')->where('id=1')->save($data);
			// // $this->assign('update', $_update_time);
			// $this->assign('result', $_issues);
			// $this->display('Issues/gets');
	  //   }

	  //   //获取issue附件及评论的方法
	  //   public function get($_params=array()){
	  //   	// [TODO] GET parameters
			// $_params = $_GET;
			// $_issuemodel = D('Issues');
			// $_issue=$_issuemodel->get($_params,'get');
			// var_dump($_issue['issue']);
			// $this->assign('result', $_issue);
			// $this->display('Issues/get');
	  //   }
	    


	    //将数据写入redmine的方法
	    public function posts($_params=array()){
	    	// [TODO] GET parameters
	    	$_issuemodel = D('Issues');
	    	$_issuemodel ->create();
	    }
	}
?>