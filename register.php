<?php
	session_start();
	include 'header.php';
	require_once 'vendor/autoload.php';
	require_once 'facebook-object.php';
	$role = "";
	if(isset($_GET["role"])){
		$role = $_GET["role"];
		$_SESSION['role'] = $role;
	}
	
?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1476177342445158',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Main Content -->
        <div class="maincontent">
        <button id="password-not-match" type="button" data-positionX="center" data-positionY="top" data-effect="fadeInUp" data-type="error" data-message="รหัสผ่านไม่ตรงกัน" data-duration="4000" class="btn pmd-ripple-effect btn-default pmd-btn-raised pmd-alert-toggle" style="display: none;">Top Center</button>
            <div class="section-row register-2-type">
            <div class="form-section form-register register-fb col-md-6 head-title">
            	<?php
								$helper = $fb->getRedirectLoginHelper();

								$permissions = ['public_profile','email']; // Optional permissions
								$loginUrl = $helper->getLoginUrl('http://localhost:88/maread2/fb-callback.php', $permissions);

								echo '<a class="btn pmd-btn-raised pmd-ripple-effect btn-info" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook</a>';
								// if(isset($_SESSION['fb_access_token'])){
								// 	$accessToken = $_SESSION['fb_access_token'];
								// 	try {
								// 	  // Returns a `Facebook\FacebookResponse` object
								// 	  $response = $fb->get('/me?fields=id,name,email', $accessToken);
								// 	} catch(Facebook\Exceptions\FacebookResponseException $e) {
								// 	  echo 'Graph returned an error: ' . $e->getMessage();
								// 	  exit;
								// 	} catch(Facebook\Exceptions\FacebookSDKException $e) {
								// 	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
								// 	  exit;
								// 	}
								// 	$user = $response->getGraphUser();
								// 	echo '<input type="hidden" name="fb_id" id="fb_id" value="'.$user["id"].'"></input>';
								// }else{
								// 	echo '<input type="hidden" name="fb_id" id="fb_id" value=""></input>';
								// }
								if(isset($_SESSION['fb_id_register'])){
									echo '<input type="hidden" name="fb_id" id="fb_id" value="'.$_SESSION['fb_id_register'].'"></input>';
								}else{
									echo '<input type="hidden" name="fb_id" id="fb_id" value=""></input>';
								}
	                        ?>
            </div>
                <div class="form-section form-register register-email col-md-6 head-title">
                    <h3 class="text-title">ลงทะเบียน</h3>
                    <form id="register_form" method="post" action="methods/register.php">
	                    <div class="form-group pmd-textfield pmd-textfield-floating-label email">
	                        <label for="inputError1" class="control-label pmd-input-group-label">E-mail</label>
	                        <div class="input-group">
	                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>
	                            <input type="text" class="form-control" id="email" name="email">
	                        </div>
	                    </div>
	                    <div class="form-group pmd-textfield pmd-textfield-floating-label username">
	                        <label for="inputError1" class="control-label pmd-input-group-label">Username</label>
	                        <div class="input-group">
	                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
	                            <input type="text" class="form-control" id="username" name="username" onBlur="checkAvailability()"><span id="user-availability-status"></span>
	                        </div>
	                    </div>
	                    <div class="form-group pmd-textfield pmd-textfield-floating-label password">
	                        <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
	                        <div class="input-group">
	                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">https</i></div>
	                            <input type="password" class="form-control" id="password" name="password">
	                        </div>
	                    </div>
	                    <div class="form-group pmd-textfield pmd-textfield-floating-label comfirm_password">
	                        <label for="inputError1" class="control-label pmd-input-group-label">Confirm Password</label>
	                        <div class="input-group">
	                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">https</i></div>
	                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
	                        </div>
	                    </div>
	                    <input type="hidden" id="role" name="role" value="<?php echo $role;?>"></input>
	                    <div class="botton-submit">
	                        <button type="submit" id="btn-save" name="btn-save" class="btn pmd-btn-raised pmd-ripple-effect btn-default">Create Account</button>
	                    </div>
	                    
                    </form>
                </div>
            </div>
        </div>
<?php
	include 'footer.php';
?>
<script type="text/javascript">
	$(function() {
		var option = {
			dataType : "json",
			beforeSubmit:function(data){
				return validate();
			},
			  success: function(data) {
			  	if(data.result)
			    	window.location.href ="index.php";
			    	// console.log("OK");
				else
					console.log(data.error);
			  },
			  error:function(data){
			  	console.log(data);
			  }
		};
	  $('#register_form').ajaxForm(option);
	  if($("#fb_id").val() && ($("#fb_id").val()!=="")){
	  		$("#btn-save").click();
	  }

	});
	function validate(){
		if(!$("#fb_id").val() && ($("#fb_id").val()=="")){
			if(($("#password").val() == "" || $("#confirmpassword").val() == "" ) && ($("#password").val() !== $("#confirmpassword").val())){
				$(".password").addClass("has-error");
				$(".comfirm_password").addClass("has-error");
				$("#password-not-match").click();
				return false;
			}else{
				$(".password").removeClass("has-error");
				$(".comfirm_password").removeClass("has-error");
			}
			if(!isEmail($("#email").val())){
				$(".email").addClass("has-error");
				return false;
			}else{
				$(".email").removeClass("has-error");
			}
			if(!checkUsername()){
				return false;
			}
		}
		return true;
	}
	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}

	function checkAvailability() {
		jQuery.ajax({
			url: "methods/check_availability.php",
			data:'username='+$("#username").val(),
			type: "POST",
			success:function(data){
				$("#user-availability-status").html(data);
				if(data.indexOf("Not") > -1){
					$(".username").addClass("has-error");
				}else{
					$(".username").removeClass("has-error");
				}
			},
			error:function (){}
		});
	}
	function checkUsername() {
		jQuery.ajax({
			url: "methods/check_username.php",
			data:'username='+$("#username").val(),
			type: "POST",
			success:function(data){
				if(data == "OK"){
					return true;
				}else {
					return false;
				}
			},
			error:function (){
				return false;
			}
		});
	}
</script>