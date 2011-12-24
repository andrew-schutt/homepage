<?php
	$_SESSION['username'] = "";
	
	function getMessage() {
		getPage("chat.content.php","screen");
	}
?>

<html>
<head>
<meta />
<title>Chat App</title>
</head>
<style type="text/css">
body {
	font:12px arial;
}

#panel {
	border:1px solid #cccccc;
	height:430px;
	width:462px;
	padding:5px;
}

#title {
	margin-bottom:5px;
}

#screen {
	width:460px;
	height:300px;
	border:1px solid #cccccc;
	margin-bottom:5px;
	overflow-x:hidden;
	overflow-y:auto;
}

#input {
	float:left;
	margin-right:5px;
}

#send {
	float:left;
}

#user {
	border:1px solid #cccccc;
	width:150px;
}

#message {
	height:80px;
	width:345px;
	border:1px solid #cccccc;
}

#post {
	height:50px;
	width:100px;
}
</style>
<body>
<div id="panel">
	<div id="title">
		<span>Username:&nbsp;</span>
		<span><input type="text" name="user" id="user"maxlength="15"></span>
	</div>
	<div id="screen"></div>
	<div>
		<div id="input">
			<textarea name="message" id="message"></textarea>
		</div>
		<div id="send">
			<input type="button" name="post" id="post" maxlength="500" value="Post" onClick="javascript:chat();" />
		</div>
	</div>
</div>
<script type="text/javascript">
	function getPage(page, id) {
		var xmlhttp=false; //clear our fetching variable
		try {
			xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
		} catch (e) {
		try {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		} catch (e) {
			xmlhttp = false;
		}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	var file = page;
	xmlhttp.open('GET', file, true);
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4) {
			var content = xmlhttp.responseText;
			if( content ) {
				document.getElementById(id).innerHTML = content;
			}
		}
	}
	xmlhttp.send(null)
	return;
	}

	function chat() {
		var user = document.getElementById('user').value;
		var message = document.getElementById('message').value;

		getPage("chat.content.php?user=" + user + "&message=" + message, "screen");
	document.getElementById('message').value = "";
	}
</script>

<script>
	process = setInterval("getMessage()", 1000);
</script>

</body>
</html>
