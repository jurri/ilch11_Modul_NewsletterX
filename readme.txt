NewsletterEx 1.1 ab IlchClan 1.1o:
"""""""""""""""""""""""""""""

Beschreibung:
-------------
NewsletterEx ist eine Erweiterung zum Newsletter um eine bessere �bersicht zu bieten an wen die Mails verschickt werden sollen. 
- Es ist m�glich zwischen PM und Email zu w�hlen.
- Es kann an Gruppen / Teams / Eineluser geschickt werden.
- User k�nnen im Profil den Newsletter deaktiveren
- dem Admin wird angezeigt wer alles ein aktiven Newsletter hat.
- Newsletter werden automatisch Archiviert



Entwickelt
----------
� FeTTsack
� auf Basis von IlchClan 1.1 p


Installation:
-------------
� Backup machen
� alle Dateien im Ordner upload, in ihrer Ordnerstrucktur hochladen
� installation.php ausf�hren 
	bsp: www.deineSeite.de/index.php?installation

� in der datei /include/includes/loader.php
	im bereich # load all needed func
	das hier einf�gen:
		require_once('include/includes/func/funkt.php');

� in der datei /include/contents/user/profil_edit.php
	in den oberen 50Zeilen nach diesem Befehl suche: $row = db_fetch_assoc($erg);
	eine Zeile drunter das einf�gen:
		$row['newsletter'] = @newsletter($uid, $_POST['sub_newsletter']);
		
� in der datei /include/templates/user/profil_edit.htm
	an gew�nschter stelle das hier einf�gen:
		{newsletter}


Bekannte Einschr�nkungen / Fehler:
----------------------------------
� noch keine bekannt.

Log
----------------------------------
� v1.0
- Verbesserte �bersicht
- Newsletter Archiv
- PM oder Mail verschicken
- An vereinzelte User schicken k�nnen

� v1.1
- User k�nnen Newsletter deaktivieren
- im Adminbereich sichtbar wer alles Newsletter bekommt.


Haftungsausschluss:
-------------------
Wir �bernehmen keine Haftung f�r Sch�den, die durch dieses Skript entstehen.
Benutzung ausschlie�lich AUF EIGENE GEFAHR.

Fehler bitte im Forum von http://www.graphics-for-all.de posten!