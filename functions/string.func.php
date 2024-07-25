<?
/* *******************************************************************************************************
MODUL NAME 			: 
FILE NAME 			: string.func.php
AUTHOR				: 
VERSION				: 1.0
MODIFICATION DOC	:
DESCRIPTION			: Functions to handle string operation
***************************************************************************************************** */

include_once("functions/default.func.php");

/* fungsi untuk mengatur tampilan mata uang
 * $value = string
 * $digit = pengelompokan setiap berapa digit, default : 3
 * $symbol = menampilkan simbol mata uang (Rupiah), default : false
 * $minusToBracket = beri tanda kurung pada nilai negatif, default : true
 */
function hitung_umur($tanggal_lahir){
	if(!empty($tanggal_lahir)){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." tahun ".$m." bulan ".$d." hari";
	}
}
function hitung_umur_tahun($tanggal_lahir){

	if(!empty($tanggal_lahir)){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0");
	}

	$y = $today->diff($birthDate)->y;
	
	return $y;
	}
}
function pre_regregName($name){
	preg_match('#\[(.*?)\]#', $name,$match);
	return $match[1];
}

function normal_angka($val){
	$vals = str_replace('.', '', $val);
	return $vals;

}

function retNull($text){
	$textt =$text;
	if(empty($text)){
		$textt ='NULL';
	}
	return $textt;
}

function comboTimeOfTest($val){
	$data = array("","Daily","Weekly","Monthly","6 Monthly","Yearly","2,5 Yearly","5 Yearly");
	return $data[$val];

}



function currencyToPage($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{

    if($value == "")
		$value = 0;
	$rupiah = number_format($value,0, ",",".");
    $rupiah = $rupiah . ",00";
    return $rupiah;
}
function currencyToPage2($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{
	$arrValue = explode('.', $value);

    if($arrValue[0] == "")
		$value = 0;
	$rupiah = number_format($value,strlen($arrValue[1]), ",",".");
    $rupiah = $rupiah ;
    return $rupiah;
}
function currencyToPage3($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{

    if($value == "")
		$value = 0;
	$rupiah = number_format($value,2, ",",".");
    $rupiah = $rupiah ;
    return $rupiah;
}
function makedirs($dirpath, $mode=0777)
{
    return is_dir($dirpath) || mkdir($dirpath, $mode, true);
}

function nomorDigit($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{
	$arrValue = explode(".", $value);
	$value = $arrValue[0];
	if(count($arrValue) == 1)
		$belakang_koma = "";
	else
		$belakang_koma = $arrValue[1];
	if($value < 0)
	{
		$neg = "-";
		$value = str_replace("-", "", $value);
	}
	else
		$neg = false;
		
	$cntValue = strlen($value);
	//$cntValue = strlen($value);
	
	if($cntValue <= $digit)
		$resValue =  $value;
	
	$loopValue = floor($cntValue / $digit);
	
	for($i=1; $i<=$loopValue; $i++)
	{
		$sub = 0 - $i; //ubah jadi negatif
		$tempValue = $endValue;
		$endValue = substr($value, $sub*$digit, $digit);
		$endValue = $endValue;
		
		if($i !== 1)
			$endValue .= ".";
		
		$endValue .= $tempValue;
	}
	
	$beginValue = substr($value, 0, $cntValue - ($loopValue * $digit));
	
	if($cntValue % $digit == 0)
		$resValue = $beginValue.$endValue;
	else if($cntValue > $digit)
		$resValue = $beginValue.".".$endValue;
	
	//additional
	if($belakang_koma == "")
		$resValue = $symbol." ".$resValue;
	else
		$resValue = $symbol." ".$resValue.",".$belakang_koma;
	
	
	if($minusToBracket && $neg)
	{
		$resValue = "(".$resValue.")";
		$neg = "";
	}
	
	if($minusLess == true)
	{
		$neg = "";
	}
	
	$resValue = $neg.$resValue;
	
	//$resValue = "<span style='white-space:nowrap'>".$resValue."</span>";

	return $resValue;
}


function numberToIna($value, $symbol=true, $minusToBracket=true, $minusLess=false, $digit=3)
{
	$arr_value = explode(".", $value);
	
	if(count($arr_value) > 1)
		$value = $arr_value[0];
	
	if($value < 0)
	{
		$neg = "-";
		$value = str_replace("-", "", $value);
	}
	else
		$neg = false;
		
	$cntValue = strlen($value);
	//$cntValue = strlen($value);
	
	if($cntValue <= $digit)
		$resValue =  $value;
	
	$loopValue = floor($cntValue / $digit);
	
	for($i=1; $i<=$loopValue; $i++)
	{
		$sub = 0 - $i; //ubah jadi negatif
		$tempValue = $endValue;
		$endValue = substr($value, $sub*$digit, $digit);
		$endValue = $endValue;
		
		if($i !== 1)
			$endValue .= ".";
		
		$endValue .= $tempValue;
	}
	
	$beginValue = substr($value, 0, $cntValue - ($loopValue * $digit));
	
	if($cntValue % $digit == 0)
		$resValue = $beginValue.$endValue;
	else if($cntValue > $digit)
		$resValue = $beginValue.".".$endValue;
	
	//additional
	if($symbol == true && $resValue !== "")
	{
		$resValue = $resValue;
	}
	
	if($minusToBracket && $neg)
	{
		$resValue = "(".$resValue.")";
		$neg = "";
	}
	
	if($minusLess == true)
	{
		$neg = "";
	}

	if(count($arr_value) == 1)
		$resValue = $neg.$resValue;
	else
		$resValue = $neg.$resValue.",".$arr_value[1];
	
	if(substr($resValue, 0, 1) == ',')
		$resValue = '0'.$resValue;	//$resValue = "<span style='white-space:nowrap'>".$resValue."</span>";

	return $resValue;
}

function getNameValueYaTidak($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Tidak", "1"=>"Ya");
	return $arrValue[$number];
}

function getNameValueKategori($number) {
	$number = (int)$number;
	$arrValue = array("1"=>"Sangat Baik", "2"=>"Baik", "3"=>"Cukup", "4"=>"Kurang");
	return $arrValue[$number];
}	

function getNameValue($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Tidak", "1"=>"Ya");
	return $arrValue[$number];
}	

function getNameValueAktif($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Tidak Aktif", "1"=>"Aktif");
	return $arrValue[$number];
}

function getNameValidasi($number) {
	$number = (int)$number;
	$arrValue = array("0"=>"Menunggu Konfirmasi","1"=>"Disetujui", "2"=>"Ditolak");
	return $arrValue[$number];
}	

function getNameInputOutput($char) {
	$arrValue = array("I"=>"Datang", "O"=>"Pulang");
	return $arrValue[$char];
}		
	
function dotToComma($varId)
{
	$newId = str_replace(".", ",", $varId);	
	return $newId;
}

function CommaToQuery($varId)
{
	$newId = str_replace(",", "','", $varId);	
	return $newId;
}


function CommaToDot($varId)
{
	$newId = str_replace(",", ".", $varId);	
	return $newId;
}

function dotToNo($varId)
{
	$newId = str_replace(".", "", $varId);	
	$newId = str_replace(",", ".", $newId);	
	if(empty($newId)){
		$newId=0;
	}
	return $newId;
}
function CommaToNo($varId)
{
	$newId = str_replace(",", "", $varId);	
	return $newId;
}

function CrashToNo($varId)
{
	$newId = str_replace("#", "", $varId);	
	return $newId;
}

function StarToNo($varId)
{
	$newId = str_replace("* ", "", $varId);	
	return $newId;
}

function NullDotToNo($varId)
{
	$newId = str_replace(".00", "", $varId);
	return $newId;
}

function ExcelToNo($varId)
{
	$newId = NullDotToNo($varId);
	$newId = StarToNo($newId);
	return $newId;
}

function ValToNo($varId)
{
	$newId = NullDotToNo($varId);
	$newId = CommaToNo($newId);
	$newId = StarToNo($newId);
	return $newId;
}

function ValToNull($varId)
{
	if($varId == '')
		return 0;
	else
		return $varId;
}

function ValToNullMenit($varId)
{
	if($varId == '')
		return 00;
	else
		return $varId;
}


function ValToNullDB($varId)
{
	if($varId == '')
		return 'NULL';
	elseif($varId == 'null')
		return 'NULL';
	else
		return "'".$varId."'";
}

function setQuote($var, $status='')
{	
	if($status == 1)
		$tmp= str_replace("\'", "''", $var);
	else
		$tmp= str_replace("'", "''", $var);
	return $tmp;
}

// fungsi untuk generate nol untuk melengkapi digit

function generateZero($varId, $digitGroup, $digitCompletor = "0")
{
	$newId = "";
	
	$lengthZero = $digitGroup - strlen($varId);
	
	for($i = 0; $i < $lengthZero; $i++)
	{
		$newId .= $digitCompletor;
	}
	
	$newId = $newId.$varId;
	
	return $newId;
}

// truncate text into desired word counts.
// to support dropDirtyHtml function, include default.func.php
function truncate($text, $limit, $dropDirtyHtml=true)
{
	$tmp_truncate = array();
	$text = str_replace("&nbsp;", " ", $text);
	$tmp = explode(" ", $text);
	
	for($i = 0; $i <= $limit; $i++)		//truncate how many words?
	{
		$tmp_truncate[$i] = $tmp[$i];
	}
	
	$truncated = implode(" ", $tmp_truncate);
	
	if ($dropDirtyHtml == true)
	{
		return dropAllHtml($truncated);
	}
	else
		return $truncated;
}

function arrayMultiCount($array, $field_name, $search)
{
	$summary = 0;
	for($i = 0; $i < count($array); $i++)
	{
		if($array[$i][$field_name] == $search)
			$summary += 1;
	}
	return $summary;
}

function getValueArray($var)
{
	//$tmp = "";
	for($i=0;$i<count($var);$i++)
	{			
		if($i == 0)
			$tmp .= $var[$i];
		else
			$tmp .= ",".$var[$i];
	}
	
	return $tmp;
}

function getValueArrayMonth($var)
{
	//$tmp = "";
	for($i=0;$i<count($var);$i++)
	{			
		if($i == 0)
			$tmp .= "'".$var[$i]."'";
		else
			$tmp .= ", '".$var[$i]."'";
	}
	
	return $tmp;
}

function getColoms($var)
{
	$tmp = "";
	if($var == 0)	$tmp = 'D';
	elseif($var == 1)	$tmp = 'E';
	elseif($var == 2)	$tmp = 'F';
	elseif($var == 3)	$tmp = 'G';
	elseif($var == 4)	$tmp = 'H';
	elseif($var == 5)	$tmp = 'I';
	elseif($var == 6)	$tmp = 'J';
	elseif($var == 7)	$tmp = 'K';
	
	return $tmp;
}

function setNULL($var)
{	
	if($var == '')
		$tmp = 'NULL';
	else
		$tmp = $var;
	
	return $tmp;
}

function setNULLModif($var)
{	
	if($var == '')
		$tmp = 'NULL';
	else
		$tmp = "'".$var."'";
	
	return $tmp;
}

function setVal_0($var)
{	
	if($var == '')
		$tmp = '0';
	else
		$tmp = $var;
	
	return $tmp;
}

function get_null_10($varId)
{
	if($varId == '') return '';
	if($varId < 10)	$temp= '0'.$varId;
	else			$temp= $varId;
			
	return $temp;
}

function _ip( )
{
	if (preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", getenv('HTTP_X_FORWARDED_FOR')))
    {
        return getenv('HTTP_X_FORWARDED_FOR');
    }
    return getenv('REMOTE_ADDR');
	
	//return ( preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'] );
}

function getFotoProfile($id)
{
	$filename = "uploads/foto/profile-".$id.".jpg";
	if (file_exists($filename)) {
	} else {
		$filename = "images/foto-profile.png";
	}	
	return $filename;
}

/*function getFotoProfile($id)
{
	$filename = "uploads/foto/profile-".$id.".jpg";
	if (file_exists($filename)) {
	} else {
		$filename = "images/foto-profile.jpg";
	}	
	return $filename;
}*/
function toNumber($varId)
{	
	return (float)$varId;
}

function searchWordDelimeter($varSource, $varSearch, $varDelimeter=",")
{

	$arrSource = explode($varDelimeter, $varSource);
	
	for($i=0; $i<count($arrSource);$i++)
	{
		if(trim($arrSource[$i]) == $varSearch)
			return true;
	}
	
	return false;
}

function getZodiac($day,$month){
	if(($month==1 && $day>20)||($month==2 && $day<20)){
	$mysign = "Aquarius";
	}
	if(($month==2 && $day>18 )||($month==3 && $day<21)){
	$mysign = "Pisces";
	}
	if(($month==3 && $day>20)||($month==4 && $day<21)){
	$mysign = "Aries";
	}
	if(($month==4 && $day>20)||($month==5 && $day<22)){
	$mysign = "Taurus";
	}
	if(($month==5 && $day>21)||($month==6 && $day<22)){
	$mysign = "Gemini";
	}
	if(($month==6 && $day>21)||($month==7 && $day<24)){
	$mysign = "Cancer";
	}
	if(($month==7 && $day>23)||($month==8 && $day<24)){
	$mysign = "Leo";
	}
	if(($month==8 && $day>23)||($month==9 && $day<24)){
	$mysign = "Virgo";
	}
	if(($month==9 && $day>23)||($month==10 && $day<24)){
	$mysign = "Libra";
	}
	if(($month==10 && $day>23)||($month==11 && $day<23)){
	$mysign = "Scorpio";
	}
	if(($month==11 && $day>22)||($month==12 && $day<23)){
	$mysign = "Sagitarius";
	}
	if(($month==12 && $day>22)||($month==1 && $day<21)){
	$mysign = "Capricorn";
	}
	return $mysign;
}

function getValueANDOperator($var)
{
	$tmp = ' AND ';
	
	return $tmp;
}

function getValueKoma($var)
{
	if($var == '')
		$tmp = '';
	else
		$tmp = ',';	
	
	return $tmp;
}

function import_format($val)
{
	if($val == ":02")
	{
		$temp= str_replace(":02","24:00",$val);
	}
	else
	{	
		$temp="";
		if($val == "[hh]:mm" || $val == "[h]:mm"){}
		else
			$temp= $val;
	}
	return $temp;
	//return $val;
}

function kekata($x) 
{
	$x = abs($x);
	$angka = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";
	if ($x <12) 
	{
		$temp = " ". $angka[$x];
	} 
	else if ($x <20) 
	{
		$temp = kekata($x - 10). " Belas";
	} 
	else if ($x <100) 
	{
		$temp = kekata($x/10)." Puluh". kekata($x % 10);
	} 
	else if ($x <200) 
	{
		$temp = " Seratus" . kekata($x - 100);
	} 
	else if ($x <1000) 
	{
		$temp = kekata($x/100) . " Ratus" . kekata($x % 100);
	} 
	else if ($x <2000) 
	{
		$temp = " Seribu" . kekata($x - 1000);
	} 
	else if ($x <1000000) 
	{
		$temp = kekata($x/1000) . " Ribu" . kekata($x % 1000);
	} 
	else if ($x <1000000000) 
	{
		$temp = kekata($x/1000000) . " Juta" . kekata($x % 1000000);
	} 
	else if ($x <1000000000000) 
	{
		$temp = kekata($x/1000000000) . " Milyar" . kekata(fmod($x,1000000000));
	} 
	else if ($x <1000000000000000) 
	{
		$temp = kekata($x/1000000000000) . " Trilyun" . kekata(fmod($x,1000000000000));
	}      
	
	return $temp;
}
function kekata_eng($x) 
{
	$x = abs($x);
	$angka = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven");
	$temp = "";
	if ($x <12) 
	{
		$temp = " ". $angka[$x];
	} 
	else if ($x <20) 
	{
		$temp = kekata_eng($x - 10). " Teens";
	} 
	else if ($x <100) 
	{
		$temp = kekata_eng($x/10)." Twenty". kekata_eng($x % 10);
	} 
	else if ($x <200) 
	{
		$temp = " Hundred" . kekata_eng($x - 100);
	} 
	else if ($x <1000) 
	{
		$temp = kekata_eng($x/100) . " Hundred" . kekata_eng($x % 100);
	} 
	else if ($x <2000) 
	{
		$temp = " Thousand" . kekata_eng($x - 1000);
	} 
	else if ($x <1000000) 
	{
		$temp = kekata_eng($x/1000) . " Thousand" . kekata_eng($x % 1000);
	} 
	else if ($x <1000000000) 
	{
		$temp = kekata_eng($x/1000000) . " Million" . kekata_eng($x % 1000000);
	} 
	else if ($x <1000000000000) 
	{
		$temp = kekata_eng($x/1000000000) . " Billion" . kekata_eng(fmod($x,1000000000));
	} 
	else if ($x <1000000000000000) 
	{
		$temp = kekata_eng($x/1000000000000) . " Trillion" . kekata_eng(fmod($x,1000000000000));
	}      
	
	return $temp;
}

function terbilang($x, $style=4) 
{
	if($x < 0) 
	{
		$hasil = "minus ". trim(kekata($x));
	} 
	else 
	{
		$hasil = trim(kekata($x));
	}      
	switch ($style) 
	{
		case 1:
			$hasil = strtoupper($hasil);
			break;
		case 2:
			$hasil = strtolower($hasil);
			break;
		case 3:
			$hasil = ucwords($hasil);
			break;
		default:
			$hasil = ucfirst($hasil);
			break;
	}      
	return $hasil;
}

function romanic_number($integer, $upcase = true)
{
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1);
    $return = '';
    while($integer > 0)
    {
        foreach($table as $rom=>$arb)
        {
            if($integer >= $arb)
            {
                $integer -= $arb;
                $return .= $rom;
                break;
            }
        }
    }

    return $return;
}

function getExe($tipe)
{
	switch ($tipe) {
	  case "application/pdf": $ctype="pdf"; break;
	  case "application/octet-stream": $ctype="exe"; break;
	  case "application/zip": $ctype="zip"; break;
	  case "application/msword": $ctype="doc"; break;
	  case "application/vnd.ms-excel": $ctype="xls"; break;
	  case "application/vnd.ms-powerpoint": $ctype="ppt"; break;
	  case "image/gif": $ctype="gif"; break;
	  case "image/png": $ctype="png"; break;
	  case "image/jpeg": $ctype="jpeg"; break;
	  case "image/jpg": $ctype="jpg"; break;
	  case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": $ctype="xlsx"; break;
	  case "application/vnd.openxmlformats-officedocument.wordprocessingml.document": $ctype="docx"; break;
	  default: $ctype="application/force-download";
	} 
	
	return $ctype;
} 
function getExtension($varSource)
{
	$temp = explode(".", $varSource);
	return end($temp);
}


function getExtension2($varSource)
{
	$temp = explode(".", $varSource);
	return end($temp);
}


function coalesce($varSource, $varReplace)
{
	if($varSource == "")
		return $varReplace;
		
	return $varSource;
}

function unserialized($serialized)
{
	$arrSerialized = str_replace('@', '"', $serialized);			
	return unserialize($arrSerialized);
}



function translate($id, $en)
{
	if($_SESSION["lang"] == "en")
		return coalesce($en, $id);	
	else
		return $id;
}

function getBahasa()
{
	if($_SESSION["lang"] == "en")
		return "en";	
	else
		return "";
}

function getTerbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return getTerbilang($x - 10) . " belas";
  elseif ($x < 100)
    return getTerbilang($x / 10) . " puluh" . getTerbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . getTerbilang($x - 100);
  elseif ($x < 1000)
    return getTerbilang($x / 100) . " ratus" . getTerbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . getTerbilang($x - 1000);
  elseif ($x < 1000000)
    return getTerbilang($x / 1000) . " ribu" . getTerbilang($x % 1000);
  elseif ($x < 1000000000)
    return getTerbilang($x / 1000000) . " juta" . getTerbilang($x % 1000000);
}


function renameFile($varSource)
{
	$varSource = str_replace(" ", "_",$varSource);
	$varSource = str_replace("'", "", $varSource);
	return $varSource;
}

function getColumnExcel($var)
{
	$var = strtoupper($var);
	if($var == "")
		return 0;
		
	if($var == "A")	$tmp = 1;
	elseif($var == "B")	$tmp = 2;
	elseif($var == "C")	$tmp = 3;
	elseif($var == "D")	$tmp = 4;
	elseif($var == "E")	$tmp = 5;
	elseif($var == "F")	$tmp = 6;
	elseif($var == "G")	$tmp = 7;
	elseif($var == "H")	$tmp = 8;
	elseif($var == "I")	$tmp = 9;
	elseif($var == "J")	$tmp = 10;
	elseif($var == "K")	$tmp = 11;
	elseif($var == "L")	$tmp = 12;
	elseif($var == "M")	$tmp = 13;
	elseif($var == "N")	$tmp = 14;
	elseif($var == "0")	$tmp = 15;
	elseif($var == "P")	$tmp = 16;
	elseif($var == "Q")	$tmp = 17;
	elseif($var == "R")	$tmp = 18;
	elseif($var == "S")	$tmp = 19;
	elseif($var == "T")	$tmp = 20;
	
	return $tmp;
}

function terbilang_en($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'terbilang_en only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . terbilang_en(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . terbilang_en($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = terbilang_en($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= terbilang_en($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}

function decimalNumber($num2)
{
	if(strpos($num2, '.'))
		return number_format($num2, 2, '.', '');	
	
	return $num2;
}

?>