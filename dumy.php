<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>TypeTEST</title>
</head>

<body>
	<h1>TypeTEST</h1>

	<form action="api/getPlaceInfo.php" method="POST">
		<input type="checkbox" name="type0" value="1">出生前<br>
		<input type="checkbox" name="type1" value="1">出生0才<br>
		<input type="checkbox" name="type2" value="1">1〜3才<br>
		<input type="checkbox" name="type3" value="1">3〜5才<br>

		<input type="hidden" name="apikey" value="1">
		<input type="submit" value="検索">

	</form>
</body>
</html>

