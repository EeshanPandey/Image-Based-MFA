<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

	<select id="test" onchange="changeimg()">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select>
	<script type="text/javascript">	
		function changeimg () {
			var x = document.getElementById('test').value;
			console.log(x);
		}
	</script>

<?php
	  date_default_timezone_set("Asia/Calcutta");

	echo date("Y-m-d H:i:s",time());

?>
</body>
</html>