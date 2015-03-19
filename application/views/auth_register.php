<style>

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>
<div class="container">
	<form class="form-signin" action="/auth/register" method="post">
		<h2 class="form-signin-heading">회원가입</h2>
		<input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>" placeholder="이름" required autofocus>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="이메일" required>
        <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>" placeholder="비밀번호" required>
        <input type="password" name="password-repeat" class="form-control" value="<?php echo set_value('password-repeat'); ?>" placeholder="비밀번호 확인" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">회원가입</button>
        <a class="btn btn-lg btn-info btn-block" href="<?=$facebook['login_url']?>">페이스북으로 가입</a>
	</form>
<div style="text-align: center;"><?php echo validation_errors(); ?></div>
</div> <!-- /container -->
