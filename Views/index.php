<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap Link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-light">
    <div style="heigt: 100vh">
       <div class="row h-100 m-0">
          <div class="card w-25 mx-auto my-auto">
             <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center">Login</h1>
             </div>
             <div class="card-body">
                <form action="../Actions/login-action.php" method="post" autocomplete="off">
                    <input type="text" name="username" id="username" placeholder="USERNAME" class="form-control mb-2" required autofocus>
                    <input type="password" name="password" id="password" placeholder="PASSWORD" class="form-control mb-5" required>

                    <button type="submit" class="form-control btn btn-primary w-100">Login</button>

                </form>
                <p class="text-center small mt-3"><a href="register.php">Create Account</a></p>
                <p class="text-center small mt-3 text-muted">Copyright @ 2022</p>
             </div>
          </div>
       </div>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>