<?php
	require_once "../../functions/helpers.php";
	require_once "../../functions/categories.php";
 
	if(!isset($_SESSION['user'])){
		header('Location: ../auth/login.php');
	}
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $category=getCategories($id);
    }
	
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";
	
	$error="";
	$message="";
	
	if(isset($_POST['submit'])){
		if(isset($_POST['title']) && !empty($_POST['title'])){
			updateCategory($id, $_POST['title']);
			header('Location: index.php');
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
                    <h6 class="card-title">ویرایش دسته بندی</h6>
                    <form method="POST" action="edit.php?id=<?= $category->id ?>">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">عنوان دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="title" value="<?= $category->title ?>">
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
	