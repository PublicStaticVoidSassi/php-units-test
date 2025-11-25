<?php
namespace App;

class App {
	public static $database = __DIR__ . "/../data/myDatabase.db";
	public static function dumpDb(){
		$table = [];
		$database = self::$database;
		$dbContext = new \SQLite3($database);
		$res = $dbContext->query("select * from users;");
		while ($line = $res->fetchArray(\SQLITE3_ASSOC)){
			$table[] = $line;
		}
		$data = json_encode($table);
		echo "<h3>Database dump</h3>
			<table>
			<tr>
				<td>id</td>
				<td>name</td>
		<td>password</td>
	</tr>
";
foreach(json_decode($data) as $line){
	//echo var_dump($line);
	echo "<tr><td>$line->id</td>";
	echo "<td>$line->username</td>";
	echo "<td>$line->password</td></tr>";
}
		echo "
</table>
";
	}
	public static function addUser($id,$user,$pass):bool{
		$dbContext = new \SQLite3(self::$database);
		return $dbContext->exec("insert into users values ($id,'$user','$pass')");
	}
}
?>
