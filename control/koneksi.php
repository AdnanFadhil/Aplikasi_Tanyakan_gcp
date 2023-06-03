<?php 
	
	//Detail Database
	$cloud_sql_connection = getenv("CLOUD_SQL_CONNECTION_NAME");
	$db_name = "forum_database";	//nama databasenya
	$db_username ="adnanfadhil"; //username database
	$db_pass = "123190098"; //password database
	$socket_dir = getenv("DB_SOCKET_DIR") ?: "/cloudsql";

	$dsn = sprintf("mysql:dbname=%s;unix_socket=%s/%s",$db_name,$socket_dir,$cloud_sql_connection);

	try {
    $pdo = new PDO($dsn, $db_username, $db_pass);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>