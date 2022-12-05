<?php
header('Content-Type: text/html; charst=UTF-8');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8" />
    <title>mypage</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family: sans-serif;
        }

        body {
            background-color: #ffffff;
        }

        .inform {
            position: absolute;
            left: 28%;
            top: 50%;
            width: 40%;
            height: 500px;
            padding: 30px, 20px;
            background-color: #FFFFFF;
            text-align: center;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            color: #545454;
            background-color: #F5F5F5;
        }

        .inform h2 {
            text-align: left;
            margin-left: 50px;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 30;
        }

        .informtable {
            width: 90%;
            border-top: 1px solid #444444;
            border-bottom: 1px solid #444444;
            margin-left: 5%;
            margin-right: 5%;
            border-collapse: collapse;
        }

        .informtable td {
            padding: 15px;
        }

        .recomm {
            position: absolute;
            right: -10%;
            top: 50%;
            width: 40%;
            height: 500px;
            padding: 30px, 20px;
            background-color: #FFFFFF;
            text-align: center;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            color: #545454;
            background-color: #F5F5F5;
            text-align: left;
            overflow: hidden;
        }

        .recomm h2 {
            text-align: left;
            margin-left: 50px;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 30;
        }

        .recommtable {
            width: 90%;
            border-top: 1px solid #444444;
            border-bottom: 1px solid #444444;
            margin-left: 5%;
            margin-right: 5%;
            border-collapse: collapse;
        }

        .recommtable td {
            padding: 15px;
        }

        .recommtable button {
            float: right;
            margin-right: 5%;
            width: 100px;
            height: 30px;
            font-weight: bold;
            background: linear-gradient(125deg, #DC232D, #7D1419, #1F0406);
            background-position: left;
            background-size: 200%;
            border-radius: 20px;
            color: white;
            border: none;
            cursor: pointer;
        }

        #DeleteBtn {
            float: right;
            margin-right: 5%;
            width: 100px;
            height: 30px;
            font-weight: bold;
            background: linear-gradient(125deg, #DC232D, #7D1419, #1F0406);
            background-position: left;
            background-size: 200%;
            border-radius: 20px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .backhome {
            margin-top: 20px;
            margin-bottom: 30px;
            float: right;
            margin-right: 3%;
        }

        .inform a {
            float: right;
            margin-right: 5%;
            margin-top: 20px;
            width: 100px;
            height: 30px;
            font-weight: bold;
            background: linear-gradient(125deg, #DC232D, #7D1419, #1F0406);
            background-position: left;
            background-size: 200%;
            border-radius: 20px;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();

    //oracle data base address
    $db = '
    (DESCRIPTION=
            (ADDRESS_LIST=
                    (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
            )
            (CONNECT_DATA=
            (SID= orcl)
            )
    )';
    //enter user name & password

    $username = "db501group7";

    $password = "test1234";

    //connect with oracle_db
    $connect = oci_connect($username, $password, $db);

    if (isset($_SESSION['EMAIL'])) {
        $email = $_SESSION['EMAIL'];
        $pw = $_SESSION['PW'];
    }

    $sql = ("SELECT * FROM CLIENT WHERE EMAIL='$email'");
    $stid = oci_parse($connect, $sql);
    oci_execute($stid);

    $row = oci_fetch_array($stid, OCI_ASSOC);
    $reg_num = $row['REG_NUMBER'];

    $car = "SELECT MODEL FROM CLIENT_REC WHERE REG_NUMBER='$reg_num'";
    $std = oci_parse($connect, $car);
    oci_execute($std);
    ?>
    <div class="inform">
        <h2>회원정보</h2>
        <form action="">
            <table class="informtable">
                <tr>
                    <td>이름</td>
                    <td><?= $row['CLI_NAME'] ?></td>
                </tr>
                <tr>
                    <td>이메일</td>
                    <td><?= $row['EMAIL'] ?></td>
                </tr>
                <tr>
                    <td>주민등록번호</td>
                    <td><?= $row['REG_NUMBER'] ?></td>
                </tr>
                <tr>
                    <td>전화번호</td>
                    <td><?= $row['PHONE_NUMBER'] ?></td>
                </tr>
            </table>
            <a href="update.php">정보수정</a>
        </form>
    </div>
    <div class="recomm">
        <h2>추천 자동차</h2>
        <table class="recommtable">
            <?php
            while ($rows = oci_fetch_array($std, OCI_ASSOC)) {
            ?>
                <tr>
                    <td><?= $rows["MODEL"] ?></td>
                    <td>
                        <form action="delete_rec.php" method="post">
                            <input type="hidden" name="MODEL" value="<?= $rows['MODEL'] ?>">
                            <input type="submit" value="삭제" id="DeleteBtn">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="backhome">
        <a href="main.php" style="color:#DC232D">메인페이지</a>
    </div>
</body>

</html>