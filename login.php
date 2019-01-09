<?php
require_once("conn.php");
if (isset($_POST['submit']))
{
    $id = $_POST['ID'];
    $pass = $_POST['password'];
    $query_check = mysqli_query($con, "select username, salt from tbl_user where username ='".$id."'");
    if(mysqli_num_rows($query_check)>0)
    {
        $data = mysqli_fetch_array($query_check, MYSQLI_ASSOC);
        $hash = md5($data['salt'].$pass.$data['salt']);
        echo " <form action='landing.php' method='post' id='send_hash'>
                <input type='hidden' name='pass_hash' value='".$hash."'/>
                <input type='hidden' name='pass_id' value='".$id."'/>";
        echo"<script>
            document.getElementById('send_hash').submit();
        </script>";
        //if($hash===$data['password'])
        //{
        //    header("location: landing.php");
        //}
        //else
        //{
        //    die("Password Salah");
        //}
    }
    else
    {
        die("Username tidak terdaftar");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
    <h1>Login</h1>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Login</p>

        <form action="" method="post" enctype="multipart/form-data">
            <table width="300" border="0">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" class="form_login" placeholder="Masukkan username" required /></td>
                </tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="text" name="password" class="form_login" placeholder="Masukkan Password" required /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="login" class="tombol_login" value="Login" /></td>
                </tr>

            </table>
        </form>
        <center>
            <a class="link" href="frmRegister.php">Register</a>
        </center>
    </div>

</body>

</html>