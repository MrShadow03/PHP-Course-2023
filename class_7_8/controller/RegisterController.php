<?php 
include '../helper/session.php';
include '../helper/db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_FILES['photo'];

    echo "<pre>";
    print_r($photo);
    echo "</pre>";

    
    //check if all fields are filled, if not, redirect to register page with error message in session
    if(empty($name) || empty($email) || empty($password)){
        $_SESSION['error'] = 'All fields are required';
        header('Location: ../index.php');
    }else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $_SESSION['error'] = 'Invalid email';
            header('Location: ../index.php');
        }else{
            if(strlen($password) < 6){
                $_SESSION['error'] = 'Password must be at least 6 characters';
                header('Location: ../index.php');
            }else{

                if(empty($photo['name'])){
                    $_SESSION['error'] = 'Photo required';
                    header('Location: ../register.php');
                }else{
                    $photo_size = $photo['size'];
                    $photo_name = $photo['name'];
                    $photo_tmp_name = $photo['tmp_name'];
            
                    //retrieve file extension
                    $photo_explode = explode('.', $photo_name);
            
                    $new_name = md5($photo_explode[0].time().rand()).'.'.end($photo_explode);


                    $insert_sql = "INSERT INTO users (name, email, password, photo) VALUES ('$name', '$email', '$password','$new_name')";
                    mysqli_query($connection, $insert_sql);

                    move_uploaded_file($photo_tmp_name, '../storage/'.$new_name);

                    
                    $_SESSION['success'] = 'User registered successfully';
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    
                    header('Location: ../dashboard.php');
            
                }

                
            }
        }
    }
}

?>