<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    $name = $_POST['name'];
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $room = $_POST['room'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];


    if(empty($name)){
        $errors['name'] = 'Please Enter Name';
    }
    if(empty($email)){
        $errors['email'] = 'Please Enter Email';
    }
    if(empty($room)){
        $errors['room'] = 'Please Select Room Number';
    }

    if(empty($pass)){
        $errors['pass'] = "New Password Is Required";
    }else{
        if($pass != $con_pass){
            $errors['con_pass'] = "new Password must Matches with Confirm  Password";
        }
    }


    if(empty($errors)){
        $file_name = 'file.txt';
        $db_file = fopen($file_name,'a');
        fwrite($db_file,"\n my Name is: $name \n email: $email \n room Selected: $room");
        fclose($db_file);

        $success = "Data Saved In File";

        //read data from file

        $db_file = fopen($file_name,'r');
        $data = fread($db_file,filesize($file_name));
        echo $data;
        fclose($db_file);
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
        }

        .container h2 {
            text-align: center;
        }

        .container div {
            margin-bottom: 6%;
        }
        span{
            color: red;
        }
        P{
            color: olivedrab;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h2>Add User</h2>
            <p><?=$success ?? '' ?></p>
            <div>
                <label for="">
                    Name: <input type="text" name="name" value="" />
                    <span><?=$errors['name'] ?? '' ?></span>
                </label>
            </div>
            <div>
                <label for="">
                    Email: <input type="email" name="email" value="" />
                    <span><?=$errors['email'] ?? '' ?></span>

                </label>
            </div>

            <div>
                <label for="">
                    Password: <input type="password" name="pass" value="" />
                    <span><?=$errors['pass'] ?? '' ?></span>

                </label>
            </div>

            <div>
                <label for="">
                    Confirm-password: <input type="password" name="con_pass" value="" />
                    <span><?=$errors['con_pass'] ?? '' ?></span>

                </label>
            </div>
            <div>
                <label for="">
                    Room No:
                    <select name="room" id="">
                        <option selected value="">Select Room</option>
                        <option value="Application1">Application1</option>
                        <option value="Application2">Application2</option>
                        <option value="cloud">cloud</option>
                    </select>
                    <span><?=$errors['room'] ?? '' ?></span>

                </label>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>