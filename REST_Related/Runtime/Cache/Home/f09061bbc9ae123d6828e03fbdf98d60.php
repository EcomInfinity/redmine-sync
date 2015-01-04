<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>问题单信息</title>
</head>
<style type="text/css">
	table{
		margin-top: 10px;
	}
</style>
<body>
<?php if(is_array($result["issues"])): foreach($result["issues"] as $key=>$vo): if(strtotime($vo['updated_on']) > $update): ?><table cellpadding="5" cellspacing="0" border="1" width="800">
		<tr><td>需求编号</td><td><?php echo ($vo["id"]); ?></td><td>所属项目</td><td><?php echo ($vo["project"]["name"]); ?></td></tr>
		<tr><td>处理人</td><td><?php echo ($vo["assigned_to"]["name"]); ?></td><td>更新时间</td><td><?php echo ($vo["updated_on"]); ?></td></tr>
		<tr><td>问题类型</td><td><?php echo ($vo["tracker"]["name"]); ?></td><td>状态</td><td><?php echo ($vo["status"]["name"]); ?></td></tr>
		<tr><td>主题</td><td><?php echo ($vo["subject"]); ?></td><td>优先级</td><td><?php echo ($vo["priority"]["name"]); ?></td></tr>
		<tr><td>描述</td><td colspan="3"><?php echo ($vo["description"]); ?></td></tr>
		<tr><td>创建人</td><td><?php echo ($vo["author"]["name"]); ?></td><td>创建时间</td><td><?php echo ($vo["created_on"]); ?></td></tr>
	</table>
<?php else: endif; endforeach; endif; ?>

</body>
</html>