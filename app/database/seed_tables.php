<?php

require_once __DIR__ . '/db.class.php';

seed_table_korisnici();
seed_table_proizvodi();
seed_table_trgovine();
seed_table_recenzije();

exit( 0 );

// --------------------------------------------
function seed_table_korisnici()
{
	$db = DB::getConnection();
	try
	{
		$st = $db->prepare( 'INSERT INTO korisnici(username, password_hash, email, reg_sifra, registriran) VALUES (:username, :password, \'i@d.com\', \'idc\', \'1\')' );

		$st->execute( array( 'username' => 'maja', 'password' => password_hash( 'majinasifra', PASSWORD_DEFAULT ) ) );
		$st->execute( array( 'username' => 'nikola', 'password' => password_hash( 'nikolinasifra', PASSWORD_DEFAULT ) ) );
		$st->execute( array( 'username' => 'ana', 'password' => password_hash( 'aninasifra', PASSWORD_DEFAULT ) ) );
		$st->execute( array( 'username' => 'josipa', 'password' => password_hash( 'josipinasifra', PASSWORD_DEFAULT ) ) );
		$st->execute( array( 'username' => 'ivan', 'password' => password_hash( 'ivanovasifra', PASSWORD_DEFAULT ) ) );
		$st->execute( array( 'username' => 'ante', 'password' => password_hash( 'antinasifra', PASSWORD_DEFAULT ) ) );
		$st->execute( array( 'username' => 'silvija', 'password' => password_hash( 'silvijinasifra', PASSWORD_DEFAULT ) ) );
	}
	catch( PDOException $e ) { exit( "PDO error [insert korisnici]: " . $e->getMessage() ); }

	echo "Ubacio sam neke korisnike u tablicu korisnici.<br />";
}

function seed_table_proizvodi()
{
	$db = DB::getConnection();
	try
	{
		$st = $db->prepare( 'INSERT INTO proizvodi(id_trgovina, ime, akcija, cijena) VALUES (:id_trgovina, :ime, :akcija, :cijena)' );

		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Breskva', 'akcija' => 15, 'cijena' => 12.99) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Kava', 'akcija' => 20, 'cijena' => 34.99) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Svinjska lopatica', 'akcija' => NULL, 'cijena' => 21.99 ) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Mlijeko', 'akcija' => NULL, 'cijena' => 8.49) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Mortadela', 'akcija' => 10, 'cijena' => 49.90) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Lovački kruh', 'akcija' => NULL, 'cijena' => 9.79) );

		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Breskva', 'akcija' => 10, 'cijena' => 13.49) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Kava', 'akcija' => NULL, 'cijena' => 38.59) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Svinjska lopatica', 'akcija' => 10, 'cijena' => 17.99 ) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Mlijeko', 'akcija' => NULL, 'cijena' => 8.49) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Mortadela', 'akcija' => NULL, 'cijena' => 52.90) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Lovački kruh', 'akcija' => 5, 'cijena' => 9.29) );

		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Breskva', 'akcija' => NULL, 'cijena' => 14.99) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Kava', 'akcija' => 25, 'cijena' => 30.99) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Svinjska lopatica', 'akcija' => 20, 'cijena' => 16.99 ) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Mlijeko', 'akcija' => NULL, 'cijena' => 8.99) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Mortadela', 'akcija' => NULL, 'cijena' => 55.90) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Lovački kruh', 'akcija' => NULL, 'cijena' => 8.99) );

		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Breskva', 'akcija' => NULL, 'cijena' => 13.99) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Kava', 'akcija' => 10, 'cijena' => 36.99) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Svinjska lopatica', 'akcija' => NULL, 'cijena' => 20.99 ) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Mlijeko', 'akcija' => NULL, 'cijena' => 7.99) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Mortadela', 'akcija' => NULL, 'cijena' => 58.90) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Lovački kruh', 'akcija' => 20, 'cijena' => 7.99) );

		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Jabuka', 'akcija' => 15, 'cijena' => 5.99) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Kava', 'akcija' => NULL, 'cijena' => 39.99) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Svinjska lopatica', 'akcija' => 20, 'cijena' => 16.99 ) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Mlijeko', 'akcija' => 5, 'cijena' => 7.99) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Mortadela', 'akcija' => NULL, 'cijena' => 58.90) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Lovački kruh', 'akcija' => NULL, 'cijena' => 10.79) );

		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Jabuka', 'akcija' => NULL, 'cijena' => 7.99) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Kava', 'akcija' => NULL, 'cijena' => 39.99) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Svinjska lopatica', 'akcija' => NULL, 'cijena' => 25.99 ) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Mlijeko', 'akcija' => NULL, 'cijena' => 8.49) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Mortadela', 'akcija' => 10, 'cijena' => 48.90) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Lovački kruh', 'akcija' => 20, 'cijena' => 6.99) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Breskva', 'akcija' => 15, 'cijena' => 11.99) );

		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Breskva', 'akcija' => 25, 'cijena' => 9.99) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Kava', 'akcija' => 25, 'cijena' => 28.99) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Svinjska lopatica', 'akcija' => 25, 'cijena' => 16.99 ) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Mlijeko', 'akcija' => NULL, 'cijena' => 8.99) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Mortadela', 'akcija' => NULL, 'cijena' => 55.49) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Lovački kruh', 'akcija' => NULL, 'cijena' => 10.29) );

	}
	catch( PDOException $e ) { exit( "PDO error [proizvodi]: " . $e->getMessage() ); }

	echo "Ubacio neke proizvode u tablicu proizvodi.<br />";
}

function seed_table_trgovine()
{
	$db = DB::getConnection();
	try
	{
		$st = $db->prepare( 'INSERT INTO trgovine(naziv) VALUES (:naziv)' );

		$st->execute( array( 'naziv' => 'Plodine') );
		$st->execute( array( 'naziv' => 'Konzum') );
		$st->execute( array( 'Naziv' => 'Lidl') );
		$st->execute( array( 'naziv' => 'Interspar') );
		$st->execute( array( 'naziv' => 'Birota') );
		$st->execute( array( 'naziv' => 'Tommy') );
		$st->execute( array( 'naziv' => 'Metro') );

	}
	catch( PDOException $e ) { exit( "PDO error [trgovine]: " . $e->getMessage() ); }

	echo "Ubacio neke trgovine u tablicu trgovine.<br />";
}

function seed_table_recenzije()
{
	$db = DB::getConnection();
	try
	{
		$st = $db->prepare( 'INSERT INTO recenzije(id_trgovina, id_korisnik, ocjena, review) VALUES (:id_trgovina, :id_korisnik, :ocjena, :review)' );

		$st->execute( array( 'id_trgovina' => 1, 'id_korisnik' => 1, 'ocjena' => 4, 'review' => 'Ljubazno osoblje, ali više cijene nego u nekim konkurentskim radnjama' ) );
		$st->execute( array( 'id_trgovina' => 1, 'id_korisnik' => 5, 'ocjena' => 5, 'review' => 'Iznimno svježe voće.' ) );

		$st->execute( array( 'id_trgovina' => 2, 'id_korisnik' => 4, 'ocjena' => 5, 'review' => 'Uredno i čisto, cijene prosječne. Moje preporuke.' ) );

		$st->execute( array( 'id_trgovina' => 3, 'id_korisnik' => 5, 'ocjena' => 5, 'review' => 'Pristupačne cijene' ) );
		$st->execute( array( 'id_trgovina' => 3, 'id_korisnik' => 3, 'ocjena' => 3, 'review' => 'Kupljeno mlijeko kojem je istekao rok, ali je osoblje bilo ljubazno pri reklamaciji.' ) );

		$st->execute( array( 'id_trgovina' => 4, 'id_korisnik' => 1, 'ocjena' => 5, 'review' => 'Dostava obavljena u kratkom roku, sve je bilo svježe i dostavljač iznimnno ljubazan.' ) );

		$st->execute( array( 'id_trgovina' => 5, 'id_korisnik' => 2, 'ocjena' => 2, 'review' => 'Nisam zadovoljan uslugom, predugo čekao na red na blagajni.' ) );
		$st->execute( array( 'id_trgovina' => 5, 'id_korisnik' => 6, 'ocjena' => 5, 'review' => 'Ljubazne prodavačice, od velike pomoći.' ) );

		$st->execute( array( 'id_trgovina' => 6, 'id_korisnik' => 7, 'ocjena' => 3, 'review' => 'Trulo voće i povrće.' ) );

		$st->execute( array( 'id_trgovina' => 7, 'id_korisnik' => 6, 'ocjena' => 3, 'review' => 'Malo otvorenih blagajni pa se dugo čeka na red.' ) );
		$st->execute( array( 'id_trgovina' => 7, 'id_korisnik' => 2, 'ocjena' => 5, 'review' => 'Brza dostava i čak sam dobio kupone za sljedeću kupnju.' ) );

	}
	catch( PDOException $e ) { exit( "PDO error [recenzije]: " . $e->getMessage() ); }

	echo "Ubacene neke recenzije u tablicu recenzije.<br />";
}
?>
