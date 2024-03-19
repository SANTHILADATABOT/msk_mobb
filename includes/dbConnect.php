<?php	
error_reporting(0);

//include( "language_select.php" );

 
// $database_username = 'msksurve_mskcomsurveryusr';
$database_username = 'mskinternational_mskcomsurveryus';
$database_password = 'KjNGd]@DFGHBVCVAv1&';
// $pdo_conn = new PDO( 'mysql:host=localhost;dbname=msksurve_masjidh_sevai_kuzhu', $database_username, $database_password );
$pdo_conn = new PDO( 'mysql:host=localhost;dbname=mskinternational_masjidh_sevai_kuzhu', $database_username, $database_password );
 
if(($_SERVER['HTTP_HOST']=='https://mskinternational.in')||($_SERVER['HTTP_HOST']=='mskinternational.in'))
{ 
	$image_path = 'https://mskinternational.in/msk_mobb/img';
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$pdf_path='https://mskinternational.in/msk_mobb/pdf/';

}
else 
{
	$image_path = 'https://mskinternational.in/msk_mobb/img';
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$pdf_path='https://mskinternational.in/msk_mobb/pdf/';
}

?>
 