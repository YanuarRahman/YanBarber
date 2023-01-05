
<!doctype html>
<html lang="en">
  <head>
  	<title>Login | YanBarber</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('/') }}css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-2.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In YanBarber</h3>
			      		</div>
			      	</div>
							<form action="{{ url('login/proses') }}" class="signin-form" method="post">
                                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control 
                             @error('username')
                              is-invalid
                            @enderror
                            " placeholder="Username" name="username" >

                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                                
                            @enderror
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control 
                      @error('password')
                      is-invalid
                    @enderror" 
                       placeholder="Password" name="password" >
                      @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
		            </div>
		           
		          </form>
		            <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
                </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('/') }}js/jquery.min.js"></script>
  <script src="{{ asset('/') }}js/popper.js"></script>
  <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
  <script src="{{ asset('/') }}js/main.js"></script>

	</body>
</html>

