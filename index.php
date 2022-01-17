<?php session_start();
  require_once('config/functions.php');
  if(isset($_SESSION['uid'])){
        header('location: home');
      }
include('layouts/login_header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1">
                            <!-- <img src="app-assets/images/logo/logo-dark.png" alt="branding logo"> -->
                            <h2><strong>OYO STATE PROJECT PORTAL</strong></h2>
                        </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Welcome to Oyo Projects Portal</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" class="form-horizontal form-simple" id="login_form">
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="email" class="form-control form-control-lg input-lg" id="email" name="email" placeholder="Your Email" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control form-control-lg input-lg" id="password" name="password" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-md-left">
                                    <!-- <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset> -->
                                </div>
                                <div class="col-md-6 col-12 text-center text-md-right"><a href="#" class="card-link">Forgot Password?</a></div>
                            </div>
                            <button type="submit" class="btn btn-info btn-lg btn-block" id="cmd_login"><i class="ft-unlock"></i>Login</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="">
                        <p class="float-sm-left text-center m-0"><a href="#" class="card-link">Recover password</a></p>
                        <!-- <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="register-simple.html" class="card-link">Sign Up</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('layouts/login_footer.php'); ?>
   