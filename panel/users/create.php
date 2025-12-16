<?php
	require_once "../../functions/helpers.php";
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";
	
	$error="";
	if(isset($_POST['submit'])){
		if(
			isset($_POST['name']) && !empty($_POST['name'])
            && isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])
		){
				if(checkPassword($_POST['password'])){
					if(checkUser($_POST['email'])){
						$error="این ایمیل تکراری است";
					}
					else{
						// create new user
                        if(!empty($_FILES['image'])){
                            move_uploaded_file($_FILES['image']['temp'],__DIR__."/images/".$_FILES['image']['name']);
                            $image=$_FILES['image']['name'];
                        }
						createUser($_POST['name'],$_POST['email'],$_POST['password'],$image);
						$message="کاربر جدید ذخیره شد.";
					}
				}else{
				$error="مقدار پسورد و تکرار آن برابر نیستند";
			}
		}
		else{
			$error="لطفا تمام فیلد ها را تکمیل کنید";
		}
	}
?>
<main class="main-content">
    <div class="card">
        <div class="card-body">
            
            <div class="container">
                <h6 class="card-title">ایجاد کاربر</h6>
                <p style="color: red;"><?php if($error!==""){
			            echo $error;
		            } ?>  </p>
                <form method="POST" >
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">ایمیل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="email" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">موبایل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="mobile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">پسورد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">واتس اپ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="whatsapp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">تلگرام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="telegram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">اینستاگرام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="instagram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                        <input  class="col-sm-10" type="file" class="form-control-file" id="file">
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
	include "../layouts/footer.php"
?>


