<html>
<head>
	<title></title>
</head>
<body>
	<form action="find" method="post">
		<input type="text" name="username" placeholder="Type a name">
		<input type="submit" value="Find People">
	</form>
	@foreach($people as $u)
	<form action="add-friend" method="post" >
		{{$u['username']}}<input type="hidden" name="uid2" value="{{$u['id']}}">
		<input type="submit" value="Add Friend">
	</form>
	@endforeach
</body>
</html>