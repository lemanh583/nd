<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
form { margin: 0px 10px; }

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}

.container { max-width: 360px; }

.divider {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 5px;
}

.divider hr {
  margin: 7px 0px;
  width: 35%;
}

.left { float: left; }

.right { float: right; }

::placeholder{
    color: #dc3545 !important;
}
</style>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<form method="POST" action="{{route('submitRegister')}}" role="form">
						@csrf
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">Your name (Lớn hơn 5 kí tự)</label>
							<input id="signupName" name="name"  value="{{old('name')}}" type="text" maxlength="50" class="form-control" placeholder=" @error('name'){{$message}}@enderror">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input id="signupEmail" name="email" type="email" value="{{old('email')}}" maxlength="50" class="form-control" placeholder=" @error('email'){{$message}}@enderror">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password (Lớn hơn 5 kí tự)</label>
							<input id="signupPassword" name="password" type="password" value="{{old('password')}}" maxlength="25" class="form-control" length="40" placeholder=" @error('password'){{$message}}@enderror">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Password again</label>
							<input id="signupPasswordagain" name="password_confirm" value="{{old('passwprd_confirm')}}" type="password" maxlength="25" class="form-control" placeholder=" @error('password_confirm'){{$message}}@enderror">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Phone number</label>
							<input id="phoneNumber" name="phoneNumber" type="text" value="{{old('phoneNumber')}}" maxlength="25" class="form-control" placeholder=" @error('phoneNumber'){{$message}}@enderror">
						</div>
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account</button>
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
						<hr>
						<p></p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
