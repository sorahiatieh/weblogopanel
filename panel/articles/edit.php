<?php
	require_once "../../functions/helpers.php";
	require_once "../../functions/articles.php";
	require_once "../../functions/categories.php";
	require_once "../../functions/users.php";
	
	session_start();
	
	if(!isset($_SESSION['user'])){
		header('location: ../auth/login.php');
	}
	$user_id=checkUser($_SESSION['user'])->id;
	
	$categories=getAllCategories();
	
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}
	
	$article=getArticles($id);
	$error="";
	$message="";
	if(isset($_POST['submit'])){
		if(
			isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['body']) && !empty($_POST['body']) && isset($_POST['category_id']) && !empty($_POST['category_id']) && isset($_POST['status']) && !empty($_POST['status']) && isset($_FILES['image']) && !empty($_FILES['image']['name'])
		){
			updateArticle($id,$_POST['title'],$_POST['body'],$_POST['category_id'],$_POST['status'],$_FILES['image']);
			header('location: index.php');
		}
		else{
			$error="لطفا تمام فیلد ها را تکمیل کنید";
		}
	}
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";

?>
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <p style="color: red;"><?php if($error!==""){
						echo $error;
					} ?>  </p>
                <p style="color: green;"><?php if($message!==""){
						echo $message;
					} ?>  </p>
                <div class="container">
                    <h6 class="card-title">ویرایش مقاله</h6>
                    <form method="POST" action="edit.php?id=<?php echo $article->id ?>" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عنوان مقاله</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title"
                                       value="<?php echo $article->title ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">متن مقاله</label>
                            <div class="col-sm-10">
                                <textarea class="form-control text-left" dir="rtl" name="body" cols="30" rows="10">
                                    <?php echo $article->body ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <lable for="exampleFromControlSelect1">دسته بندی</lable>
                            <select class="form-control" name="category_id" id="exampleFromControlSelect1">
								<?php
									foreach($categories as $category){
										?>
										<?php if($category->id==$article->category_id){ ?>
                                            <option selected
                                                    value="<?= $category->id ?>"><?= $category->title ?></option>
											<?php
										}
										else{ ?>
                                            ?>
                                            <option value="<?= $category->id ?>"><?= $category->title ?></option>
											<?php
										}
									}
								?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <lable for="exampleFromControlSelect2">وضعیت</lable>
                            <select class="form-control" name="status" id="exampleFromControlSelect2">
								<?php
									if($article->status==="draft"){?>
                                        <option selected value="draft">پیش نویس</option>
										<?php }else{ ?>
                                         <option value="draft">پیش نویس</option>
                                        <?php } ?>
								<?php
									if($article->status==="published"){?>
                                        <option selected value="published">منتشر شده</option>
									<?php }else{ ?>
                                        <option value="published">منتشر شد</option>
									<?php } ?>
								<?php
									if($article->status==="archived"){?>
                                        <option selected value="archived">بایگانی</option>
									<?php }else{ ?>
                                        <option value="archived">بایگانی</option>
									<?php } ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input name="image" type="file" class="col-sm-10 form-control-file" id="file">
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
<?php include "../layouts/footer.php" ?>