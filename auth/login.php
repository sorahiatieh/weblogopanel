<?php
	require_once "../functions/users.php";
	session_start();
 
    if(isset($_SESSION['user'])){
	    header('Location: ../panel/index.php');
    }
	$error="";
	if(isset($_POST['submit'])){
		if(
			isset($_POST['email']) && !empty($_POST['email'])
			&& isset($_POST['password']) && !empty($_POST['password'])
		){
            $user=checkUser($_POST['email']);
			if($user && password_verify($_POST['password'],$user->password)){
                    $_SESSION['user']=$user->email;
					header('Location: ../panel/index.php');
				}else{
				$error="اطلاعات وارد شده نامعتبر میباشد!";
				}
		}else{
			$error = "لطفا تمام فیلد ها را تکمیل کنید";
		}
	}

?>
<html dir="rtl" lang="fa-IR">
<head>
    <title>ورود</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">
    <link href="../assets/Css/Main.css" rel="stylesheet" />
    <link href="../assets/Css/Style.css" rel="stylesheet" />
</head>
<body class="rtl bg-greengrad min-h">
    <section class="container maxw">
        <div class="card login  mx-md-5 mt-5 justify-content-center shadow-none">
            <div class="row">
    
                <div class="col-lg-6">
                    <div class="card-body p-4 text-center">
                            <a href="#"><img src="../assets/Img/logo-main.png" alt="logo" class="pt-2 pb-4"></a>
                        <p style="color: red;"><?php  if($error!==""){ echo $error;}  ?>  </p>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control"  placeholder=" ایمیل">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control"  placeholder="کلمه عبور">
                            </div>
                            <button type="submit" name="submit" id="login" class="btn btn-block py-2 btn-success radius10 my-3">ورود</button>
                    
                            <p>هنوز ثبت نام نکرده اید ؟ <a href="register.php" class="text-drkprimary">عضویت در سایت</a></p>
                           </form>
         
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <img src="../assets/Img/login.jpg" class="img-fluid d-lg-block d-none" />
                </div>
               </div>
        </div>
    </section>
</body>

</html>