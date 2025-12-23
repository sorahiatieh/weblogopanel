<?php
	require_once "../../functions/helpers.php";
	require_once "../../functions/users.php";
	session_start();
	
	if(!isset($_SESSION['user'])){
		header('Location: ../auth/login.php');
	}
    $users=getAllUsers();
	include "../layouts/head.php";
	include "../layouts/navigation.php";
	include "../layouts/header.php";
	
	
?>
	
	<main class="main-content">
		<div class="card">
            <div class="card-body">
				<div class="table overflow-auto" tabindex="8">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">عنوان جستجو</label>
						<div class="col-sm-10">
							<input type="text" class="form-control text-left" dir="rtl">
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead class="thead-light">
						<tr>
							<th class="text-center align-middle text-primary">ردیف</th>
							<th class="text-center align-middle text-primary">عکس</th>
							<th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
							<th class="text-center align-middle text-primary">ایمیل</th>
							<th class="text-center align-middle text-primary">ویرایش</th>
							<th class="text-center align-middle text-primary">حذف</th>
							<th class="text-center align-middle text-primary">تاریخ ایجاد</th>
						</tr>
						</thead>
						<tbody>
                        <?php
                            $i=1;
                            foreach($users as $user){
                        ?>
							<tr>
								<td class="text-center align-middle"><?= $i++; ?></td>
								<td class="text-center align-middle">
									<figure class="avatar avatar">
										<img src="<?= asset('/images/'.$user->image)?>" class="rounded-circle" alt="image">
									</figure>
								</td>
								<td class="text-center align-middle"><?= $user->name ?></td>
								<td class="text-center align-middle"><?= $user->email ?></td>
								<td class="text-center align-middle">
									<a class="btn btn-outline-info" href="<?= url('/panel/users/edit.php?id='). $user->id ?>">
										ویرایش
									</a>
								</td>
                                <td class="text-center align-middle">
									<a class="btn btn-outline-info" href="<?= url('/panel/users/delete.php?id='). $user->id ?>">
										حذف
									</a>
								</td>
								<td class="text-center align-middle"><?= $user->created_at ?></td>
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
