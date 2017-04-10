<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
		<title>Nanos</title>
		<style type="text/css">
			table
			{
            border-style: solid;
            border-width: 1px;
            border-color: black;
            border-collapse: collapse;
			}
			
			table tr
			{
            background-color: white;
			}
			
			table tr.header
			{
            background-color: #DDDDDD;
            text-align: center;
			}
			
			table tr td
			{
            padding: 0px 3px 0px 3px;
            border-style: solid;
            border-width: 1px;
            border-color: #666666;
			}			
		</style>
	</head>
	<body>
		<h1 style="text-align: center;"><b>NanoLine Lister for Anarchy Online</b></h1>
		Select your character's Prefs.xml file to show what nanos you already have. (not implemented yet)<br>
		<input name="prefs" type="file"><br>
		<details> <i>In older copies of Windows this is in your Anarchy Online
			folder: <br>
			&nbsp;&nbsp;&nbsp; <u>{PROGRAMS}\Funcom\Anarchy
			Online\Prefs\{USER}\{CHAR}</u><br>
			In newer copies of Windows this is in your AppData folder: <br>
			&nbsp;&nbsp;&nbsp; <u>{USER}\AppData\Local\Funcom\Anarchy Online\{HASH
			CODE}\Anarchy Online\Prefs\{USER}\{CHAR}</u></i>
		</details>
		<table>
			<tbody>
				<tr class="header">
					<td> <b>Profession</b> </td>
					<td> <b>NanoLine</b> </td>
					<td> <b>QL</b> </td>
					<td> <b>Name</b> </td>
					<td> <b>Icon</b> </td>
					<td> <b>Location</b> </td>
				</tr>
				<?php 
					$db = new SQLite3('nanocrystals.db3'); 
					
					$sql = "SELECT * FROM 'nanocrystals'
					ORDER BY profession ASC,
					nanoline ASC, ql ASC, name ASC;"; 
					
					$result = $db->query($sql);//->fetchArray(SQLITE3_ASSOC); 
					
					while($res = $result->fetchArray(SQLITE3_ASSOC)){ 
						echo "\t\t\t\t<tr>\n\r";
						echo "\t\t\t\t\t<td align='left'> {$res['profession']} </td>\n\r";
						echo "\t\t\t\t\t<td align='left'> {$res['nanoline']} </td>\n\r";
						echo "\t\t\t\t\t<td align='right'> {$res['ql']} </td>\n\r";
						echo "\t\t\t\t\t<td align='left'> <a href='https://aoitems.com/item/{$res['aoid']}/'>{$res['name']}</a> </td>\n\r";
						echo "\t\t\t\t\t<td align='center'> <img alt='Icon #{$res['icon']}' src='https://static.aoitems.com/icon/{$res['icon']}' hspace='2' vspace='2' height='48' width='48' /> </td>\n\r";
						echo "\t\t\t\t\t<td align='left'> {$res['location']} </td>\n\r";
						echo "\t\t\t\t</tr>\n\r";
					}
				?>
			</tbody>
		</table> <p>Uses links and icons from <a href='https://aoitems.com/'>AOItems.com</a></p>
	</body>
</html>					