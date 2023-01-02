<head><meta http-equiv="content-type" content="text/html; charset=UTF-8"></head>
<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    //oracle data base address
    $db='';

    //enter user name & password
    $username = "";
    $password = "";

    //connect with oracle_db
    $connect = oci_connect($username, $password, $db);

    //oracle db connection error message
    if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
    }

    if(isset($_SESSION['EMAIL']))
    {
        $email = $_SESSION['EMAIL'];
        $pw = $_SESSION['PW'];

    }

    $sq = "SELECT * FROM CLIENT WHERE EMAIL='$email'";
    $std = oci_parse($connect, $sq);
    oci_execute($std);
    $row = oci_fetch_array($std, OCI_ASSOC);
    $CLI_NAME = empty($_POST['CLI_NAME'])?$row['CLI_NAME']:$_POST['CLI_NAME'];
    $PW = empty($_POST['PW'])?$row['PW']:$_POST['PW'];
    $EMAIL = empty($_POST['EMAIL'])?$row['EMAIL']:$_POST['EMAIL'];
    $PHONE = empty($_POST['PHONE_NUMBER'])?$row['PHONE_NUMBER']:$_POST['PHONE_NUMBER'];

    $sql = "UPDATE CLIENT SET CLI_NAME='$CLI_NAME', PW='$PW', REG_NUMBER=REG_NUMBER, PHONE_NUMBER='$PHONE', EMAIL='$EMAIL' WHERE EMAIL='$email'";

    $stid = oci_parse($connect,$sql);
    oci_execute($stid);
    
    $_SESSION['EMAIL'] = $EMAIL;
    $_SESSION['PW'] = $PW;
    oci_free_statement($stid);
    oci_close($connect);

    if($stid == true){
        echo "<script>alert('수정되었습니다.');
        location.href='mypage.php';</script>";
    }
?>

