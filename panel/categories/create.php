<?php
	require_once "../../functions/helpers.php";
	require_once "../../functions/categories.php";
	session_start();
	
	if(!isset($_SESSION['user'])){
		header('Location: ../auth/login.php');
	}
	
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";
	
	
	
	$error="";
    $message="";
    
	if(isset($_POST['submit'])){
		if(isset($_POST['title']) && !empty($_POST['title'])){
			createCategory($_POST['title']);
			$message="دسته جدید ایجاد شد.";
            header('location: index.php');
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
                <h6 class="card-title">ایجاد دسته بندی</h6>
                <form method="POST" action="create.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">عنوان دسته بندی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="title">
                        </div>
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

<?php
	include "../layouts/footer.php"
?>


