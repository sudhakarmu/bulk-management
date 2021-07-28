<?php
include('database/dbconfig.php');
session_start();
if(isset($_POST['submit']))
    {
        $username = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $confirmpassword = htmlentities($_POST['confirmpassword']);
        $usertype = htmlentities($_POST['usertype']);
        mkdir('bulk/'.$email.'/', 0777, true);
        $targetDir1 = "bulk/$email/";
        $fileName1 = basename($_FILES["photo"]["name"]);
        $targetFilePath1 = $targetDir1 . $fileName1;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath1);
        mkdir('document/'.$email.'/', 0777, true);
        $targetDir2 = "document/$email/";
        $fileName2 = basename($_FILES["document"]["name"]);
        $targetFilePath2 = $targetDir2 . $fileName2;
        move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath2);
        mkdir('aadhar/'.$email.'/', 0777, true);
        $targetDir3 = "aadhar/$email/";
        $fileName3 = basename($_FILES["aadhar"]["name"]);
        $targetFilePath3 = $targetDir3 . $fileName3;
        move_uploaded_file($_FILES["aadhar"]["tmp_name"], $targetFilePath3);
        $sql = "SELECT * FROM users";
        $res = mysqli_query($con,$sql);
        $rw = mysqli_fetch_assoc($res);
        $petrol = $rw['petrol_price'];
        $address = $_POST['address'];
        $city = $_POST['city_select'];
        $state = $_POST['state_select'];
        if($password === $confirmpassword)
        {
            $query = "INSERT INTO users (`username`,`email`,`password`,`usertype`,`photo`,`document`,`aadhar`,`status`,`petrol_price`,`address`,`state`,`city`) VALUES('$username','$email','$password','$usertype','$targetFilePath1','$targetFilePath2','$targetFilePath3','0','$petrol','$address','$state','$city')";
            $result =  mysqli_query($con, $query);

            if($result)
            {
            $_SESSION['success'] = "Admin Profile added";
            header('location:register.php');
            }
            else
            {
            $_SESSION['status'] = "Admin Profile not added";
            header('location:register.php');
            }
        }
        else{
            echo "Password not matched";
        }
    }


if(isset($_POST['login_btn']))
{
    $email_login = htmlentities($_POST['username']);

    $password_login = htmlentities($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email_login' AND password='$password_login' AND status=1";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result)>0)
    {

        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $email_login;
        $_SESSION['name'] = $row['username'];

        if($row['usertype']=="admin")
        {
        $_SESSION['ROLE'] = "admin";
        header('location:dash.php');
        }
        if($row['usertype']=="owner")
        {
        $_SESSION['ROLE'] = "owner";
        header('location:dash.php');
        }

    }
    else
    {
        echo "Looks like an wrong Username/Password";
    }
}
if(isset($_POST['submit_customer']))
    {
        $username = htmlentities($_POST['username']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $confirmpassword = htmlentities($_POST['confirmpassword']);
        $usertype = htmlentities($_POST['usertype']);
        $phone = htmlentities($_POST['phone']);
        $city = htmlentities($_POST['city_select']);
        $state = htmlentities($_POST['state_select']);
        if($password === $confirmpassword)
        {
            $query = "INSERT INTO customer (`username`,`email`,`password`,`usertype`,`status`,`phone`.`city`,`state`) VALUES('$username','$email','$password','$usertype','1','$phone','$city','$state')";
            $result =  mysqli_query($con, $query);

            if($result)
            {
            $_SESSION['success'] = "Admin Profile added";
            header('location:signup.php');
            }
            else
            {
            $_SESSION['status'] = "Admin Profile not added";
            header('location:signup.php');
            }
        }
        else{
            echo "Password not matched";
        }
    }


if(isset($_POST['login_btn_customer']))
{
    $email_login = htmlentities($_POST['username']);

    $password_login = htmlentities($_POST['password']);

    $query = "SELECT * FROM customer WHERE email='$email_login' AND password='$password_login' AND status=1";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result)>0)
    {

        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $email_login;
        $_SESSION['name'] = $row['username'];

        if($row['usertype']=="customer")
        {
        $_SESSION['customer'] = "customer";
        header('location:index.php');
        }

    }
    else
    {
        echo "Looks like an wrong Username/Password";
    }
}


if(isset($_POST['book']))
{
    $customer_name = $_POST['username'];
    $bulk_name = $_POST['bulk_name'];
    $number = $_POST['phone'];
    $amount = ($_POST['litre']*$_POST['amount'])+$_POST['charge'];
    $address = $_POST['address'];
    $bulk_name = $_POST['bulk_name'];
    $litre = $_POST['litre'];
    $email  = $_SESSION['username'];
    $landmark = $_POST['landmark'];
    $location = $_POST['location'];

    if(empty($_POST['location'])){
        echo "<script>";
        echo "alert('Get the location first');";
        echo "window.location = 'index.php';"; // redirect with javascript, after page loads
        echo "</script>";
       }
       else
       {
    $query = "INSERT INTO orders (`customer_name`,`customer_number`,`customer_address`,`litres`,`amount`,`bulk_name`,`customer_email`,`landmark`,`location`) VALUES('$customer_name','$number','$address','$litre','$amount','$bulk_name','$email','$landmark','$location')";
    $result =  mysqli_query($con, $query);

    if($result)
    {
        echo "<script>";
        echo "alert('Booked');";
        echo "window.location = 'booked.php';"; // redirect with javascript, after page loads
		echo "</script>";
    }
    else
    {
        echo "<script>";
        echo "alert('Not booked');";
        echo "window.location = 'booked.php';"; // redirect with javascript, after page loads
		echo "</script>";
    }
}
}
?>