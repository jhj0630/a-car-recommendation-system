<?php
session_start();
session_destroy();

echo "
        <script>
                alert('로그아웃되었습니다.');location.href='main.php'
        </script>
";
?>
