<?php
$db='';

$username = "";
$password = "";

$connect = oci_connect($username, $password, $db);

$email = $_POST['email'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM client WHERE EMAIL='$email'";
$result = oci_parse($connect, $sql);
oci_execute($result);

$row = oci_fetch_array($result, OCI_ASSOC);
$hashpw = $row['PW'];
if($pw == $hashpw)
{
        session_start();
        $_SESSION['EMAIL'] = $row['EMAIL'];
        $_SESSION['PW']=$row['PW'];

        echo "<script>alert('로그인 되었습니다!'); location.href='main.php';</script>";
}
else
{       echo "<script>alert('이메일 또는 비밀번호를 확인하세요.'); history.back();</script>";
}
?>
