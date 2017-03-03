<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
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
			}
			
			table tr.title
			{
            background-color: #EEEEEE;
			}
			
			table tr td
			{
            padding: 0px 3px 0px 3px;
            border-style: solid;
            border-width: 1px;
            border-color: #666666;
			}
			
			table tr td.null
			{
            color: #999999;
            text-align: center;
            padding: 0px 3px 0px 3px;
            border-style: solid;
            border-width: 1px;
            border-color: #666666;
			}
			
			table tr td.separator
			{
            padding: 0px 3px 0px 3px;
            border-style: solid;
            border-width: 1px;
            border-color: #666666;
            background-color: #DDDDDD;
			}
			
			table tr td.rownum
			{
            padding: 0px 3px 0px 3px;
            border-style: solid;
            border-width: 1px;
            border-color: #666666;
            background-color: #DDDDDD;
            text-align: right;
			}
			
		</style>
	</head>
	<body>
		<h1 style=" text-align: center;"><b>NanoLine Lister for Anarchy Online</b></h1>
		<input name="prefs" type="file"><br>
		Select your character's Prefs.xml file to show what nanos you already have. (not implemented yet)<br>
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
					<td> <b>profession</b> </td>
					<td> <b>nanoline</b> </td>
					<td> <b>ql</b> </td>
					<td> <b>name</b> </td>
					<td> <b>aoid</b> </td>
					<td> <b>icon</b> </td>
					<td> <b>location</b> </td>
				</tr>
				<?php 
					$db = new SQLite3('aoitems.db'); 
					
					$sql = "SELECT nanos.profession,
					nanolines.name AS nanoline,
					aoItems.ql,
					aoItems.name,
					aoItems.aoid,
					aoItems.icon,
					nanos.location
					FROM aoItems
					JOIN
					nanos ON aoItems.aoid = nanos.lowid
					JOIN
					nano_nanolines_ref ON nanos.lowid = nano_nanolines_ref.lowid
					JOIN
					nanolines ON nano_nanolines_ref.nanolineid = nanolines.id
					ORDER BY nanos.profession ASC,
					nanoline ASC,
					aoItems.ql ASC,
					aoItems.name ASC;"; 
					
					$result = $db->query($sql);//->fetchArray(SQLITE3_ASSOC); 
					
					$row = array(); 
					
					$i = 0; 
					
					while($res = $result->fetchArray(SQLITE3_ASSOC)){ 
						echo "<tr>\n\r";
						echo "	<td align='left'> {$res['profession']} </td>\n\r";
						echo "	<td align='left'> {$res['nanoline']} </td>\n\r";
						echo "	<td align='right'> {$res['ql']} </td>\n\r";
						echo "	<td align='left'> {$res['name']} </td>\n\r";
						echo "	<td align='right'> {$res['aoid']} </td>\n\r";
						echo "	<td align='right'> {$res['icon']} </td>\n\r";
						echo "	<td align='left'> {$res['location']} </td>\n\r";
						echo "</tr>\n\r";
						
					}
				?>
			</tbody>
		</table>
	</body>
</html>					