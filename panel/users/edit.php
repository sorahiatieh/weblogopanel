<?php
	require_once "../../functions/helpers.php";
	require_once "../../functions/users.php";
 
	if(!isset($_SESSION['user'])){
		header('Location: ../auth/login.php');
	}
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $user=getUser($id);
    }
	
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";
	
	$error="";
	$message="";
	
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
						$image = uploadImage($_FILES['image']);
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
                <p style="color: red;"><?php if($error!==""){
			            echo $error;
		            } ?>
                </p>
                <p style="color: green;"><?php if($message!==""){
			            echo $message;
		            } ?>
                </p>
                <div class="container">
                    <h6 class="card-title">ویرایش کاربر</h6>
                    <form method="POST" action="edit.php?id=<?= $user->id ?>" enctype="multipart/form-data">
                        <div class="form-group row">
                            <figure class="avatar">
                                <img src="<?= asset('images/').$user->image ?>" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="name" value="<?= $user->name ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="email" value="<?= $user->email ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">پسورد</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="password">
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
							<input  class="col-sm-10" type="file" class="form-control-file" id="file">
						</div>
                        <div class="form-group row">
							<button type="submit" name="submit" class="btn btn-success btn-uppercase">
								<i class="ti-check-box m-r-5"></i> ذخیره
							</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</main>
	