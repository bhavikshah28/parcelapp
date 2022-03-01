<?php
  
  if (!defined("_VALID_PHP"))
	  die('Direct access to this location is not allowed.');
?>		
	
    <footer id="footer" class="dark">
<div class="container">

<div class="footer-widgets-wrap clearfix">
<div class="col_two_third">
<div class="col_one_third">
<div class="widget widget_links clearfix">
<h4>						<?php echo !($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" class="img-fluid"/>': $core->site_name;?></h4>
<ul>
<li><a href="#">About Us</a></li>
<li><a href="#" target="_blank">Blog</a></li>
<li><a href="#" target="_blank">FAQ</a></li>
<li><a href="#" target="_blank">Help Centre</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#">Packaging Store</a></li>
<li><a href="#">Prohibited Item List</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms & Conditions</a></li>
</ul>
</div>
</div>
<div class="col_one_third">
<div class="widget widget_links clearfix">
<h4>Quick Guide</h4>
<ul>
<li><a href="register.php" target="_blank">Register An Account</a></li>
<li><a href="#" target="_blank">Place An Order</a></li>
</ul>
</div>
</div>
<div class="col_one_third col_last">
<div class="widget widget_links clearfix">
<h4>Tools</h4>
<ul>
<li><a href="#">Send A Parcel</a></li>
</ul>
</div>
</div>
</div>
<div class="col_one_third col_last">
<div class="widget widget_links clearfix">
<h4>Register</h4>

<form action="https://easyparcel.com/my/en/signup/" method="post" class="nobottommargin" onsubmit="return checkSignUp('widget-subscribe-form-email')">
<div class="input-group divcenter">
<input type="email" id="widget-subscribe-form-email" name="email" class="form-control required email" placeholder="Email">
<span class="input-group-btn">
<button class="btn button-pink" type="submit">Sign Up For Free</button>
</span> </div>
</form>
</div>
<div class="widget clearfix" style="margin-bottom: -20px;">
<div class="row">
<div class="col-md-6 clearfix bottommargin-20">
<a href="#" target="_blank" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;"> <i class="icon-facebook"></i> <i class="icon-facebook"></i> </a>
<a href="#" target="_blank"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
</div>
<div class="col-md-6 clearfix">
<a href="#" target="_blank" class="social-icon si-dark si-colored si-instagram nobottommargin" style="margin-right: 10px;"> <i class="icon-instagram2"></i> <i class="icon-instagram2"></i> </a>
<a href="#" target="_blank"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on Instagram</small></a>
</div>
</div>
<!-- <div class="col-md-12 fleft">
<img src="../../../s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2018-06/msc_logo.png" srcset="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2018-06/msc_logo.png 1x, https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2018-06/msc_logo@2.png 2x" width="100px" alt="MSC logo">
</div> -->
</div>
</div>
</div>

</div>

<div id="copyrights">
<div class="container clearfix">
<div class="col_half">
<p>&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
</div>
<div class="col_half col_last tright">
<div class="fright clearfix">
<a href="#" target="_blank" class="social-icon si-small si-borderless si-facebook"> <i class="icon-facebook"></i> <i class="icon-facebook"></i> </a>
<a href="#" target="_blank" class="social-icon si-small si-borderless si-twitter"> <i class="icon-twitter"></i> <i class="icon-twitter"></i> </a>
<a href="#" target="_blank" class="social-icon si-small si-borderless si-pinterest"> <i class="icon-pinterest"></i> <i class="icon-pinterest"></i> </a>
<a href="#" target="_blank" class="social-icon si-small si-borderless si-instagram"> <i class="icon-instagram2"></i> <i class="icon-instagram2"></i> </a>
<a href="#" target="_blank" class="social-icon si-small si-borderless si-youtube"> <i class="icon-youtube"></i> <i class="icon-youtube"></i> </a>
</div>
</div>
</div>
</div>

</footer>

<div class="modal fade login-modal-2" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel">
<div class="modal-dialog modal-md">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h5 class="modal-title">Action Required Title</h5>
</div>
<div class="modal-body">
<div id="details">
<script src="../../../apis.google.com/js/api_client.js"></script>
<div class="col-12 login-center login-wrapper clearfix">
<form method="post" class="SigninForm">
<h4 class="text-uppercase text-center">Welcome Back</h4>
<p class="text-center">Log in to access your account and manage your bookings.</p>
<div class="form-group has-feedback input-has-value">
<input type="email" placeholder="Email Address" class="form-control form-control-line" name="txt_user" id="login_email" autocomplete="off" oninvalid="this.setCustomValidity('Fill in this field')" oninput="setCustomValidity('')" required="">
</div>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">
<input class="form-control txtPassword pwdStr" type="password" name="txt_pass" required="" placeholder="Password" autocomplete="off" oninvalid="this.setCustomValidity('Fill in this field')" oninput="setCustomValidity('')">
<button class="btn btn-default show_hide_pass shwPassword" onclick="ShowPassword(event)" type="button"> <i class="material-icons list-icon">visibility_off</i></button>
</div>
</div>
<div class="form-group no-gutters mb-3">
<div class="col-md-12 d-flex">
<div class="checkbox mr-auto">
<label class="d-flex">
<input type="checkbox" id="rememberme">
<span class="label-text">Remember me</span> </label>
</div>
<div class="forgotlogin"><span id="to-recover" class="my-auto text-right"><i class="fa fa-lock mr-1"></i>Forgot <a href="forgotpassword/index.html" id="to-recover" class="border_bottom_dotted">Password</a> / <a href="forgotemail/index.html" id="to-recover" class="border_bottom_dotted"> Email</a>?</span></div>

</div>

<div class="form-group" onkeypress="return checkEnter(event)">
<button class="btn btn-block btn-lg btn-pink btn-3d ripple log-in" onclick="Signin(event)">Log In</button>
</div>

<hr>
<div class="row btn-list">
<div class="col-md-6 facebook">
<button type="button" class="btn btn-block btn-facebook btn-3d ripple" data-toggle="tooltip" data-placement="top" title="" onclick="FBloginnow()" data-original-title="Log in with Facebook"><i class="icon-facebook"></i> Facebook</button>
</div>
<div class="col-md-6 google">
<button type="button" class="btn btn-block btn-googleplus btn-3d ripple" data-toggle="tooltip" data-placement="top" title="" id="googlelogin" data-original-title="Log in with Google"><i class="icon-google-plus"></i> Google</button>
</div>
<div class="d-md-none d-lg-none d-xl-none col-md-6 wechat">
<button type="button" class="btn btn-block btn-success btn-3d ripple" data-toggle="tooltip" data-placement="top" title="" data-original-title="Log in with WeChat"><i class="list-icon fa fa-wechat"></i> WeChat</button>
</div>
<div class="d-md-none d-lg-none d-xl-none col-md-6 line">
<button type="button" class="btn btn-block btn-success btn-3d ripple" data-toggle="tooltip" data-placement="top" title="" onclick="location.href='https://access.line.me/oauth2/v2.1/authorize?response_type=code&amp;client_id=1540317441&amp;redirect_uri=https://easyparcel.com/my/en/login/&amp;state=12345abcde&amp;scope=openid%20profile%20email&amp;nonce=09876xyz'" data-original-title="Log in with Line"><img src="../../../s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2018-06/line_messenger_icon.png" alt="line messenger" style="height: 18px;margin-right: 2px;margin-top: -2px"> Line</button>
</div>
</div>

<div class="text-center">
<hr>
<p>Don't have an account? <a href="signup/index.html" class="m-l-5"><b>Sign Up</b></a> </p>
</div>
</div>
</form>
</div>
<script>
var outcome="";
var isLogin=false;
var message="";
var exist=0;
var cookieStr = document.cookie;
cookieStr = cookieStr.split('; ');
var cookies = {};
for(var i=0;i<cookieStr.length;i++){
  var cur = cookieStr[i].split('=');
  cookies[cur[0]] = cur[1];
}

if(cookies['username'] != ''){
  $('input[name=txt_user]').val(cookies['username']);
}

if('0' == 1){
  var email = "";
  var lineID = '';
  if(typeof email == 'undefined'){
  // open staging
  //LineSignin();
  }else{
    $.ajax({
      type: "POST",
      url: "https://easyparcel.com/my/en/?ac=doUserLoginGoogle",
      data : { 
        email : email,
        lineID : lineID
      },
      async : false,
      success:function(result){
        result = jQuery.parseJSON(result);  
        if(result.response == "pass"){
          current_url=result.urlpath;
          if("/" != "dashboard"){
            location.reload();
          }else if('' != ""){
            LocationLink = current_url+"";
            window.location.href = LocationLink.replace(/&amp;/g,'&');
          }else{
            LocationLink = current_url+"//";
            window.location.href = LocationLink.replace(/&amp;/g,'&');
          }
        }else{
          if(result.response == "full_suspended"){
            swal({
            title: 'Account Suspended',
            type: 'error',
            html: 'Sorry, your account is suspended.',
            confirmButtonColor: '#4e97d8'
            })  
          }else{
            swal({
            title: 'Sign In Fail',
            type: 'error',
            html: 'Sorry, invalid email. Please Try Again.',
            confirmButtonColor: '#4e97d8'
            })
          }
        }
      }
    });
    
  }
}




function LineSignin(e){
  $(".alert.alert-danger").text("").removeClass();
  $("[name=txt_user]").attr("required",true);
  // line ID
  var email = $(".SigninForm [name=txt_user]").val();
  var pwd = $(".SigninForm [name=txt_pass]").val();
  var lineID = '';
  if(email == "" || pwd == ""){
    if($(".SigninForm [name=txt_user]").val() != ""){
      if(!General.validateEmail($(".SigninForm [name=txt_user]").val())){
        e.preventDefault();
        $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i>Email is not valid.</div>");
      }
    }
  }else{
    e.preventDefault();
    $(".log-in").addClass("disable loading btn-default");
    $(".log-in").removeClass("btn-info");
    $(".log-in").html("<div class='loading_spinner'></div>");
  var
    type = "post",
    url = "index0206.html?ac=doUserLogin",
    data = {
       email : email,
      pwd : pwd,
      lineID : lineID
    },
    callback = function(result){     
      result = jQuery.parseJSON(result);  
      if(result.response == "pass"){
        current_url=result.urlpath;
        var url = window.location.href;
        if(url.indexOf("pg=ShopifyLanding") > -1){
          window.location.href=(url);
        }else if("" == 1){
          UpdateQuoteRedirectId(current_url);
        }else if('' != ""){
          LocationLink = current_url+"";
          window.location.href = LocationLink.replace(/&amp;/g,'&');
        }else{
          if("/" != "dashboard"){
            location.reload();
          }else{
            LocationLink = current_url+"//";
            window.location.href = LocationLink.replace(/&amp;/g,'&');
          }
          
        }
      }else{
        $(".log-in").removeClass("disable loading btn-default");
        $(".log-in").addClass("btn-info");
        $(".log-in").html("Log In");
        isLogin = false;
        if(result.response == "full_suspended"){
          $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Your account has been suspended.</div>");
        }else{
          $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Your email and password don't match.</div>");
        }
      }
    };
    if(!isLogin){
      isLogin = true;
      General.loadAjax(type,url,data,callback);
    }
  }
}

function Signin(e){
  $(".alert.alert-danger").text("").removeClass();
  $("[name=txt_user]").attr("required",true);
  if(document.getElementById('rememberme').checked){
    rememberme = $(".SigninForm [name=txt_user]").val();
    var d = new Date();
    d.setTime(d.getTime() + (1825*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = 'username = '+rememberme+ "; " + expires;
  }
  if($(".SigninForm [name=txt_user]").val() != "" && $(".SigninForm [name=txt_pass]").val() != ""){
    e.preventDefault();
    $(".log-in").addClass("disable loading btn-default");
    $(".log-in").removeClass("btn-pink");
    $(".log-in").html("<div class='loading_spinner'></div>");
  var
    type = "post",
    url = "index0206.html?ac=doUserLogin",
    data = {
      email : $(".SigninForm [name=txt_user]").val(),
      pwd : $(".SigninForm [name=txt_pass]").val(),
      wechatID : $(".SigninForm [name=txt_wechatID]").val()
    },
    callback = function(result){
      result = jQuery.parseJSON(result);
      killlocalstore();
      if(result.response == "pass"){
        current_url=result.urlpath;
        var url = window.location.href;
        if(url.indexOf("AppIntegration") > -1){
          //window.location.href=(url);
          window.location.reload();
        }else if("" == 1){
          UpdateQuoteRedirectId(current_url);
        }else if('' != ""){
          LocationLink = current_url+"";
          window.location.href = LocationLink.replace(/&amp;/g,'&');
        }else{
          if("/" != "dashboard"){
            location.reload();
          }else{
            LocationLink = current_url+"//";
            window.location.href = LocationLink.replace(/&amp;/g,'&');
          }
        }
      }else{
        $(".log-in").removeClass("disable loading btn-default");
        $(".log-in").addClass("btn-pink");
        $(".log-in").html("Log In");
        isLogin = false;
        if(result.response == "full_suspended"){
          $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Your account has been suspended.</div>");
        }else{
          $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Your email and password don't match.</div>");
        }
      }
    };
    if(!isLogin){
      isLogin = true;
      General.loadAjax(type,url,data,callback);
    }
  }else{
    if($(".SigninForm [name=txt_user]").val() != ""){
      if(!General.validateEmail($(".SigninForm [name=txt_user]").val())){
        e.preventDefault();
        $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i>Email is not valid.</div>");
      }
    }
  }
}

function killlocalstore(){
    // if(localStorage.removeItem("poslaju_MerdekaPromo") !== null){
      localStorage.clear();
    // }
  }

function UpdateQuoteRedirectId(current_url){
  var
    type = "post",
    url = "indexfd1f.html?ac=doUpdateQuoteRedirectId",
    data = {
      quoteid : ''
    },callback = function(result){
      if(result == "pass"){
        window.location.href = current_url+"single/?b=&offer="; 
      }else{
        window.location.href = current_url+"single";
      }
    };  
  General.loadAjax(type,url,data,callback); 
}
 
function ShowPassword(e){
    e.preventDefault();
    if($(".txtPassword").attr('type')=='password'){
       $(".txtPassword").prop('type','text');
       $(".shwPassword").html("<i class='material-icons list-icon'>visibility</i>");
    }else{
       $(".txtPassword").prop('type','password');
       $(".shwPassword").html("<i class='material-icons list-icon'>visibility_off</i>");
    }
}

function SignInFB(response){
  $(".alert.alert-danger").text("").removeClass();
  FB.api('/me?fields=first_name, last_name, picture, email', function(response2){
  FBValidation = true;
  if(response2.id != response.id || response2.first_name != response.first_name || response2.last_name != response.last_name || response2.email != response.email){
      FBValidation = false;
    }
  var email = response.email;
  if(email == "" || email == null || email===undefined || FBValidation==false){
    $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Invalid Facebook Account. Please sign up manually.</div>");
    return false;
  }
  var
  type = "post",
  url = "index745e.html?ac=doFbSignIn",
  data={
    email:response.email,
    fname:response.first_name,
    lname:response.last_name,
    fbid:response.id
  },  
  callback = function(result){
    console.log(result);
    var current_url = "index.html";
    if(result == "pass"){
      var url = window.location.href;
      if(url.indexOf("AppIntegration") > -1){
        window.location.reload();
      }else if('' != ""){
        LocationLink = current_url+"";
        window.location.href = LocationLink.replace(/&amp;/g,'&');
      }else{
        if("/" != "dashboard"){
          location.reload();
        }else{
          LocationLink = current_url+"//";
          window.location.href = LocationLink.replace(/&amp;/g,'&');
        }
      }
    }else if(result == "pass2"){
      var url = window.location.href;
      if(url.indexOf("AppIntegration") > -1){
        window.location.reload();
      }else if('' != ""){
        LocationLink = current_url+"";
        window.location.href = LocationLink.replace(/&amp;/g,'&');
      }else{
        if("/" != "dashboard"){
          location.reload();
        }else{
          LocationLink = current_url+"//";
          window.location.href = LocationLink.replace(/&amp;/g,'&');
        }
      }
    }else{
      $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> There seems to be a problem and the system is not able to register you. Please try again. If there error persist please contact our customer service for further assistance.n Thank you for choosing us as your service partner. Have a nice day</div>");
    }
  };
  General.loadAjax(type,url,data,callback);
   });
}

function FBloginnow(){
FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {

  FB.api('/me?fields=first_name, last_name, picture, email', function(response) {

    SignInFB(response);
       },{scope:'email',  return_scopes: true});


  } else {
    FB.login(function(response) {
    
  if (response.authResponse) {
    
     FB.api('/me?fields=first_name, last_name, picture, email', function(response) {
      //console.log('Good to see you, ' + response.name + '.');
  SignInFB(response);
     },{scope:'email',  return_scopes: true});
    } else {
    }
  }, {scope: 'email'}); 
   }
 });
}


//Start of FB script

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    //console.log('statusChangeCallback');
    //console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    // need to change to global id
    appId      : '327130994156139',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v3.0' // use version 3.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "../../../connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  function testAPI() {
    //console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=first_name, last_name, picture, email', function(response) {
  //console.log('Successful login for: ' + response.name + response.email);
    });
  }

function checkEnter(e) {
    if (e.keyCode == 13) {
    Signin();
    }
}

$(function(){
  $("#login_email").focus();
});

var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      //Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        // need to change to global id
        client_id: '649081315058-877bqilqh4t7upl4tgmn2n8ivl1i3eth.apps.googleusercontent.com',
      });
      attachSignin(document.getElementById('googlelogin'));
    attachSignin(document.getElementById('googlesignup'));
    });
};

function attachSignin(element) {
  
    auth2.attachClickHandler(element, {},
  function(googleUser){
        var profile = googleUser.getBasicProfile();
    var image = profile.getImageUrl();
        var id_token = googleUser.getAuthResponse().id_token;
    var id = profile.getId();
    var email = profile.getEmail();
    email = email.trim();
    $.ajax({
      type: "POST",
      url: "https://easyparcel.com/my/en/?ac=CheckUserEmail",
      data : { 
        email : email
      },
      async : false,
      success:function(response){
        if(response == "pass"){
          window.outcome = 1;
        }else{
          window.outcome = 2;
        }
      }
    });
    if(window.outcome == 2){
      $(".alert.alert-danger").text("").removeClass();
      var
      type = "post",
      url = "indexbfe0.html?ac=doUserLoginGoogle",
      data = {
        email : email,
        id : id,
        image : image
      },
      callback = function(result){
      // console.log(result);     
        if(result == "pass"){
          var current_url = "index.html";
          if("/" != "dashboard"){
            location.reload();
          }else if('' != ""){
            LocationLink = current_url+"";
            window.location.href = LocationLink.replace(/&amp;/g,'&');
          }else{
            LocationLink = current_url+"//";
            window.location.href = LocationLink.replace(/&amp;/g,'&');
          }
        }else{
          if(result == "full_suspended"){
            $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Your account has been suspended.</div>");
          }else{
            $(".form-group.has-feedback").before("<div class='alert alert-icon alert-danger border-danger fade show' role='alert'><i class='material-icons list-icon'>info</i> Sorry, invalid email. Please Try Again.</div>");
          }
        }
      };
    }else if(window.outcome == 1){
      var
      type = "post",
      url = "indexd14c.html?ac=doQuickUserSignUp",
      data = {
        email : email
      },
      callback = function(result){
        if(result == "pass"){
          window.location.reload();
        }
      };    
    }
    General.loadAjax(type,url,data,callback);
  });
}
startApp();
</script>
</div>
</div>
<div id="footer">
</div>
</div>
</div>
</div>
</div>
</div>


<div id="gotoTop" class="icon-angle-up"></div>
   
	
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-jquery.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-datepicker.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-plugins.js"></script>
<script data-cfasync="false" type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master-jquery.fileupload.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.tablesorter.min.js"></script>
<!-- <script data-cfasync="false" type="text/javascript" src="assetso/js/select.js"></script> -->
<!-- <script type="text/javascript" src="assetso/js/bs-select.js"></script> -->
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
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-popper.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-dashboardrelated.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-functions.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-jquery.themepunch.tools.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-jquery.themepunch.revolution.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.video.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.slideanims.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.actions.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.layeranimation.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.kenburn.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.navigation.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.migration.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-revolution.extension.parallax.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/components/rangeslider.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/components/moment.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master-jquery.viewportchecker.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/countdown.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master-generals.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-sweetalert2.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master-jquery-hotspot.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-material-design.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-bootstrap-select.min.js"></script>


</body>

</html>