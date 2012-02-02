<!DOCTYPE html>
<html lang="zh">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" content="排課, 國小, 課表" />
		<meta name="description" content="國小排課系統" />
        <title>OST排課系統 - <?= $layout_title ?></title>
    </head>
	<body>
		<header>
			<div id="banner">
				<a href="<?= base_url() ?>">OST排課系統</a>
			</div>

			<div id="login">
				<a href="login">登入</a>
			</div>
		</header>

    	<nav>
         	<ul id="user_nav">
                <li><a href="">檢視班級課表</a></li>
                <li><a href="">檢視教師課表</a></li>
                <li><a href="">檢視教室課表</a></li>
            </ul>
    	</nav>

        <section>
        	<?= $layout_content ?>
        </section>

        <footer>
			OST小學排課系統
			<a href="http://code.google.com/p/open-school-timetable/">專案網站</a>
        </footer>
	</body>
</html>