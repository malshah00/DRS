<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <title>Login Student</title>
    
  </head>
  <body>
    <h1 class="text-center mb-4"> DAHLIA REPORT SYSTEM</h1>
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Login Form</h2>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group text-center">
              <label for="studentemail">Student Email</label>
              <input
                type="email"
                class="form-control"
                id="studentemail"
                aria-describedby="studentemail"
                name="email"
                placeholder="Enter email"
                required
                autofocus
              />
            </div>
            <div class="form-group text-center">
              <label for="password">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                required
              />
            </div>
            <div class=" text-center">
              <button type="button" onclick="redirectToBack()" class="btn btn-primary">
                Back
              </button>
              <button type="submit" class="btn btn-primary">
                Login
              </button>
              <button type="button" onclick="redirectToRegister()" class="btn btn-primary">
                Register
              </button>
            </div>
          </form>
      </div>
    </div>

    <script>
      function redirectToBack() {
        window.location.href = "/welcome";
      }
      function redirectToRegister() {
        window.location.href = "/register";
      }
    </script>
  </body>
</html>
