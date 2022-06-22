<?php declare(strict_types=1);

use JTL\Alert\Alert;
use JTL\Cart\Cart;
use JTL\Cart\CartHelper;
use JTL\Cart\PersistentCart;
use JTL\Checkout\Kupon;
use JTL\Customer\AccountController;
use JTL\Extensions\Download\Download;
use JTL\Extensions\Upload\Upload;
use JTL\Helpers\Form;
use JTL\Helpers\Order;
use JTL\Helpers\Request;
use JTL\Helpers\ShippingMethod;
use JTL\Helpers\Text;
use JTL\Plugin\Payment\LegacyMethod;
use JTL\Session\Frontend;
use JTL\Shop;
use JTL\Shopsetting;
use JTL\DB\ReturnType;

require_once __DIR__ . '/includes/globalinclude.php';

if(!isset($_GET['k']) || $_GET['k'] != "asdfasde.klanwerlkj") {
	die('not allowed');
}

// Kopfzeile ausgeben
echo 'First Name,Last Name,Email,Accepts Email Marketing,Company,Address1,Address2,City,Province,Province Code,Country,Country Code,Zip,Phone,Accepts SMS Marketing,Total Spent,Total Orders,Tags,Note,Tax Exempt' . "\n";


$cryptoService = Shop::Container()->getCryptoService();

$data = Shop::Container()->getDB()->query('SELECT * FROM tkunde', ReturnType::ARRAY_OF_OBJECTS);

foreach($data as $d) {
		if($d->cKundenNr == 'Anonym') {
				continue;
		}
		
		echo escapeString($d->cVorname) . ',';
		echo escapeString(decryptString($d->cNachname)) . ',';
		echo escapeString($d->cMail) . ',';
		
		// Newlsetter
		if($d->cNewsletter == 'Y') {
				echo 'yes';
		} else {
				echo 'no';
		}
		
		echo ',';
		
		//Firma
		echo escapeString(decryptString($d->cFirma)) . ',';
		
		//Anschrift
		echo escapeString(decryptString($d->cStrasse));
		echo escapeString($d->cHausnummer) . ',';
		
		//Anschrift 2
		echo escapeString($d->cAdressZusatz) . ',';
		
		// Ort
		echo escapeString($d->cOrt) . ',';
		
		// Bundesland
		echo ',';
		
		// Bundesland Code
		echo ',';
		
		// Land
		switch($d->cLand) {
				case 'DE':
						echo 'Deutschland';
						break;
				case 'AT':
						echo 'Österreich';
						break;
				case 'CA':
						echo 'Kannada';
						break;
				case 'DK':
						echo 'Dänemark';
						break;
				case 'NL':
						echo 'Niederlande';
						break;
				case 'LU':
						echo 'Luxembourg';
						break;
				case 'CH':
						echo 'Schweiz';
						break;
				case 'GB':
						echo 'Großbritannien';
						break;
				case 'BE':
						echo 'Belgien';
						break;
				case 'IT':
						echo 'Italien';
						break;
				case 'HU':
						echo 'Ungarn';
						break;
				case 'AE':
						echo 'Vereinigte Arabische Emirate';
						break;
				case 'LT':
						echo 'Litauen';
						break;
				case 'GR':
						echo 'Griechenland';
						break;
				case 'JP':
						echo 'Japan';
						break;
				case 'US':
						echo 'USA';
						break;
				case 'PL':
						echo 'Polen';
						break;
				case 'FR':
						echo 'Frankreich';
						break;
				case 'SK':
						echo 'Slowakei';
						break;
				case 'ES':
						echo 'Spanien';
						break;
				case 'IE':
						echo 'Irland';
						break;
				case 'LI':
						echo 'Liechtenstein';
						break;
				case 'FI':
						echo 'Finnland';
						break;
				case 'SE':
						echo 'Schweden';
						break;
				case 'SI':
						echo 'Slowenien';
						break;
				case 'NO':
						echo 'Norwegen';
						break;
				case 'PT':
						echo 'Portugal';
						break;
				case 'SZ':
						echo 'Swasiland';
						break;
				case 'CZ':
						echo 'Chechien';
						break;
				case 'EG':
						echo 'Ägypten';
						break;
				case 'QA':
						echo 'Katar';
						break;
				case 'IL':
						echo 'Israel';
						break;
				case 'CY':
						echo 'Cypern';
						break;
						
				default:
						die('Unbekanntes Land: ' . $d->cLand);
		}
		
		echo ',';
		
		// Länder-Code
		echo escapeString($d->cLand) . ',';
		
		// PLZ
		echo escapeString($d->cPLZ) . ',';
		
		// Telefon
		echo escapeString($d->cTel) . ',';
		
		// SMS Marketing
		echo 'no,';
		
		// Total Spent, Total Orders, Tags, Note
		echo ',';
		echo ',';
		echo ',';
		echo ',';
		
		// Steuer-Befreiung
		// Land
		switch($d->cLand) {
				case 'DE':
						echo 'no';
						break;
				case 'AT':
						echo 'no';
						break;
				case 'CA':
						echo 'yes';
						break;
				case 'DK':
						echo 'no';
						break;
				case 'NL':
						echo 'no';
						break;
				case 'LU':
						echo 'no';
						break;
				case 'CH':
						echo 'yes';
						break;
				case 'GB':
						echo 'yes';
						break;
				case 'BE':
						echo 'no';
						break;
				case 'IT':
						echo 'no';
						break;
				case 'HU':
						echo 'no';
						break;
				case 'AE':
						echo 'yes';
						break;
				case 'LT':
						echo 'no';
						break;
				case 'GR':
						echo 'no';
						break;
				case 'JP':
						echo 'yes';
						break;
				case 'US':
						echo 'yes';
						break;
				case 'PL':
						echo 'no';
						break;
				case 'FR':
						echo 'no';
						break;
				case 'SK':
						echo 'no';
						break;
				case 'ES':
						echo 'no';
						break;
				case 'IE':
						echo 'no';
						break;
				case 'LI':
						echo 'no';
						break;
				case 'FI':
						echo 'no';
						break;
				case 'SE':
						echo 'no';
						break;
				case 'SI':
						echo 'no';
						break;
				case 'NO':
						echo 'no';
						break;
				case 'PT':
						echo 'no';
						break;
				case 'SZ':
						echo 'yes';
						break;
				case 'CZ':
						echo 'no';
						break;
				case 'EG':
						echo 'yes';
						break;
				case 'QA':
						echo 'yes';
						break;
				case 'IL':
						echo 'yes';
						break;
				case 'CY':
						echo 'no';
						break;
						
				default:
						die('Unbekanntes Land: ' . $d->cLand);
		}		
		echo "\n";
}

die;


function escapeString($input) {
		$input = str_replace(',', '', $input);
		return $input;
}

function decryptString($input) {
		global $cryptoService;
	
		return \trim($cryptoService->decryptXTEA($input));
}

?> 