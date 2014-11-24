<?php
#   Copyright by: FeTTsack
#   Support: www.fettsack.de.vc


##letzter besuchter User
/*
function last_user($uid){
 $lb = mysql_fetch_object(mysql_query("SELECT last_bes, last_user_time FROM prefix_user WHERE id = ".$uid));
 $lba = explode('#',$lb->last_bes);
 $lbt = explode('#',$lb->last_user_time);
 $name = '';
 
foreach ($lba as $k => $v) {
     if ($v < 1) { continue; }
  $besname = @mysql_result($sql = mysql_query("SELECT name FROM prefix_user WHERE id = ".$v),0,0);
  $besstaat = @mysql_result($sql,0,1); 
  $time = date("d.m.Y \u\m H:i",$lbt[$k]);
  $name .= "<div><a href=\"index.php?user-details-$v\" target=\"_self\" title=\"besucht am $time Uhr\">$besname</a></div>";
 }
 return($name);
} 
*/

## alter vom Geburtsdatum rausfinden
function getage($gebdtm){
	if($gebdtm !== "0000-00-00"){
		$gebdatum = date('d.m.Y',strtotime($gebdtm));
	    $tag   = date('d',strtotime($gebdtm));
	    $monat = date('m',strtotime($gebdtm));
	    $jahr  = date('Y',strtotime($gebdtm));
		$jetzt = mktime(0,0,0,date("m"),date("d"),date("Y"));
	    $geburtstag = mktime(0,0,0,$monat,$tag,$jahr);
	    $alter   = intval(($jetzt - $geburtstag) / (3600 * 24 * 365));
	} else {
		$gebdatum = "Kein Datum angegeben";
		$alter = "n/a";
	}
	return($alter);
}
 
 ##spezialrangausgeben
function spezrang ($uid) {
    if ( empty($uid) ) {
      $rRang = 'Gast';
    } else {
      $rRang = @db_result(db_query("SELECT bez FROM prefix_user LEFT JOIN prefix_ranks ON prefix_ranks.id = prefix_user.spezrank WHERE prefix_user.id = ".$uid),0);
    }

  return ($rRang);
}

##geschlecht mit bild darstellen
function getgender ($name,$genderdb) {
	if($genderdb==1){
	$gender='<img src="include/images/forum/male-symbol.png" width="28px" height="28px" alt="m&auml;nnlich" border="0">&nbsp;'.$name;
	} elseif($genderdb==2){
	$gender='<img src="include/images/forum/female-symbol.png" width="28px" height="28px" alt="weiblich" border="0">&nbsp;'.$name;
	} else {
	$gender='<img src="include/images/forum/Unentschlossen.png" width="16px" height="16px" alt="Unentschlossen" border="0">&nbsp;'.$name;
	}
return ($gender);
}

## Newsletterbutton für Profiledit
function newsletter($uid, $post){
	$erg = db_query("SELECT u.email FROM prefix_user u, prefix_newsletter n WHERE n.email = u.email AND u.id = $uid");
	if(db_num_rows($erg) == 1){
		if($post == 'Newsletter ist aktiv'){
			$nl = db_fetch_assoc($erg);
			db_query("DELETE FROM prefix_newsletter WHERE email = '".$nl['email']."'");
			return '<input type="submit" value="Newsletter ist deaktiviert" name="sub_newsletter"/>';
		}else{
			return '<input type="submit" value="Newsletter ist aktiv" name="sub_newsletter"/>';
		}
	}else{
		if($post == 'Newsletter ist deaktiviert'){
			$erg = db_query("SELECT u.email FROM prefix_user u WHERE u.id = $uid");
			$nl = db_fetch_assoc($erg);
			db_query("INSERT INTO prefix_newsletter (email) VALUES ('".$nl['email']."')");
			return '<input type="submit" value="Newsletter ist aktiv" name="sub_newsletter"/>';
		}else{
			return '<input type="submit" value="Newsletter ist deaktiviert" name="sub_newsletter"/>';
		}
	}
}

?>