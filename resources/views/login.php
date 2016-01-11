<!DOCTYPE html>
	<head>
		<title>Admin Page Login</title>
	</head>
	<body>
		<form>
			<table>
				<tr>
					<td colspan="3">Admin Page Login</td>
				</tr>
				<tr>
					<td>ID</td>
					<td><input type="text" id="login_id" placeholder="admin id"/></td>
					<td rowspan="2"><button type="button" onclick="justLogin();">Login</button></td>
				</tr>
				<tr>
					<td>PW</td>
					<td><input type="password" id="login_pw" placeholder="admin pw" onkeypress="if(event.keyCode==13){justLogin();}"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>