<html>
<head>
  <meta charset="utf-8" />
  <title>Просмотр данных</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Просмотр данных</h1>
<table>
{foreach $list as $row}
   <tr>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['Name']|escape}</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['E-mail']|escape}</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['Telephone']|escape}</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['Comment']|escape}</td>
  </tr>
{/foreach}</td>
</table>
</body>
</html>
