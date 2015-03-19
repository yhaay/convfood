<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title도슭</title>
	<link href="/static/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">

body {
  padding-top: 70px;
}

	</style>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">도부끄</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/about">ABOUT</a><li>
				<li><a href="/listed/food/all">FOOD</a><li>
				<li><a href="/listed/comment">COMMENTS</a><li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php if ($this->session->userdata('is_login')) {?>
				<li><a href="/myinfo/history"><?=$this->session->userdata('name')?></a></li>
				<li><a href="/auth/logout">로그아웃</a></li>
			<?php } else { ?>
				<li><a href="/auth/login">로그인</a></li>
				<li><a href="/auth/register">회원가입</a></li>
			<?php } ?>
			</ul>
			<form class="navbar-form navbar-right" action="/listed/search" method="get">
				<div class="input-group">
					<input type="text" name="keyword" id="keyword" placeholder="검색" class="form-control">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">검색</button>
					</span>
				</div>
			</form>					
		</div>
	</div>
</div>