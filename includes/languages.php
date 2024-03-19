<?php 
error_reporting(0);
?>

 
<p class="notranslate">
 
 <center>
<div id="google_translate_element">
	<a href="javascript:void(0)"></a>
</div>
</center>
<!-- <?php //include('language_select.php'); ?> -->


<center><button onclick="login()"><span class="notranslate"> Goto Login</span> </button></center>
</p>
 
 
<script type="text/javascript">
 $("#homeclass").remove();
$(document).ready(function()
{
//googleTranslateElementInit();
});
function googleTranslateElementInit( ) {
	//alert("function calling");
  new google.translate.TranslateElement({pageLanguage: 'ta'}, 'google_translate_element');
  // page_replace('login.php','','')
 
}
function login()
{
	 /*var language = $(".goog-te-combo").val();
     alert(language);
	 $.ajax({
	      url:FILE_PATH+'/language_select.php?language='+language,
	      type:'GET',
	   
	      timeout:60000,
	          success:function(data)
	            {   
	           
	         //   window.google.translate.TranslateService.getInstance().restore()
	          //  restore();*/
	            $("#previous_id").val('login.php');							
	            $('#page_replace_div').load(FILE_PATH+'/login.php');
	           /* }
	});*/
 
	
}
</script> 