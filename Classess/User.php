<?php

    require_once 'Database.php';

    class User extends Database
    {
        # create the store method
        public function store($request)
        {

            // received the registration details coming the registration form
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            // $password = $request('password');
           
            // appy hasing algorithm for security purposes
            $password = password_hash($request['password'], PASSWORD_DEFAULT);
            
            # create the query string
            $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) VALUES('$first_name', '$last_name', '$username', '$password')";
            
            # execute the query string
            if ($this->conn->query($sql)) {
                header('location:../views'); // go to index.php page
                exit;
            }else {
                die("Error creating user. " . $this->conn->error);
            }
        }

        public function login($request)
        {
            $username = $request['username'];
            $password = $request['password'];

            # query string

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $this->conn->query($sql);

            # check if the username exists
            if ($result->num_rows == 1) {

                # check if the password is correct as per record in the database
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                   
                   # create the session variables 
                   session_start();
                   $_SESSION['id'] = $user['id'];
                   $_SESSION['username'] = $user['username'];
                   $_SESSION['fullname'] = $user['first_name'] . " " .$user['last_name'];

                   header('location:../views/dashboard.php');
                   exit;
                }else{
                    die ("Password is incorrect.");
                }
            }else{
                die ("Username does not exists.");
           
            }
        
        }

            public function logout(){
                session_start();
                session_unset();
                session_destroy();
                    
                header('location:../views');
            }

            public function getAllUsers(){

                # query string
                $sql = "SELECT id, first_name, last_name, username, photo FROM users";
                if ($result = $this->conn->query($sql)) {
                  return $result;
                }else{
                    die('Error retrieving all user data ' . $this->conn->error);
                }
            }

            public function getUser(){
                $id = $_SESSION['id'];

                $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id='$id'";
                if ($result = $this->conn->query($sql)) {
                    return $result->fetch_assoc();
                }else {
                    die ('Error retrieving user.' . $this->conn->error);
                }

            }
            
            public function update($request, $files){
                session_start();
                $id = $_SESSION['id'];
                $first_name = $request['first_name'];
                $last_name = $request['last_name'];
                $username = $request['username'];
                $photo = $files['photo']['name'];
                $tmp_photo = $files['photo']['tmp_name'];
   
                
                #query
                $sql = "UPDATE users SET first_name=' $first_name', last_name='$last_name', username='$username' WHERE id='$id'";
                if ($this->conn->query($sql)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['fullname'] = "$first_name $last_name";


                    if ($photo) {
                        $sql = "UPDATE users SET photo='$photo' WHERE id='$id'";
                        $destination = "../Assets/images/$photo";


                        if ($this->conn->query($sql)) {

                            if (move_uploaded_file($tmp_photo, $destination)) {
                                header("location:../views/dashboard.php");
                                exit;
                            }else{
                                die("Error moving the photo.");
                            }    
                        }else{
                            die("Error uploading photo " . $this->conn->error);
                        }
                    }
                    header("location:../views/dashboard.php");
                    exit;
                }else{
                    die("Error uploading photo " . $this->conn->error);
                }


            }

            public function delete(){
                session_start();
                $id = $_SESSION['id'];

                $sql = "DELETE FROM users WHERE id = '$id'";

                if ($this->conn->query($sql)) {
                  $this->logout();
                }else{
                    die("Error in deleting the user: " . $this->conn->error);

                }

            }
    }

?>