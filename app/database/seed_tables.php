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
		$st = $db->prepare( 'INSERT INTO korisnici(username, password_hash, email, reg_sifra, registriran) VALUES (:username, :password, :email, \'idc\', \'1\')' );

		$st->execute( array( 'username' => 'maja', 'password' => password_hash( 'majinasifra', PASSWORD_DEFAULT ), 'email' => 'maja@mail.com' ) );
		$st->execute( array( 'username' => 'nikola', 'password' => password_hash( 'nikolinasifra', PASSWORD_DEFAULT ), 'email' => 'nikola@mail.com' ) );
		$st->execute( array( 'username' => 'ana', 'password' => password_hash( 'aninasifra', PASSWORD_DEFAULT ), 'email' => 'ana@mail.com' ) );
		$st->execute( array( 'username' => 'josipa', 'password' => password_hash( 'josipinasifra', PASSWORD_DEFAULT ), 'email' => 'josipa@mail.com' ) );
		$st->execute( array( 'username' => 'ivan', 'password' => password_hash( 'ivanovasifra', PASSWORD_DEFAULT ), 'email' => 'ivan@mail.com' ) );
		$st->execute( array( 'username' => 'ante', 'password' => password_hash( 'antinasifra', PASSWORD_DEFAULT ), 'email' => 'ante@mail.com' ) );
		$st->execute( array( 'username' => 'silvija', 'password' => password_hash( 'silvijinasifra', PASSWORD_DEFAULT ), 'email' => 'silvija@mail.com' ) );
	}
	catch( PDOException $e ) { exit( "PDO error [insert korisnici]: " . $e->getMessage() ); }

	echo "Ubacio sam neke korisnike u tablicu korisnici.<br />";
}

function seed_table_proizvodi()
{
	$db = DB::getConnection();
	try
	{
		$st = $db->prepare( 'INSERT INTO proizvodi(id_trgovina, ime, popust, cijena) VALUES (:id_trgovina, :ime, :popust, :cijena)' );

		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Breskva', 'popust' => 15, 'cijena' => 12.99) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Kava', 'popust' => 20, 'cijena' => 34.99) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Svinjska lopatica', 'popust' => NULL, 'cijena' => 21.99 ) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Mlijeko', 'popust' => NULL, 'cijena' => 8.49) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Mortadela', 'popust' => 10, 'cijena' => 49.90) );
		$st->execute( array( 'id_trgovina' => 1, 'ime' => 'Lovački kruh', 'popust' => NULL, 'cijena' => 9.79) );

		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Breskva', 'popust' => 10, 'cijena' => 13.49) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Kava', 'popust' => NULL, 'cijena' => 38.59) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Svinjska lopatica', 'popust' => 10, 'cijena' => 17.99 ) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Mlijeko', 'popust' => NULL, 'cijena' => 8.49) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Mortadela', 'popust' => NULL, 'cijena' => 52.90) );
		$st->execute( array( 'id_trgovina' => 2, 'ime' => 'Lovački kruh', 'popust' => 5, 'cijena' => 9.29) );

		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Breskva', 'popust' => NULL, 'cijena' => 14.99) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Kava', 'popust' => 25, 'cijena' => 30.99) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Svinjska lopatica', 'popust' => 20, 'cijena' => 16.99 ) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Mlijeko', 'popust' => NULL, 'cijena' => 8.99) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Mortadela', 'popust' => NULL, 'cijena' => 55.90) );
		$st->execute( array( 'id_trgovina' => 3, 'ime' => 'Lovački kruh', 'popust' => NULL, 'cijena' => 8.99) );

		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Breskva', 'popust' => NULL, 'cijena' => 13.99) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Kava', 'popust' => 10, 'cijena' => 36.99) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Svinjska lopatica', 'popust' => NULL, 'cijena' => 20.99 ) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Mlijeko', 'popust' => NULL, 'cijena' => 7.99) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Mortadela', 'popust' => NULL, 'cijena' => 58.90) );
		$st->execute( array( 'id_trgovina' => 4, 'ime' => 'Lovački kruh', 'popust' => 20, 'cijena' => 7.99) );

		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Jabuka', 'popust' => 15, 'cijena' => 5.99) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Kava', 'popust' => NULL, 'cijena' => 39.99) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Svinjska lopatica', 'popust' => 20, 'cijena' => 16.99 ) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Mlijeko', 'popust' => 5, 'cijena' => 7.99) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Mortadela', 'popust' => NULL, 'cijena' => 58.90) );
		$st->execute( array( 'id_trgovina' => 5, 'ime' => 'Lovački kruh', 'popust' => NULL, 'cijena' => 10.79) );

		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Jabuka', 'popust' => NULL, 'cijena' => 7.99) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Kava', 'popust' => NULL, 'cijena' => 39.99) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Svinjska lopatica', 'popust' => NULL, 'cijena' => 25.99 ) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Mlijeko', 'popust' => NULL, 'cijena' => 8.49) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Mortadela', 'popust' => 10, 'cijena' => 48.90) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Lovački kruh', 'popust' => 20, 'cijena' => 6.99) );
		$st->execute( array( 'id_trgovina' => 6, 'ime' => 'Breskva', 'popust' => 15, 'cijena' => 11.99) );

		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Breskva', 'popust' => 25, 'cijena' => 9.99) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Kava', 'popust' => 25, 'cijena' => 28.99) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Svinjska lopatica', 'popust' => 25, 'cijena' => 16.99 ) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Mlijeko', 'popust' => NULL, 'cijena' => 8.99) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Mortadela', 'popust' => NULL, 'cijena' => 55.49) );
		$st->execute( array( 'id_trgovina' => 7, 'ime' => 'Lovački kruh', 'popust' => NULL, 'cijena' => 10.29) );

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
		$st->execute( array( 'naziv' => 'Lidl') );
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
