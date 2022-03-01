<?php
  
  //if (!defined("_VALID_PHP"))
      //die('Direct access to this location is not allowed.');
?>			
			
			<footer class="footer text-center">
				&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
			</footer>

            <!-- End footer -->
        </main>
    <!-- </div> -->

    <!-- End Wrapper -->
    

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- Bootstrap tether Core JavaScript -->
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});


    function UpdateMyProfile(e){
       
    }
	</script>


    
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-bootstrap.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.magnific-popup.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-metisMenu.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-perfect-scrollbar.jquery.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-sweetalert2.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.counterup.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.waypoints.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-Chart.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-Chart.bundle.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/vendors/charts/utils.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.knob.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.sparkline.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/vendors/charts/excanvas.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-mithril.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/vendors/theme-widgets/widgets.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-moment.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-underscore-min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-clndr.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-morris.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-raphael.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-daterangepicker.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-slick.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/addon/pupototuapekcehc.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.viewportchecker.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/master-generals.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-material-design.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.toast.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-theme.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-custom.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.maskedinput.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-bootstrap-select.min.js"></script>

<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-datepicker.min.js"></script>


 <script data-cfasync="false" type="text/javascript" src="../assetso/js/master2-jquery.js"></script> 
 <script data-cfasync="false" type="text/javascript" src="../assetso/js/master2-plugins.js"></script>
<!-- <script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.tablesorter.min.js"></script> 

<script data-cfasync="false" type="text/javascript" src="../assetso/js/select.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>  -->

<script type="text/javascript">
    var tpj=jQuery;
    tpj.noConflict();

    tpj(document).ready(function() {

      var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
      {
        sliderType:"standard",
        jsFileLocation:"include/rs-plugin/js/",
        sliderLayout:"fullwidth",
        dottedOverlay:"none",
        delay:9000,
        navigation: {},
        responsiveLevels:[1200,992,768,480,320],
        gridwidth:1140,
        gridheight:500,
        lazyType:"none",
        shadow:0,
        spinner:"off",
        autoHeight:"off",
        disableProgressBar:"on",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
          simplifyAll:"off",
          disableFocusListener:true,
        },
        navigation: {
          keyboardNavigation:"off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation:"off",
          onHoverStop:"off",
          touch:{
            touchenabled:"on",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
          },
          arrows: {
            style: "ares",
            enable: true,
            hide_onmobile: false,
            hide_onleave: false,
            // tmp: '<div class="tp-title-wrap">  <span class="tp-arr-titleholder">easyPassword</span> </div>',
            left: {
              h_align: "left",
              v_align: "center",
              h_offset: 10,
              v_offset: 0
            },
            right: {
              h_align: "right",
              v_align: "center",
              h_offset: 10,
              v_offset: 0
            }
          }
        }
      });

      apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
        SEMICOLON.slider.sliderParallaxDimensions();
      });

    }); //ready

  </script>
<script>

$(function () {
  var console_styles = {
    spacing: "color: #336699",
    title: "color: #9c27b0; font-weight: bold",
    image: function(parameter) {
      return "background-image: url(\"https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2018-06/favicon.ico\"); background-size: cover";
    },
    wording : "color:white",
  };
  setTimeout(console.log.bind(console, "%c  %c Welcome To EasyParcel %c  %c", console_styles.image(""), console_styles.title, console_styles.image(""),console_styles.wording));
  setTimeout(console.log.bind(console, "%c%s","color: white; background: #9c27b0; font-size: 26px;"," ᶘ ᵒᴥᵒᶅ < Hello There! Are you lost?"));
  setTimeout(console.log.bind(console, "%c%s","color: yellow; background: black; font-size: 14px;"," ٩(×̯×)۶ CJ Was Here [2014-2021] "));
  $('[data-toggle="tooltip"]').tooltip();
  });

if($(".list-fix").length > 0){
  $('.list-fix').viewportChecker({
    classToAdd: 'visible animated bounceIn',
    removeClassAfterAnimation: true,
    offset: "50%"
  });
}
if($(".fade-in-down").length > 0){
  $('.fade-in-down').addClass("invisible").viewportChecker({
    classToAddForFullView: 'visible animated fadeInDown',
    classToRemove : 'invisible',
    removeClassAfterAnimation: true,
    offset: "20%"
  });
}

function checkSignUp(obj){
  var status = false;
  obj = ".input-group #"+obj;
  ValidateResult = ValidateSignUpResult(obj);
  if(ValidateResult=="true"){
    status = true;
  }else{
    window.exist = 0;
    swal({
      title: 'Error',
      type: 'error',
      html: '' + ValidateResult,
      confirmButtonColor: '#4e97d8'
      })
  }
  return status;
}

function checkEmail(obj,check){
  var pass = true;
  var email = $(obj).val();
  email = email.trim();
  
  if(General.isTextEmpty($(obj)) || !General.validateEmail(email)){
    // doFail(obj);
    window.outcome = 0;
  }else{
    // doPadding(obj);
    if(check){
      $.ajax({
        type: "POST",
        url: "https://easyparcel.com/my/en/?ac=CheckUserEmail",
        data : { 
          email : email
        },
        async : false,
        success:function(response){
          if(response == "pass"){
            // doPass(obj);
            window.outcome = 2;
          }else{
            // doFail(obj);
            window.outcome = 1;
          }
        }
      });
    }
  }
}

function ValidateSignUpResult(obj){
  var email = $(obj);
  var returnResult = "";
  checkEmail(email,true);
  if(window.outcome == 0){
    returnResult += "Please enter a valid email.";
  }else if(window.outcome == 1){
    returnResult += "Another user with this email already exists. Maybe it's your evil twin. Spooky. If it is you, kindly log in with the email or click <a href='forgotpassword/index.html'><b><u>HERE</u></b></a> to reset a new password.";
  }else if(window.outcome == 2){
    returnResult = "true";
  }

  return returnResult;
}

$(document).ready( function() {
    $(".back-top").hide(); //hide your div initially
  var topOfOthDiv = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() > topOfOthDiv) { //scrolled past the other div?
            $(".back-top").show(); //reached the desired point -- show div
        }
    if($(window).scrollTop() < topOfOthDiv) { //scrolled past the other div?
            $(".back-top").hide(); //reached the desired point -- show div
        }
    });

    //
});

</script>
<script type="text/javascript">
function initFreshChat() {
  
  promptLiveChat(false);
  
}

function promptLiveChat(customerTrigger){
  if(customerTrigger){
    $.ajax({
      type: "POST",
      url: "https://easyparcel.com/my/en/?ac=doCheckLiveChatOn",
      success:function(response){
        if(response == "on"){
          window.fcWidget.init({
            token: "fc994514-edba-472c-9eb5-becebab4fdd4",
            
                host: "https://wchat.freshchat.com",
                tags: ["imreceiver"]
              
          });
          window.fcWidget.open();
        }else{
          swal({
            title: 'Live Chat Enquiry',
            type: 'info',
            html: 'Live Chat is available from 10am to 6pm, Monday to Friday (Except Public Holiday).',
            confirmButtonColor: '#4e97d8'
          });
        }
      }
    });
  }else{
    window.fcWidget.init({
      token: "fc994514-edba-472c-9eb5-becebab4fdd4",
      
          host: "https://wchat.freshchat.com",
          tags: ["imreceiver"]
        
    });
  } 
}

function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=0,e.src="../../../wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>
    <!-- <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- apps -->
    <!-- <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script> -->
    <!-- slimscrollbar scrollbar JavaScript -->
    <!-- <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script> -->
    <!--Wave Effects -->
    <!-- <script src="dist/js/waves.js"></script> -->
    <!--Menu sidebar -->
    <!-- <script src="dist/js/sidebarmenu.js"></script> -->
    <!--Custom JavaScript -->
    <!-- <script src="dist/js/custom.min.js"></script> -->
    <!--This page JavaScript -->
    <!--chartis chart-->
    <!-- <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> -->
    <!--c3 charts -->
    <!-- <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script> -->
    <!--chartjs -->
    <!-- <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
	 -->
	    <!--This page plugins -->
    <!-- <script src="assets/extra-libs/DataTables/datatables.min.js"></script> -->
    <!-- start - This is for export functionality only -->
    <!-- <script src="dist/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="dist/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="dist/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="dist/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="dist/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="dist/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="dist/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="dist/dist/js/pages/datatable/datatable-advanced.init.js"></script>
	 -->
	<!--This page plugins -->
    <!-- <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
	
	<script src="assets/libs/pickadate/lib/compressed/picker.js"></script>
	<script src="assets/libs/pickadate/lib/compressed/picker.date.js"></script>
	<script src="assets/libs/pickadate/lib/compressed/picker.time.js"></script>
	<script src="assets/libs/pickadate/lib/compressed/legacy.js"></script>
	<script src="assets/libs/moment/moment.js"></script>
	<script src="assets/libs/daterangepicker/daterangepicker.js"></script>
	<script src="dist/js/pages/forms/datetimepicker/datetimepicker.init.js"></script>
	 -->
	  <!-- start - This is for export functionality only -->
    <!-- <script src="assets/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="assets/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="assets/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="assets/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-advanced.init.js"></script>
	
	<script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
</body>

</html>