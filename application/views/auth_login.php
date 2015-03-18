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
	<form class="form-signin" action="/auth/authentication" method="post">
		<h2 class="form-signin-heading">로그인</h2>
        <input type="email" class="form-control" name="email" id="email" placeholder="이메일" required autofocus>
        <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호">
    	<label class="checkbox" style="margin-left: 20px;">
        	<input type="checkbox" id="remember-me" name="remember-me" value="1" checked="checked"> 자동 로그인
        </label>
    	<button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button>
	</form>

</div> <!-- /container -->
