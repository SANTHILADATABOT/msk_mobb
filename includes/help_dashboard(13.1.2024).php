<?php 
error_reporting(0);
include("dbConnect.php")
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
      .icn-txt1 {
      font-size:15px !important;
      padding:2px 2px !important;
      font-weight:bold !important;
      height:50px;
  }
</style>

<div class="container h-100 animated bounceInLeft"
    style="background-image: url('img/login_bg1.jpg'); background-size: cover;">

   <div class="row">
    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="help_form('Education')">
                    <img src="<?php echo $image_path;?>/9.png" style="width:60px;height:60px;">
                    <span class="notranslate icn-txt1">Education Donors</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="help_form('Job')">
                    <img src="<?php echo $image_path;?>/6.png" style="width:73px;height:60px">
                    <span class="notranslate icn-txt1">Job</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="help_form('Medical')">
                    <img src="<?php echo $image_path;?>/1.png" style="width:60px;height:60px">
                    <span class="notranslate icn-txt1">Medical</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="help_form('Shelter')">
                    <img src="<?php echo $image_path;?>/7.png" style="width:60px;height:60px">
                    <span class="notranslate icn-txt1">Shelter</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="help_form('Widow')">
                    <img src="<?php echo $image_path;?>/8.png" style="width:60px;height:60px">
                    <span class="notranslate icn-txt1">Widow</span>
                </button>
            </div>
        </div>
    </div>
    
        <div class="col-6 mt-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img1  btn btn-light btn-square-md rounded-lg"> 
                <button type="button" class="btn btn-volu" onClick="help_form('Blood')">
                    <img src="<?php echo $image_path;?>/8.png" style="width:60px;height:60px">
                    <span class="notranslate icn-txt1">Blood Donors</span>
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

    function help_form(type) {
        $("#previous_id").val('help_dashboard.php');
        $('#page_replace_div').load(FILE_PATH + '/help_form.php?type='+type);
    }
</script>