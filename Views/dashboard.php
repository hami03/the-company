<?php

   session_start();

   require '../Classess/User.php';

   $user = new User;
   $all_users = $user->getAllUsers();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap Link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <!-- Font Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
      <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The Company</h1>
        </a>
        <div class="navbar-nav">
            <span class="navbar-text"><?= $_SESSION['fullname']?></span>
            <form action="../Actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
            </form>
        </div>
      </div>
    </nav>
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">User Lists</h2>

            <table class="table table-hover table-striped align-middle">
                <thead>
                    <th><!-- Photo --></th>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>USERNAME</th>
                    <th><!-- ACTION BUTTONS --></th>
                </thead>
                <tbody>
                    <?php
                      while ($user = $all_users->fetch_assoc()) {
                    ?>
                       <tr>
                         <td>
                            <?php
                              if ($user['photo']) {
                            ?>
                              <img src="../Assets/images/<?=$user['photo'] ?>" alt="<?=$user['photo'] ?>" class="d-block mx-auto" style="width: 100px; height: 100px;">
                            <?php
                               }else {
                            ?>
                                <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>

                            <?php
                               }
                            ?>
                         </td>
                         <td><?=$user['id']?></td>
                         <td><?=$user['first_name']?></td>
                         <td><?=$user['last_name']?></td>
                         <td><?=$user['username']?></td>
                         <td>
                            <?php
                               if ($_SESSION['id'] == $user['id']) {
                            ?> 
                               <a href="../Views/edit-user.php" class="btn btn-outline-warning" title="edit">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                               </a>  
                               <a href="" class="btn btn-outline-danger" title="Delete">
                                <i class="fa-solid fa-trash"></i> Delete
                               </a>    
                            <?php
                               }
                            ?>                            
                         </td>
                       </tr>
                       <?php
                         }
                       ?>
                </tbody>
            </table>
        </div>
    </main>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>

