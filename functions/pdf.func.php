<?php


function pdfEncrypt ($origFile, $password, $destFile){
	//include the FPDI protection http://www.setasign.de/products/pdf-php-solutions/fpdi-protection-128/
	require_once('libraries/fpdi2/FPDI_Protection.php');
	
	$pdf = new FPDI_Protection();
	// set the format of the destinaton file, in our case 6×9 inch
	
	//calculate the number of pages from the original document
	$pagecount = $pdf->setSourceFile($origFile);
	
	// copy all pages from the old unprotected pdf in the new one
	for ($loop = 1; $loop <= $pagecount; $loop++) {
		$tplidx = $pdf->importPage($loop);
		$pdf->addPage();
		$pdf->useTemplate($tplidx);
	}
	
	// protect the new pdf file, and allow no printing, copy etc and leave only reading allowed
	//$pdf->SetProtection(array(),$password);
	$pdf->SetProtection(\FPDI_Protection::FULL_PERMISSIONS, $password);
	$pdf->Output($destFile, 'F');
	
	return $destFile;
}

function pdfEncryptBak ($origFile, $password, $destFile){
	//include the FPDI protection http://www.setasign.de/products/pdf-php-solutions/fpdi-protection-128/
	require_once('WEB-INF/libraries/fpdi/FPDI_Protection.php');
	
	$pdf =& new FPDI_Protection();
	// set the format of the destinaton file, in our case 6×9 inch
	
	//calculate the number of pages from the original document
	$pagecount = $pdf->setSourceFile($origFile);
	
	// copy all pages from the old unprotected pdf in the new one
	for ($loop = 1; $loop <= $pagecount; $loop++) {
		$tplidx = $pdf->importPage($loop);
		$pdf->addPage();
		$pdf->useTemplate($tplidx);
	}
	
	// protect the new pdf file, and allow no printing, copy etc and leave only reading allowed
	$pdf->SetProtection(array(),$password);
	$pdf->Output($destFile, 'F');
	
	return $destFile;
}
?>