<?php

function db_open()
{
	return sqlite_open('data/db.sqlite');
}

function db_qr(&$db, $sql)
{
	$results = sqlite_array_query($db, $sql, SQLITE_ASSOC);
	foreach($results as &$result)
	{
		$result = array_map('htmlspecialchars', $result);
	}
	return $results;
}

function db_qrs(&$db, $sql)
{
	$results = db_qr($db, $sql);
	return $results[0];
}

function db_q(&$db, $sql)
{
	sqlite_exec($db, $sql);
}

function db_close(&$db)
{
	sqlite_close($db);
}


?>
