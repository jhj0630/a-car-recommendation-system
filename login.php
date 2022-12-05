<html>

<head>
    <title>login page</title>
    <meta charset="utf-8">
    <style>
        @import url(//fonts.googleapis.com/earlyaccess/hanna.css);

        .hn {
            font-family: 'Hanna', sans-serif;
        }

        * {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family: sans-serif;
        }

        .top a {
            position: absolute;
            top: 10%;
            left: 6.5%;
            margin: 30px;
            color: #DC232D;
            font-size: 40;
            font-weight: bold;
        }

        body {
            background-color: #ffffff;
        }

        .loginForm {
            position: absolute;
            left: 28%;
            top: 50%;
            width: 40%;
            height: 500px;
            padding: 30px, 20px;
            background-color: #ffffff;
            text-align: center;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            color: #545454;
            background-color: #F5F5F5;
        }

        .loginForm h2 {
            text-align: left;
            margin-left: 50px;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 30;
        }

        .idForm {
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: 10px;
            padding: 10px 10px;
            background-color: #FFFFFF;
            border-radius: 5px;
        }

        .passForm {
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: 10px;
            padding: 10px 10px;
            background-color: #FFFFFF;
            border-radius: 5px;
        }

        .email {
            width: 100%;
            border: none;
            outline: none;
            color: #636e72;
            font-size: 16px;
            height: 40px;
            background: none;
        }

        .pw {
            width: 100%;
            border: none;
            outline: none;
            color: #636e72;
            font-size: 16px;
            height: 40px;
            background: none;
        }

        button {
            position: relative;
            left: 43%;
            transform: translateX(-50%);
            margin-bottom 40px;
            margin-top: 40px;
            width: 85%;
            height: 60px;
            background: linear-gradient(125deg, #DC232D, #7D1419, #1F0406);
            background-position: left;
            background-size: 200%;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.4s;
            display: inline;
        }

        button:hover {
            background-position: right;
        }

        .buttonText {
            text-align: center;
        }

        .banner {
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

        .banner h3 {
            position: absolute;
            top: 70%;
            left: 230px;
            color: #FFFFFF;
            font-size: 20;
        }

        .contents {
            text-align: center;
            position: absolute;
            top: 80%;
            left: 150px;
            color: #FFFFFF;
        }

        .banner img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <form class="top">
        <p class="hn"><a href="main.php">골라봐 차차차🚗🚓🚕</a></p>
    </form>
    <form method="post" action="login_check.php" class="loginForm">
        <h2>로그인</h2>
        <div class="idForm">
            <input type="text" class="email" name="email" placeholder="이메일 입력" required>
        </div>
        <div class="passForm">
            <input type="password" class="pw" name="pw" placeholder="비밀번호입력" required>
        </div>
        <div class="button">
            <button type="submit">로그인</button>
        </div>
        <div class="bottomText">
            아직 회원이 아니세요? <a href="signup.php" style="color: #DC232D">회원가입</a>
        </div>
    </form>
    <form class="banner">
        <img src="longin_banner_image.jpg" alt="Banner Image">
        <h3>자동차 추천 사이트</h3>
        <div class="contents">
            다양한 제조사와 모델들을 여기서 확인하세요!
        </div>
    </form>
</body>

</html>