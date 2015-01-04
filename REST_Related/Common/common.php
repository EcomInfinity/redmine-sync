<?php
	function request($_url_key, $_base_url,$_token,$_method,$_body="",$_params = array()) {
		//导入unirest第三方类
			Vendor('unirest-php.lib.Unirest');
			
			switch($_method){
				case 'get':
					$_url = $_base_url . $_url_key . '&key='.$_token;
					$_response = Unirest::get($_url, array( "Accept" => "application/json" ));
					$_raw_body = $_response->raw_body;
					return json_decode($_raw_body,true);
				case 'post':
					$_url = $_base_url . $_url_key;
					$_response = Unirest::post($_url, array( "Accept" => "application/json" ),$_body);
					$_raw_body = $_response->raw_body;
					return json_decode($_raw_body,true);
				case 'put':
					$_url = $_base_url . $_url_key;
					$_response = Unirest::put($_url, array( "Accept" => "application/json" ),$_body);	
					
			}
				
		}
?>