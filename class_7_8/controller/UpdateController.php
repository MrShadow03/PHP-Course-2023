<?php 
include '../helper/session.php';
include '../helper/db.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $old_photo = $_POST['old_photo'];
    $photo = $_FILES['photo'];

    //check if image is uploaded
    $hasImage = !empty($photo['name']);
    //check if has old image
    $hasOldImage = !empty($old_photo);


    //check if all fields are filled, if not, redirect to register page with error message in session
    if(empty($id)){
        $_SESSION['error'] = 'Something went wrong!';
        header('Location: ../dashboard.php');
    }

    if(empty($name) || empty($email) || empty($age) || empty($address)){
        $_SESSION['error'] = 'All fields are required';
        header('Location: ../index.php');
    }else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $_SESSION['error'] = 'Invalid email';
            header('Location: ../index.php');
        }else{
            if($hasImage){
                //size cannot be more than 100kb
                if($photo['size'] > 1000000){
                    $_SESSION['error'] = 'Image size cannot be more than 1mb';
                    header('Location: ../edit.php?id='.$id);
                    return;
                }else{
                    //retrieve file extension
                    $photo_size = $photo['size'];
                    $photo_name = $photo['name'];
                    $photo_tmp_name = $photo['tmp_name'];
            
                    //retrieve file extension
                    $photo_explode = explode('.', $photo_name);
            
                    $new_name = md5($photo_explode[0].time().rand()).'.'.end($photo_explode);

                    //move uploaded file to storage folder
                    move_uploaded_file($photo_tmp_name, '../storage/'.$new_name);
                    
                    //delete old image
                    if($hasOldImage){
                        unlink('../storage/'.$old_photo);
                    }

                    $sql = "UPDATE users SET photo = '$new_name', name = '$name', email = '$email', age = '$age', address = '$address' WHERE id = '$id'";
                }
            }else{
                $sql = "UPDATE users SET name = '$name', email = '$email', age = '$age', address = '$address' WHERE id = '$id'";
            }
                
                mysqli_query($connection, $sql);
                
                $_SESSION['success'] = 'User registered successfully';
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                
                header('Location: ../dashboard.php');
        }
    }
}
$create_sql = "INSERT INTO posts (title, text, user_id) VALUES ('$title', '$text', '$user_id')"
?>