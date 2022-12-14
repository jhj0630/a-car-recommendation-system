<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>mainpage</title>
    <style>
        ul.list {
            list-style-type: none;
        }

        nav>ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            float: right;
        }

        nav>ul>li {
            display: inline;
            margin: 0 20px 0 0;
        }

        * {
            margin: 10px;
            position: relative;
        }

        .search_com_wrap {
            margin-top: 30px;
        }

        .search_com_wrap_1 select {
            width: 140px;
            border-radius: 5px;
            background: #ffffff;
            font-size: small;
            height: 30px;
            line-height: 55px;
            text-align: left;
            padding: 0 20px 0 20px;
            margin-top: 1%;
        }

        .search_com_wrap_1 input {
            width: 100px;
            border-width: 1px;
            border-radius: 5px;
            background: #ffffff;
            font-size: small;
            height: 28px;
            line-height: 55px;
            text-align: left;
            font-weight: lighter;
            padding: 0 20px 0 10px;
            margin-top: 1%;
        }

        .MAIN_LOGO {
            text-align: center;
            margin-top: 50px;
        }

        .MAIN_LOGO a {
            font-size: 40px;
            font-weight: bold;
            ;
            text-decoration: none;
            color: #DC232D;
        }

        nav {
            margin-top: 40px;
            margin-bottom: 30px;
            float: right;
            margin-right: 3%;
        }

        .Condition {
            width: 100%;
            height: 150px;
            border-color: #919191;
            margin-top: 80px;
            background-color: #f4f4f4;
            border-radius: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .Ranking {
            border-top: 1px solid;
            border-color: #919191;
            float: center;
        }

        .condition_1 {
            width: 100%;
        }

        .txt {
            left: 4%;
            line-height: 50px;
            top: 10px;
            text-align: center;
            font-size: medium;
        }

        .condition_1 h2 {
            float: left;
            text-align: left;
            width: 100px;
            margin-left: 20px;
            margin-top: 20px;
            font-size: small;
            font-weight: normal;
        }

        .search_com_wrap_1 button {
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

        img {
            margin: 0px;
            float: left;
            width: 260px;
            height: 140px;
            object-fit: cover;
        }

        .result {
            left: 80px;
            float: left;
            width: 300px;
            height: 600px;
            border-radius: 15px;
            color: #545454;
            background-color: linear-gradient(125deg, #DC232D, #7D1419, #1F0406);
        }

        .Ranking,
        .push {
            height: 700px;
            width: 100%;
        }

        .Ranking_box {
            left: 100px;
            float: left;
            width: 300px;
            height: 600px;
            border-radius: 15px;
            color: #545454;
            background-color: #f4f4f4;
        }

        .content {
            background-color: #ffffff;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    //oracle data base address
    $db = '';

    //enter user name & password

    $username = "";

    $password = "";

    //connect with oracle_db
    $connect = oci_connect($username, $password, $db);

    if (!isset($_SESSION['EMAIL'])) {
        echo "<script>alert('????????? ??? ???????????????.');location.replace('login.php');</script>";
    } else {
        $email = $_SESSION['EMAIL'];
        $pw = $_SESSION['PW'];
    }
    ?>
    <header class="LOGO">
        <form class="MAIN_LOGO">
            <p class="hn"><a href="main.php">????????? ?????????????????????</a></p>
        </form>
    </header>
    <nav>
        <a href="mypage.php" style="color:#DC232D">???????????????<a></li>
                <a href="logout.php" style="color:#DC232D">????????????</a></li>
    </nav>
    <div style="height: 800;"></div>
    <div class="Ranking" style="font-weight: bold">
        <h4 style="text-align: center;"><b>??????</b></h4>
        <form class="Ranking_box">
            <?php
            $rank = 1;
            $sql = "SELECT * FROM (SELECT CAR.MODEL,CAR.PRICE,CAR.FUEL,CAR.FUEL_EFF,CAR.MF_NAME,RANK_MANAGER.RECOMM, CAR.IMG_NAME FROM CAR , RANK_MANAGER WHERE CAR.MODEL=RANK_MANAGER.MODEL ORDER BY RANK_MANAGER.RECOMM DESC) WHERE ROWNUM <= 4";
            $result = oci_parse($connect, $sql);
            oci_execute($result);

            if (!$result)
                echo "?????? DB ?????????(members)??? ?????? ???????????? ?????? ????????? ???
?????? ????????????!";
            else {
                while ($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
                    $MODEL = $row["MODEL"];
                    $PRICE = $row["PRICE"];
                    $FUEL = $row["FUEL"];
                    $FUEL_EFF = $row["FUEL_EFF"];
                    $MF_NAME = $row["MF_NAME"];
                    $IMG_NAME = $row["IMG_NAME"];
            ?>
                    <form class="Ranking_box">

                        <div style="float:left">
                            <form class="content">
                                <div>
                                    <?= $rank ?><span>??????</span>
                                    <div>
                                        <img src="<?= $IMG_NAME ?> " alt="???????????????">
                                    </div>
                                    <div>
                                        <h3 style="text-align: center;"><?= $MODEL ?></h3>
                                        <ul class="list" style="text-align:left;">
                                            <li style="text-align:left;">
                                                <p>?????????: <?= $MF_NAME ?></p>
                                            </li>
                                            <li>
                                                <p>??????: <?= $PRICE ?><span>???</span>
                                                </p>
                                            </li>
                                            <li>
                                                <p>??????: <?= $FUEL ?></p>
                                            </li>
                                            <li>
                                                <p>??????: <?= $FUEL_EFF ?> km/l</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
            <?php
                    $rank++;
                }
            }
            ?>
    </div>
    </div>
    <div class="push"></div>
    <div class="MAIN">
        <div class="Condition">
            <div class="condition_1">
                <h1 class="txt">??? ????????????</h1>
                <span class="search_com_wrap_1">
                    <center>
                        <form class="search" method="POST">
                            <h2 class="txt_point_all_car_cnt">?????? 50???</h2>
                            <select name="spanModel" id="spanModel1" tabindex="-1">
                                <option value="">?????????</option>
                                <option value="?????????">Audi</option>
                                <option value="??????">Benz</option>
                                <option value="BMW">BMW</option>
                                <option value="?????????">Chevrolet</option>
                                <option value="????????????">Genesis</option>
                                <option value="??????">Hyundai</option>
                                <option value="Kia">KIA</option>
                                <option value="Lexus">Lexus</option>
                                <option value="????????????">RenaultSamsung</option>
                                <option value="????????????">Volkswagen</option>
                            </select>
                            <select name="spanType" id="spanType1" tabindex="-1">
                                <option value="">??????</option>
                                <option value="?????????">?????????</option>
                                <option value="??????">??????</option>
                                <option value="?????????">?????????</option>
                                <option value="SUV">SUV</option>
                                <option value="??????">??????</option>
                                <option value="??????">??????</option>
                            </select>
                            <input type="number" name="spanYear" min="2020" max="2022" step="1" placeholder="??????">
                            <select name="spanFuel" id="spanFuel1" tabindex="-1">
                                <option value="">??????</option>
                                <option value="?????????">?????????</option>
                                <option value="??????">??????</option>
                                <option value="??????">??????</option>
                                <option value="??????">??????</option>
                                <option value="LPG">LPG</option>
                                <option value="???????????????">???????????????</option>
                            </select>
                            <input type="number" name="spanLowPrice" min="0" max="200000000" step="10000000" placeholder="????????????">
                            <input type="number" name="spanHighPrice" min="10000000" max="260000000" step="10000000" placeholder="????????????">
                            <button type="submit" class="btn_default" id="divBtnSearch">??????</button>
                        </form>
                        <div class="push2"></div>
                        <?php
                        $option1 = isset($_POST['spanModel']) ? $_POST['spanModel'] : false;
                        if ($option1) {
                            $MF_Name = $_POST['spanModel'];
                            $MF = array($MF_Name);
                        } else {
                            $MF = array('BMW', '?????????', '????????????', '???
?????????', 'Lexus', 'Kia', '??????', '????????????', '?????????', '??????');
                            $MF_Name = empty($MF) ? 'NULL' : "'" . join("','", $MF) . "'";
                        }
                        $MF_Name = empty($MF) ? 'NULL' : "'" . join("','", $MF) . "'";

                        $option2 = isset($_POST['spanType']) ? $_POST['spanType'] : false;
                        if ($option2) {
                            $Type = $_POST['spanType'];
                            $Types = array($Type);
                        } else {
                            $Types = array('?????????', '??????', '?????????', 'SUV', '??????', '??????');
                            $Type = empty($Types) ? 'NULL' : "'" . join("','", $Types) . "'";
                        }
                        $Type = empty($Types) ? 'NULL' : "'" . join("','", $Types) . "'";

                        $option3 = isset($_POST['spanYear']) ? $_POST['spanYear'] : false;
                        if ($option3) {
                            $Year = $_POST['spanYear'];
                            $Years = array($Year);
                        } else {
                            $Years = array(2020, 2021, 2022);
                        }
                        $Year = empty($Years) ? 'NULL' : "'" . join("','", $Years) . "'";

                        $option4 = isset($_POST['spanFuel']) ? $_POST['spanFuel'] : false;
                        if ($option4) {
                            $Fuel = $_POST['spanFuel'];
                            $Fuels = array($Fuel);
                        } else {
                            $Fuels = array('?????????', '??????', '??????', '?????????
??????', '??????', 'LPG');
                            $Fuel = empty($Fuels) ? 'NULL' : "'" . join("','", $Fuels) . "'";
                        }
                        $Fuel = empty($Fuels) ? 'NULL' : "'" . join("','", $Fuels) . "'";

                        $option7 = isset($_POST['spanLowPrice']) ? $_POST['spanLowPrice'] : false;
                        if ($option7) {
                            $LowPrice = $_POST['spanLowPrice'];
                        } else {
                            $LowPrice = 0;
                        }

                        $option8 = isset($_POST['spanHighPrice']) ? $_POST['spanHighPrice'] : false;
                        if ($option8) {
                            $HighPrice = $_POST['spanHighPrice'];
                        } else {
                            $HighPrice = 260000000;
                        }
                        $num = 1;
                        $sql = "SELECT * FROM car WHERE MF_NAME IN({$MF_Name}) AND TYPE IN({$Type}) AND YEAR IN({$Year}) AND FUEL IN({$Fuel}) AND PRICE >= '$LowPrice' AND PRICE <= '$HighPrice'";
                        $result = oci_parse($connect, $sql);
                        oci_execute($result);
                        if (!$result) {
                        } else {
                            while ($board = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                $MODEL = $board['MODEL'];
                                $MF_NAME = $board['MF_NAME'];
                                $TYPE =  $board['TYPE'];
                                $PRICE = $board['PRICE'];
                                $COLOR =  $board['COLOR'];
                                $POWER =  $board['POWER'];
                                $FUEL =  $board['FUEL'];
                                $FUEL_EFF =  $board['FUEL_EFF'];
                                $YEAR = $board['YEAR'];
                                $IMG_NAME = $board['IMG_NAME'];
                        ?>
                                <form class="result">
                                    <div style="float:left">
                                        <div>
                                            <img src=<?= $IMG_NAME ?> alt="?????????">
                                        </div>
                                        <div>
                                            <h3 style="text-align: center;"><?= $MODEL ?></h3>
                                            <ul class="res_list" style="text-align: left'">
                                                <li>
                                                    <p>?????????: <?= $MF_NAME ?></p>
                                                </li>
                                                <li>
                                                    <p>??????: <?= $TYPE ?></p>
                                                </li>
                                                <li>
                                                    <p>??????: <?= $YEAR ?></p>
                                                </li>
                                                <li>
                                                    <p>??????: <?= $PRICE ?>???
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>??????: <?= $FUEL ?></p>
                                                </li>
                                                <li>
                                                    <p>??????: <?= $FUEL_EFF ?>km/l</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
            </div>
            </form>
    <?php
                                $num++;
                            }
                        }
    ?>
    </center>


    </span>
        </div>
    </div>
    </div>
    </form>
    <?php
    oci_free_statement($result);
    oci_close($connect);
    ?>
</body>

</html>
