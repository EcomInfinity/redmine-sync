<?php
	class UrlModel extends Model{
		//gets方法的url issues.json
		public function get_url($_config,$_params,$_base_url,$_token,$_method,$_body){
			$_url_key = $_config['url'];//issues,json
			$_available_params = $_config['filters'];
			$_url_params = array();
			foreach ($_params as $_field => $_value) {
				if (in_array($_field,array_keys($_available_params)) === true) {
					$_url_params[] = $_field.'='.$_value;
				}
			}
			$_url_param = implode('&',$_url_params);
			$_response = request($_url_key . "?" . $_url_param,$_base_url,$_token,$_method,$_body);
			return $_response;
		}

		//put方法的url  issues/%s.json
		public function url_put($_config,$_base_url,$_token,$_method,$_body){
			$_url_key = $_config;
			$_url_param = implode('&',$_url_params);
			$_response = request($_url_key,$_base_url,$_token,$_method,$_body);
			return $_response;
		}

		//get方法的url 拿到issue评论及附件的方法  issues/%s.json
		public function get_issue_url($_config,$_params,$_base_url,$_token,$_method,$_body){
			$_url_key = $_config;
			$_url_param = "include=attachments,journals";
			$_response = request($_url_key . "?" . $_url_param,$_base_url,$_token,$_method,$_body);
			return $_response;
		}
	}
?>