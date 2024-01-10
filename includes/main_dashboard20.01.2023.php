<?php 
error_reporting(0);
?>


<style>
    .wrapper.homepage {
        padding-bottom: 0px;
    }
</style>

<div class="container h-100 animated bounceInLeft"
    style="background-image: url('img/login_bg1.jpg'); background-size: cover;">

    <div class="pt-5">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/vo.png">
                <button type="button" class="btn btn-volu" onClick="head_login()">
                    <span class="notranslate">Head Login</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/sur.png">
                <button type="button" class="btn btn-volu" onClick="volunteer_login()">
                    <span class="notranslate">Volunteer Login</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-5">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/sur.png">
                <button type="button" class="btn btn-volu" onClick="help()">
                    <span class="notranslate">Help</span>
                </button>
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