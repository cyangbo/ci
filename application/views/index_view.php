<!DOCTYPE html>
<html lang="zh">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="UTF-8"/>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url('css/style2.css'); $myindex=site_url('index');?>"/>
</head>
<body>
<header id="logo"><h1><a href="<?php echo site_url('index'); ?>">djmsm</a></h1></header>
<nav>
	<ul>
		<li><a href="<?php echo site_url('index'); ?>">首页</a></li>
		<li><a href="<?php echo site_url('index/jswz'); ?>">技术文章</a></li>
		<li><a href="<?php echo site_url('index/sbzt'); ?>">随笔杂谈</a></li>
		<li><a href="#">项目</a></li>
		<li><a href="#">关于</a></li>
		<li id="searchBox">
			<form action="<?php echo site_url('index/search'); ?>" method="post">
				<input type="text" name="search" id="search"/><input type="submit" id="searchBtn"
				                                                     value="搜索"/>
			</form>
		</li>

	</ul>

</nav>
<div id="content">
	<section>
		<?php
			$mytag = site_url('index/searchByTag');
			$mysearch = site_url('index/search');
			if (isset($tag)) {
				
				echo "<h2><a id='tag' href='$mytag/$tag'>当前标签:$tag</a></h2>";
			}
			if (isset($search)) {
				
				echo "<h2><a id='tag' href='$mysearch/$search'>搜索:$search</a></h2>";
			}
			foreach ($articles as $article) {
				$tags = explode('-', $article->tag);
				$tagsA = '';
				for ($i = 0; $i < (count($tags) - 1); $i++) {
					$url = $mytag."/{$tags[$i]}";
					$tagsA .= "<a href=$url>{$tags[$i]}</a>";
				}
				$smallArticle = mb_substr($article->article, 0, 300);
				if (strlen($article->article) > 300) {
					$moreA = '[阅读全文]';
				} else {
					$moreA = '';
				}
				echo <<<EOT
				<article><header class="title">
                <h2><a href="http://localhost/index.php/paper/show/{$article->id}">{$article->title}</a></h2>

                <div class="info">
                    <span class="tag">标签：{$tagsA}</span><span
                    class="time">日期：{$article->time}</span>
                </div>

            </header>
            <div class="content">
                $smallArticle
                <a href="http://localhost/index.php/paper/show/{$article->id}">$moreA</a>
            </div>
            <div class="more"></div></article>
EOT;
			}
		?>
		<div class="page"><a
				href="<?php echo($myindex."/$ca/" . ($page - 1))
				?>">上一页</a>
			<a href="<?php echo($myindex."/$ca/" . ($page + 1))
			?>">下一页</a></div>
	</section>
	<aside>
		<div id="moreAboutMe">
			<h3>关注我</h3>
			<ul>
				<li><a class="weibo" href="http://weibo.com/gwiamgw" target="_blank">
						新浪微博</a></li>
				<li>
					<a class="mail" href="mailto:gongweiqm@qq.com"
					   target="_blank">gongweiqm@qq.com</a></li>
				<li>
					<a class="github" href="https://github.com/gongeek" target="_blank">github</a>
				</li>
				<li>
					<a class="sta" href="https://stackoverflow
				.com/users/3416109/gongeek" target="_blank">stackoverflow</a></li>
			</ul>
		</div>
		<div id="randomArticle">
			<h3>随机文章</h3>

		</div>
		<div id="biaoQian">
			<h3>标签</h3>

		</div>
	</aside>
</div>
<div id="top">回顶部</div>
<footer>版权为djmsm所有,欢迎访问 <a href="<?php echo site_url('index'); ?>">www.djmsm.com</a></footer>
<script src="<?php echo base_url('js/index.js');?>"></script>
</body>
</html>