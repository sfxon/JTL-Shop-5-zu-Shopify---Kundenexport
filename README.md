# JTL-Shop-5-zu-Shopify---Kundenexport
Einfaches Script zum Exportieren aller Kundendaten aus JTL Shop 5 in eine für Shopify kompatible CSV-Datei.

## Installation und Anwendung
1. Datei installieren
Die Datei im src Ordner in den Root-Ordner des Online-Shops kopieren. (Ggf. über FTP, SFTP oder SSH).

2. Online-Shop aufrufen:
https://mein-shop.tld/kundenexport.php?k=asdfasde.klanwerlkj

3. Im Browser den Quelltext anzeigen lassen.

4. Daten in eine Text-Datei kopieren.

5. Textdatei in Shopify hochladen.

6. Datei wieder entfernen!

## Wichtige Hinweise
* **Datei entfernen!**<br />
Die Anwendung verwendet ein im Script hinterlegtes Passwort. Bitte das Script unbedingt nach Fertigstellung wieder entfernen, weil sonst eine Sicherheitslücke im Shop entstehen könnte, insbesondere wenn das Passwort nicht geändert wird.

* **Keine Bestellinformationen**<br />
Es wird keine Information über die Anzahl und Gesamtsumme aller Bestellungen mit exportiert.

* **Unbekannte Länder**<br />
Die Landesnamen sind aktuell fix im Script hinterlegt. Falls diese nicht genügen, muss das Script erweitert werden.

* **Tax Exempt - Steuerbefreiung**<br />
Auch diese Information ist aktuell fix im Script hinterlegt.

* **Shopify Accounts**<br />
Dieser Export kann vor allem verwendet werden, um Kunden für E-Mail Listings in Shopify zu importieren. Echte Kunden-Accounts werden damit nicht angelegt. Es gibt keine Möglichkeit, das Kunden-Passwort zu übernehmen, da dieses aus Sicherheitsgründen gehasht ist, und damit für uns nicht ermittelbar. Es gibt allerdings in Shopify im Standard auch keine Möglichkeit, Kunden mit Passwort zu importieren.