<?php
    header('Content-Type: text/html; charst=UTF-8');
?>
<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();

    $db='
    (DESCRIPTION =
        (ADDRESS_LIST=
                (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
                )
                (CONNECT_DATA =
                (SID=orcl)
                )
    )';

    //enter user name & password
    $username = "db501group7";
    $password = "test1234";

    //connect with oracle_db
    $connect = oci_connect($username, $password, $db);

    if(isset($_SESSION['EMAIL']))
    {
        $email = $_SESSION['EMAIL'];
        $pw = $_SESSION['PW'];

    }

    $sql = ("SELECT * FROM CLIENT WHERE EMAIL='$email'");
    $stid = oci_parse($connect,$sql);
    oci_execute($stid);

    $row = oci_fetch_array($stid, OCI_ASSOC);
    $reg_num = $row['REG_NUMBER'];


    $DEL_CAR = $_POST["MODEL"];

    $sq = ("DELETE FROM CLIENT_REC WHERE MODEL='$DEL_CAR' AND REG_NUMBER='$reg_num'");
    $std = oci_parse($connect,$sq);
    oci_execute($std);

    if($std == true){
        echo "<script>alert('삭제되었습니다.');
        location.href='mypage.php';</script>";
    }
?>
