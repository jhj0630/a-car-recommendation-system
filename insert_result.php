<?php
 header('Content-Type: text/html; charst=UTF-8');
?>
<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    //oracle data base address
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

    //oracle db connection error message
    if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
    }

    $CLI_NAME = $_POST['CLI_NAME'];
    $PW = $_POST['PW'];
    $REG_NUMBER = $_POST['REG_NUMBER'];
    $PHONE_NUMBER = $_POST['PHONE_NUMBER'];
    $EMAIL = $_POST['EMAIL'];

    $sql = "INSERT INTO client (CLI_NAME, PW, REG_NUMBER, PHONE_NUMBER, EMAIL)";
    $sql = $sql."VALUES('".$CLI_NAME."','".$PW."','".$REG_NUMBER."','".$PHONE_NUMBER."','".$EMAIL."')";

    $stid = oci_parse($connect,$sql);
    oci_execute($stid);
    
    oci_free_statement($stid);
    oci_close($connect);

    echo "<h1> 골라봐 차차차 회원님 환영합니다!!! </h1>";
    echo "<br> <a href='login.php'> 로그인 페이지로 돌아가기</a>";

?>
