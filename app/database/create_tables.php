<?php


require_once __DIR__ . '/db.class.php';

create_table_korisnici();
create_table_proizvodi();
create_table_trgovine();
create_table_recenzije();

exit( 0 );

// -------------------------------------------------------------------
function has_table( $tblname )
{
	$db = DB::getConnection();
	
	try
	{
		$st = $db->query( 'SELECT DATABASE()' );
		$dbname = $st->fetch()[0];

		$st = $db->prepare( 
			'SELECT * FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :tblname LIMIT 1' );
		$st->execute( ['dbname' => $dbname, 'tblname' => $tblname] );
		if( $st->rowCount() > 0 )
			return true;
	}
	catch( PDOException $e ) { exit( "PDO error [show tables]: " . $e->getMessage() ); }

	return false;
}


function create_table_korisnici()
{
	$db = DB::getConnection();

	if( has_table( 'korisnici' ) )
		exit( 'Tablica korisnici vec postoji. Pokusajte ju izbrisati i pokrenuti ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS korisnici (' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'username varchar(30) NOT NULL UNIQUE,' .
			'password_hash varchar(255) NOT NULL,'.
			'email varchar(70) NOT NULL UNIQUE,' .
			'reg_sifra varchar(20) NOT NULL,' .
			'registriran int)'
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create korisnici]: " . $e->getMessage() ); }

	echo "Napravljena tablica korisnici.<br />";
}


function create_table_prozvodi()
{
	$db = DB::getConnection();

	if( has_table( 'proizvodi' ) )
		exit( 'Tablica proizvodi vec postoji. Pokusajte ju izbrisati i pokrenuti ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS proizvodi (' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'id_trgovina int NOT NULL,' .
            'ime varchar(50) NOT NULL,' .
			'akcija INT,' .
            'cijena decimal(15,2) NOT NULL)'
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create proizvodi]: " . $e->getMessage() ); }

	echo "Napravljena tablica proizvodi.<br />";
}


function create_table_trgovine()
{
	$db = DB::getConnection();

	if( has_table( 'trgovine' ) )
		exit( 'Tablica trgovine vec postoji. Pokusajte ju izbrisati i pokrenuti ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS trgovine (' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'naziv varchar(100) NOT NULL)' 
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create trgovine]: " . $e->getMessage() ); }

	echo "Napravljena tablica trgovine.<br />";
}

function create_table_recenzije()
{
	$db = DB::getConnection();

	if( has_table( 'recenzije' ) )
		exit( 'Tablica recenzije vec postoji. Pokusajte ju izbrisati i pokrenuti ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS recenzije (' .
			'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'id_trgovina int NOT NULL,' .
			'id_korisnik int NOT NULL,' .
			'ocjena INT,' .
			'review varchar(500))' 
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create recenzije]: " . $e->getMessage() ); }

	echo "Napravljena tablica recenzije.<br />";
}
?> 
