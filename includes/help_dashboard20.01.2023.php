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
                <button type="button" class="btn btn-volu" onClick="help_form()">
                    <span class="notranslate">Education</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/sur.png">
                <button type="button" class="btn btn-volu" onClick="help_form()">
                    <span class="notranslate">Job</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/sur.png">
                <button type="button" class="btn btn-volu" onClick="help_form()">
                    <span class="notranslate">Medical</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/sur.png">
                <button type="button" class="btn btn-volu" onClick="help_form()">
                    <span class="notranslate">Shelter</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="align-self-center mx-auto">
            <div class="voln_img"> <img src="img/sur.png">
                <button type="button" class="btn btn-volu" onClick="help_form()">
                    <span class="notranslate">Widow</span>
                </button>
            </div>
        </div>
    </div>
    
</div>


<script type="text/javascript">
    $(document).ready(function () {
        //googleTranslateElementInit();
    });

    function help_form() {
        $("#previous_id").val('help_form.php');
        $('#page_replace_div').load(FILE_PATH + '/help_form.php');
    }
</script>