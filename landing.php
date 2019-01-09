<?php
require_once("conn.php");
if (isset($_POST['pass_hash']))
{
    $hash = $_POST['pass_hash'];
    $id = $_POST['pass_id'];
    $query_check = mysqli_query($con, "select password from tbl_user where username ='".$id."'");
    $data = mysqli_fetch_array($query_check, MYSQLI_ASSOC);
    if($hash===$data['password'])
    {
        echo "Login Success";
    }
    else
    {
        die("Password Salah");
    }
}


?>