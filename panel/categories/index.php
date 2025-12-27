<?php
	require_once "../../functions/helpers.php";
	require_once "../../functions/categories.php";
	session_start();
	
	if(!isset($_SESSION['user'])){
		header('Location: ../auth/login.php');
	}
    $categories=getAllCategories();
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";
	
	
?>
	
	<main class="main-content">
		<div class="card">
            <div class="card-body">
				<div class="table overflow-auto" tabindex="8">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">عنوان دسته بندی</label>
						<div class="col-sm-10">
							<input type="text" class="form-control text-left" dir="rtl">
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead class="thead-light">
						<tr>
							<th class="text-center align-middle text-primary">ردیف</th>
							<th class="text-center align-middle text-primary">عنوان دسته بندی</th>
							<th class="text-center align-middle text-primary">ویرایش</th>
							<th class="text-center align-middle text-primary">حذف</th>
							<th class="text-center align-middle text-primary">تاریخ ایجاد</th>
						</tr>
						</thead>
						<tbody>
                        <?php
                            $i=1;
                            foreach($categories as $category){
                        ?>
							<tr>
								<td class="text-center align-middle"><?= $i++; ?></td>
								<td class="text-center align-middle"><?= $category->title ?></td>
								<td class="text-center align-middle">
									<a class="btn btn-outline-info" href="<?= url('/panel/categories/edit.php?id='). $category->id ?>">
										ویرایش
									</a>
								</td>
                                <td class="text-center align-middle">
									<a class="btn btn-outline-info" href="<?= url('/panel/categories/delete.php?id='). $category->id ?>">
										حذف
									</a>
								</td>
								<td class="text-center align-middle"><?= $category->created_at ?></td>
							</tr>
                        <?php
                            }
                        ?>
					</table>
					<div style="margin: 40px !important;"
						 class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
					</div>
				</div>
            </div>
        </div>

	</main>
<?php
	include "../layouts/footer.php"
?>
