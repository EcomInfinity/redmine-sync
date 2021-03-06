<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>单个issue信息</title>
	</head>
	<body>
		<table cellpadding="5" cellspacing="0" border="1" width="800">
			<tr>
			<td>需求编号</td><td><?php echo ($result["issue"]["id"]); ?></td><td>所属项目</td><td><?php echo ($result["issue"]["project"]["name"]); ?></td>
			</tr>
			<tr>
			<td>处理人</td><td><?php echo ($result["issue"]["assigned_to"]["name"]); ?></td><td>更新时间</td><td><?php echo ($result["issue"]["updated_on"]); ?></td>
			</tr>
			<tr>
			<td>问题类型</td><td><?php echo ($result["issue"]["tracker"]["name"]); ?></td><td>状态</td><td><?php echo ($result["issue"]["status"]["name"]); ?></td>
			</tr>
			<tr>
			<td>主题</td><td><?php echo ($result["issue"]["subject"]); ?></td><td>优先级</td><td><?php echo ($result["issue"]["priority"]["name"]); ?></td>
			</tr>
			<tr>
			<td>描述</td><td colspan="3"><?php echo ($result["issue"]["description"]); ?></td>
			</tr>
			<tr>
			<td>创建人</td><td><?php echo ($result["issue"]["author"]["name"]); ?></td><td>创建时间</td><td><?php echo ($result["issue"]["created_on"]); ?></td>
			</tr>
			<tr>
			<td>附件</td><td colspan="3"><a href="<?php echo ($result["issue"]["attachments"]["0"]["content_url"]); ?>"><?php echo ($result["issue"]["attachments"]["0"]["content_url"]); ?></a></td>
			</tr>
		</table>
	</body>
</html>