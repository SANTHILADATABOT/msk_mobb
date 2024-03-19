<?php 
error_reporting(0);
include( "dbConnect.php" );
?>


<style>
    .wrapper.homepage {
        padding-bottom: 0px;
    }
      .voln_img1 {
      background-color:#fffef9;
      border:1px solid #d8d8d8;
      box-shadow: 5px 5px 5px #efefef;
      border-radius:12px !important;
  }
  .icn-txt {
      font-size:15px !important;
      padding:2px 2px !important;
      font-weight:bold !important;
      height:26px;
  }

</style>

<div class="container h-100 animated bounceInLeft"
    style="background-image: url('img/login_bg1.jpg'); background-size: cover;">
    <div class="row">
    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
            <button type="button" class="btn btn-volu" onClick="head_login()">
                <img src="<?php echo $image_path;?>/13.png" style="width:75px;height:75px">
                    <span class="notranslate icn-txt">Head <br />Login</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="volunteer_login()">
                    <img src="<?php echo $image_path;?>/14.png" style="width:75px;height:75px">
                    <span class="notranslate icn-txt">Volunteer Login</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg">
                <button type="button" class="btn btn-volu" onClick="help()">
                     <img src="<?php echo $image_path;?>/10.png" style="width:75px;height:75px">
                    <span class="notranslate icn-txt pt-5">Help</span>
                </button>
            </div>
        </div>
    </div>
  </div> 
</div>


<script type="text/javascript">
    $(document).ready(function () {
        //googleTranslateElementInit();
    });
    function googleTranslateElementInit() {
        //alert("function calling");
        new google.translate.TranslateElement({ pageLanguage: 'ta' }, 'google_translate_element');
        // page_replace('login.php','','')

    }
    function head_login() {
        $("#previous_id").val('login.php');
        $('#page_replace_div').load(FILE_PATH + '/login.php');
    }

    function volunteer_login() {
        $("#previous_id").val('volunteer_login.php');
        $('#page_replace_div').load(FILE_PATH + '/volunteer_login.php');
    }

    function help() {
        $("#previous_id").val('help_dashboard.php');
        $('#page_replace_div').load(FILE_PATH + '/help_dashboard.php');
    }
</script>