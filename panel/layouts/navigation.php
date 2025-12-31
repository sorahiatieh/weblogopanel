<div class="navigation">
	<div class="navigation-icon-menu">
		<ul>
			<li data-toggle="tooltip" title="کاربران">
				<a href="#users" title=" کاربران">
					<i class="icon ti-user"></i>
				</a>
			</li>
            <li data-toggle="tooltip" title="بلاگ">
                <a href="#blog" title=" بلاگ">
                    <i class="icon ti-book"></i>
                </a>
            </li>
		</ul>
		<ul>
			<li data-toggle="tooltip" title="ویرایش پروفایل">
				<a href="#" class="go-to-page">
					<i class="icon ti-settings"></i>
				</a>
			</li>
			<li data-toggle="tooltip" title="خروج">
				<a href="auth/login.php" class="go-to-page">
					<i class="icon ti-power-off"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="navigation-menu-body">
		<ul id="users">
			<li>
				<a href="#">کاربران</a>
				<ul>
					<li><a href="<?= url('/panel/users/create.php') ?>">ایجاد کاربر</a></li>
					<li><a href="<?= url('/panel/users/index.php') ?>">لیست کاربران</a></li>
				</ul>
			</li>
		</ul>
        <ul id="blog">
            <li>
                <a href="#">دسته بندی</a>
                <ul>
                    <li><a href="<?= url('/panel/categories/create.php') ?>">ایجاد دسته بندی</a></li>
                    <li><a href="<?= url('/panel/categories/index.php') ?>">لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">مقالات</a>
                <ul>
                    <li><a href="<?= url('/panel/articles/create.php') ?>">ایجاد مقاله</a></li>
                    <li><a href="<?= url('/panel/articles/index.php') ?>">لیست مقاله ها</a></li>
                </ul>
            </li>
        </ul>
	</div>
</div>
