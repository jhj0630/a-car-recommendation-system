<!DOCTYPE html>
<html lang="ko">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <form class="top">
        <h1>
            <title> 회원가입</title>
    </form>
    </h1>
    </form>
    <style>
        html {
            height: 100%;
        }

        body {
            margin: 0;
            height: 100%;
            background: white;
            font-family: Dotum, '돋움', Helvetica, sans-serif;
        }

        #header {
            padding-top: 100px;
            padding-bottom: 20px;
            text-align: center;
        }

        #wrapper {
            position: relative;
            height: 100%;
        }

        #content {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            width: 460px;
        }


        /* 입력폼 */

        input:focus {
            outline: none;
        }

        /*회원가입 글씨*/
        h3 {
            margin: 19px 0 8px;
            font-size: 40px;
            color: #545454;
            /*글씨 굵기*/
            font-weight: bold;
        }

        .box {
            font-weight: bold;
            color: #545454;
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: 10px;
            padding: 10px 10px;
            background-color: #ffffff;
            border-radius: 5px;
        }

        /*입력창*/
        .int {
            display: block;
            position: relative;
            width: 100%;
            height: 45px;
            border: none;
            background: #c2c2c2b9;
            font-size: 16px;

        }

        input {
            font-family: Dotum, '돋움', Helvetica, sans-serif;
        }

        select {
            width: 100%;
            height: 29px;
            font-size: 15px;
            background: #fff url(https://static.nid.naver.com/images/join/pc/sel_arr_2x.gif) 100% 50% no-repeat;
            background-size: 20px 8px;
            -webkit-appearance: none;
            display: inline-block;
            text-align: start;
            border: none;
            cursor: default;
            font-family: Dotum, '돋움', Helvetica, sans-serif;
        }

        /* 에러메세지 */

        .error_next_box {
            margin-top: 9px;
            font-size: 12px;
            color: red;
            display: none;
        }

        #alertTxt {
            position: absolute;
            top: 19px;
            right: 38px;
            font-size: 12px;
            color: red;
            display: none;
        }

        /* 버튼 */

        .btn_area {
            margin: 30px 0 91px;
        }

        #btnJoin {
            width: 100%;
            padding: 15px 0 17px;
            border: 0;
            cursor: pointer;
            color: #fff;
            border-radius: 20px;
            ;
            background-color: #DC232D;
            font-weight: bold;
            font-size: 30px;
            font-family: Dotum, '돋움', Helvetica, sans-serif;
        }

        #btnJoin:hover {
            background-position: right
        }

        .blank {
            height: 300px;
        }
    </style>
    <script language="javascript">
        function Validation() {
            //이메일 유효성검사
            var e_RegExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
            var n_RegExp = /^[가-힣]{2,15}$/; //이름 유효성검사 정규식
            var M_RegExp = /^[0-9]+/g; //숫자만 입력하는 정규식

            var jnumSum = 0; //objNum[i] * jnumplus[i] 더한 값


            var objEmail = document.getElementById("mail"); //메일
            var objName = document.getElementById("name"); //이름
            var mobile = document.getElementById("mobile"); //휴대폰 번호


            // ================ email 유효성검사 ================ //
            if (e_RegExp.value == '') { // 이메일 입력여부 검사
                alert("이메일을 입력해주세요.");
                objEmail.focus();
                return false;
            }

            if (!e_RegExp.test(objEmail.value)) { //이메일 유효성 검사
                alert("올바른 이메일 형식이 아닙니다.");
                objEmail.focus();
                return false;
            }

            // ================ 이름 유효성검사 ================ //
            if (objName.value == '') {
                alert("이름을 입력해주세요.");
                return false;
            }
            if (!n_RegExp.test(objName.value)) {
                alert("특수문자,영어,숫자는 사용할수 없습니다. 한글만 입력하여주세요.");
                    return false;
                } //================== 전화번호 유효성 검사==============//
                if (!M_RegExp.test(mobile.value)) {
                    alert("전화번호는 숫자만 입력할 수 있습니다.");
                    mobile.focus();
                    return false;
                }
            }
    </script>

</head>

<body>


    <!-- header -->
    <div id="header">
        <form class="join_form" method="post" action="insert_result.php" onsubmit=" return Validation()">
            <!-- wrapper -->
            <div id="wrapper">

                <!-- content-->
                <div id="content">

                    <!-- NAME-->
                    <div>
                        <h3 class="join_title">
                            <label for="id">회원가입</label>
                        </h3>
                        <span class="box int_name">
                            <p>이름 </p> <input type="text" id="name" name="CLI_NAME" class="int" maxlength="20" placeholder="이름을 입력하세요">
                        </span>
                        <span class="error_next_box"></span>
                    </div>

                    <!--Password-->
                    <div>
                        <h3 class="join_title">
                        </h3>
                        <span class="box int_password">
                            <p>비밀번호 </p><input type="password" id="PW" name="PW" class="int" maxlength="20" placeholder="비밀번호를 입력하세요">
                        </span>
                        <span class="error_next_box"></span>
                    </div>

                    <!--reg_number-->
                    <div>
                        <h3 class="join_title">
                        </h3>
                        <span class="box int_birth">
                            <p>주민등록번호 13 자리 </p><input type="text" id="birth" name="REG_NUMBER" class="int" size="8" maxlength="13" placeholder="생년월일(6자리)를 입력하세요">
                        </span>
                    </div>
                    <!-- MOBILE -->
                    <div>
                        <h3 class="join_title"><label for="phoneNo"></label></h3>
                        <span class="box int_mobile">
                            <p>휴대폰 번호 </p><input type="tel" id="mobile" name="PHONE_NUMBER" class="int" maxlength="16" placeholder="휴대폰 번호를 입력하
세요">
                        </span>
                        <span class="error_next_box"></span>
                    </div>


                    <!-- EMAIL -->
                    <div>
                        <h3 class="join_title"><label for="email"> <span class="optional"></span></label></h3>
                        <span class="box int_email">
                            <p>이메일 </p><input type="text" id="EMAIL" name="EMAIL" class="int" maxlength="100" placeholder="이메일 주소를 입력하세요">
                        </span>
                        <span class="error_next_box">이메일 주소를 다시 확인해주세요
                            .</span>
                    </div>
                    <!-- JOIN BTN-->
                    <div class="btn_area">
                        <script language="javascript">
                            window.screen.width
                            // 좌우 크기 반환 Ex) 1920

                            window.screen.height
                            // 상하 크기 반환, Ex) 1080

                            var popupWidth = 100;
                            var popupHeight = 30;

                            var popupX = (window.screen.width / 2) - (popupWidth / 2);
                            // 만들 팝업창 width 크기의 1/2 만큼 보정값으로 빼주었음
                            var popupY = (window.screen.height / 2) - (popupHeight / 2);
                            // 만들 팝업창 height 크기의 1/2 만큼 보정값으로 빼주었>음

                            //function showPopup(){window.open("popup.html","가입축>하 팝업창"," resizable=yes, height=' + popupHeight  + ', width=' + popupWidth  + ', left='+ popupX + ', top='+ popupY");}
                        </script>
                        <input type="submit" value="가입하기" id="btnJoin">
                        </input>

                    </div>
                    <div>
                        <div class="blank"></div>
                    </div>
                </div>
                <!-- content-->
        </form>
    </div>
    <!-- wrapper -->
</body>

</html>