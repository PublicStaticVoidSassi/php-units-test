<?php

require __DIR__ . '/../vendor/autoload.php';
use App\App;

if ($_REQUEST["id"]!=null && $_REQUEST["user"]!=null && $_REQUEST["pass"]!=null){
	App::addUser($_REQUEST["id"],$_REQUEST["user"],$_REQUEST["pass"]);
}




?>
<form>
<label><input type="number" name="id" placeholder="id"/></label>
<label><input name="user" placeholder="user"/></label>
<label><input name="pass" placeholder="pass"/></label>
<input type="submit"/>
</form>

<?php
	App::dumpDb();
?>
<style>
	td {
		border:2px groove grey;
		padding:10px 20px;
	}
<style>
