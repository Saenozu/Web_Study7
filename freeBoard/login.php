<?php
    include('./config.php');
    include('./db.php');

    if (isset($_SESSION['is_login'])) {
        echo "<meta http-equiv='refresh' content='0;url=./''>";
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        if ($_GET['mode']=="login" || $_GET['mode']=="") {
            echo "<title> 로그인 </title>";
        }
        if ($_GET['mode']=="register") {
            echo "<title> 회원가입 </title>";
        }
        if ($_GET['mode']=="find") {
            echo "<title> 비밀번호 찾기 </title>";
        }
        ?>
	    <link href="style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="#">
    </head>
    <body>
        <div id='login_wrap'>
            <div id='login_header'>
                <p id='login_header_sub_title'><a href='./'>2022 FREEBOARD</a></p>
                <h1 id='login_header_main_title'><a href='./'>SAENOZU</a></h1>
            </div>
            <div id='login_body'>
                <div id='login_content'>
                    <!--메뉴탭-->
                    <ul class='login_menu_wrap'>
                        <li class='login_menu_item' role='tablist'>
                            <a href="?mode=login" id="login" class="login_menu_login" role="tab" aria-selected="false">
                                <span class="login_menu_text">로그인</span>
                            </a>
                        </li>
                        <li class='login_menu_item' role='tablist'>
                            <a href="?mode=register" id="register" class="login_menu_register" role="tab" aria-selected="false">
                                <span class="login_menu_text">회원가입</span>
                            </a>
                        </li>
                        <li class='login_menu_item' role='tablist'>
                            <a href="?mode=find" id="find" class="login_menu_find" role="tab" aria-selected="false">
                                <span class="login_menu_text">비밀번호 찾기</span>
                            </a>
                        </li>
                    </ul>
                    <script>
                        var element_login = document.getElementsByClassName('login_menu_login')[0];
                        var element_register = document.getElementsByClassName('login_menu_register')[0];
                        var element_find = document.getElementsByClassName('login_menu_find')[0];
                    </script>
                    <?php 
                        if ($_GET['mode']=="login" || $_GET['mode']=="") { 
                            echo "<script>
                                element_login.classList.toggle('on', true);
                                element_login.ariaSelected = 'true';
                                element_register.classList.toggle('on', false);
                                element_register.ariaSelected = 'false';
                                element_find.classList.toggle('on', false);
                                element_find.ariaSelected = 'false';
                            </script>";
                    ?>
                    <!--로그인-->
                    <ul class='login_panel_wrap'>
                        <li class='login_panel_item'>
                            <div class='login_panel_inner' role='tabpanel'>
                                <form class='login_form' method='post' action=''>
                                    <div class='login_input_wrap'>
                                        <div class='login_input_row'><input type='text' class='login_input_text' name='login_user_id' placeholder='아이디'/></div>
                                        <div class='login_input_row'><input type='password' class='login_input_text' name='login_user_pass' placeholder='비밀번호'/></div>
                                    </div>
                                    <div class='login_notice'><p class='login_notice_text' style='display: none;'></p></div>
                                    <div class='login_btn_wrap'>
                                        <button type='submit' class='login_btn_submit' name='login_btn_login' id='login_btn_login' value='1'>
                                            <span class='login_btn_text'>로그인</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <?php } 
                        if ($_GET['mode']=="register") { 
                            echo "<script>
                                element_login.classList.toggle('on', false);
                                element_login.ariaSelected = 'false';
                                element_register.classList.toggle('on', true);
                                element_register.ariaSelected = 'true';
                                element_find.classList.toggle('on', false);
                                element_find.ariaSelected = 'false';
                            </script>";
                    ?>
                    <!--회원가입-->
                    <ul class='login_panel_wrap'>
                        <li class='login_panel_item'>
                            <div class='login_panel_inner' role='tabpanel'>
                                <form class='login_form' method='post' action=''>
                                    <div class='login_input_wrap'>
                                        <div class='login_input_row'><input type='text' class='login_input_text' name='login_register_user_id' placeholder='아이디'/></div>
                                        <div class='login_input_row'><input type='text' class='login_input_text' name='login_register_user_name' placeholder='이름'/></div>
                                        <div class='login_input_row'><input type='password' class='login_input_text' name='login_register_user_pass' placeholder='비밀번호'/></div>
                                        <div class='login_input_row'><input type='text' class='login_input_text' name='login_register_user_email' placeholder='이메일'/></div>
                                    </div>
                                    <div class='login_notice'><p class='login_notice_text' style='display: none;'></p></div>
                                    <div class='login_btn_wrap'>
                                        <button type='submit' class='login_btn_submit' name='login_btn_register' id='login_btn_register' value='1'>
                                            <span class='login_btn_text'>회원가입</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <?php }
                        if ($_GET['mode']=="find") {
                            echo "<script>
                                element_login.classList.toggle('on', false);
                                element_login.ariaSelected = 'false';
                                element_register.classList.toggle('on', false);
                                element_register.ariaSelected = 'false';
                                element_find.classList.toggle('on', true);
                                element_find.ariaSelected = 'true';
                            </script>";
                    ?>
                    <!--비밀번호찾기-->
                    <ul class='login_panel_wrap'>
                        <li class='login_panel_item'>
                            <div class='login_panel_inner' role='tabpanel'>
                                <form class='login_form' method='post' action=''>
                                    <div class='login_input_wrap'>
                                        <div class='login_find_text'>
                                            가입한 계정의 아이디 또는 이메일을 입력해주세요.
                                            <p class='login_notice_text' style='display: none;'></p>
                                        </div>
                                        <div class='login_input_row'><input type='text' class='login_input_text' name='login_find_user' placeholder='아이디 또는 이메일'/></div>
                                    </div>
                                    <div class='login_btn_wrap'>
                                        <button type='submit' class='login_btn_submit' name='login_btn_find' id='login_btn_find' value='1'>
                                            <span class='login_btn_text'>비밀번호 찾기</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
    <script>
        var notice = document.getElementsByClassName('login_notice_text');
        var find_timer = document.getElementById('login_find_timer');
        var btn_wrap = document.getElementsByClassName('login_btn_wrap');
        var login_form = document.getElementsByClassName('login_form')[0];
        var input_wrap = document.getElementsByClassName('login_input_wrap')[0];
        var input_row = document.getElementsByClassName('login_input_row');
        
        <?php

        function ereg_id($input) {
            if (ereg("^[A-Za-z0-9_\-]{6,15}$",$input)) { return 1; }
            else { return 0; }
        }
        function ereg_pass($input) {
            if (ereg("^[A-Za-z0-9~!@#%\$\-\+\*]{8,20}$",$input)) { return 1; }
            else { return 0; }
        }
        function ereg_name($input) {
            if (ereg("^[ㄱ-ㅎ가-힣a-zA-Z0-9]{1,30}$",$input)) { return 1; }
            else { return 0; }
        }
        function ereg_email($input) {
            if (ereg("^[A-Za-z0-9_\-]{1,64}@[[:alnum:]_\-]+\.(([A-Za-z]{2,3})|([A-Za-z]{2,3}\.[A-Za-z]{2,3}))$",$input)) { return 1; }
            else { return 0; }
        }

        if ($_POST['login_btn_login']) {
            $input_id = $_POST['login_user_id'];
            $query = "SELECT * FROM FreeBoard_Account WHERE id='$input_id' or password='$input_pass'";
            if (mysqli_num_rows($result = mysqli_query($conn, $query))) {
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION['is_login'] = true;
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    echo "location.href='./';";
                }
            }
        }
        if ($_POST['login_btn_register']) {
            $input_id = $_POST['login_register_user_id'];
            $input_name = $_POST['login_register_user_name'];
            $input_pass = $_POST['login_register_user_pass'];
            $input_email = $_POST['login_register_user_email'];
            //정규식 판별
            if(!ereg_id($input_id)) {
                echo "notice[0].innerHTML='아이디는 6~15자의 영문, 숫자, 특수기호( -, _ )만<br>사용 가능합니다.';";
                echo "notice[0].style.display='';";
            }
            else if(!ereg_name($input_name)) {
                echo "notice[0].innerHTML='이름은 1~10자 이내로 입력하셔야 합니다.';";
                echo "notice[0].style.display='';";
            }
            else if(!ereg_pass($input_pass)) {
                echo "notice[0].innerHTML='비밀번호는 8~20자의 영문, 숫자, 특수기호( ~, !, @, #, $, %, *, + )만<br>사용 가능합니다.';";
                echo "notice[0].style.display='';";
            }
            else if(!ereg_email($input_email)) {
                echo "notice[0].innerHTML='이메일 형식이 올바르지 않습니다.';";
                echo "notice[0].style.display='';";
            }
            if (ereg_id($input_id) && ereg_pass($input_pass) && ereg_name($input_name) && ereg_email($input_email)) {
                //중복 판별
                $query = "SELECT * FROM FreeBoard_Account WHERE id='$input_id' or email='$input_email'";
                if (mysqli_num_rows($result = mysqli_query($conn, $query))) {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['id'] == $input_id) {
                            echo "notice[0].innerHTML='이미 존재하는 아이디입니다.';";
                            echo "notice[0].style.display='';";
                            break;
                        }
                        else if ($row['Email'] == $input_email) {
                            echo "notice[0].innerHTML='이미 존재하는 이메일입니다.';";
                            echo "notice[0].style.display='';";
                        }
                    }
                }
                else {
                    $query = "INSERT INTO FreeBoard_Account(id, password, name, email) VALUES ('$input_id', '$input_pass', '$input_name', '$input_email')";
                    if ($result = mysqli_query($conn, $query)) {
                        echo "notice[0].innerHTML='회원가입에 성공했습니다. 로그인해 주세요.';";
                        echo "notice[0].style.color='#0BD41D';";
                        echo "notice[0].style.display='';";
                    }
                    else {
                        echo "notice[0].innerHTML='회원가입에 실패했습니다.';";
                        echo "notice[0].style.display='';";
                    }
                }
            }
        }
        if ($_POST['login_btn_find']) {
            $input = $_POST['login_find_user'];
            if (ereg_id($input) || ereg_email($input)) {
                $query = "SELECT * from FreeBoard_Account WHERE id='$input' OR email='$input'";
                if (mysqli_num_rows($result = mysqli_query($conn, $query))) { 
                    $_SESSION['uid_reset_pass'] = $input;
                    $_SESSION['uid_reset_time'] = time(); ?>
                    login_form.innerHTML = "<div class='login_input_wrap'><div class='login_input_row'></div><div class='login_input_row'></div><div>";
                    login_form.innerHTML += "<div class='login_notice'><p class='login_notice_text' style='display: none;'></p></div>";
                    login_form.innerHTML += "<div class='login_btn_wrap'></div>";
                    input_row[0].innerHTML = "<input type='password' class='login_input_text' name='login_reset_user_pass' placeholder='새 비밀번호'/>";
                    input_row[1].innerHTML = "<input type='password' class='login_input_text' name='login_reset_user_pass_check' placeholder='새 비밀번호 확인'/>";
                    btn_wrap[0].innerHTML = "<button type='submit' class='login_btn_submit' name='login_btn_reset' id='login_btn_reset' value='1'><span class='login_btn_text'>비밀번호 변경</span></button>";
                <?php
                } else {
                    echo "notice[0].innerHTML='존재하지 않는 계정입니다.';";
                    echo "notice[0].style.display='';";
                }
            } else {
                echo "notice[0].innerHTML='올바른 형식으로 입력해주세요.';";
                echo "notice[0].style.display='';";
            }
        }
        if ($_POST['login_btn_reset']) { //비밀번호 찾기
            $input_pass = $_POST['login_reset_user_pass'];
            $input_pass_check = $_POST['login_reset_user_pass_check'];
            if(ereg_pass($input_pass) && $input_pass == $input_pass_check) {
                if (ereg_id($_SESSION['uid_reset_pass'])) {
                    $query = "UPDATE FreeBoard_Account SET password='$input_pass' WHERE id='".$_SESSION['uid_reset_pass']."'";
                } else if(ereg_email($_SESSION['uid_reset_pass'])) {
                    $query = "UPDATE FreeBoard_Account SET password='$input_pass' WHERE email='".$_SESSION['uid_reset_pass']."'";
                }
                if ($result = mysqli_query($conn, $query)) {
                    echo "notice[0].innerHTML='비밀번호가 변경되었습니다.';";
                    echo "notice[0].style.color='#0BD41D';";
                    echo "notice[0].style.display='';";
                    unset($_SESSION['uid_reset_pass']);
                    unset($_SESSION['uid_reset_time']);
                }
                else { 
                    if (time() < $_SESSION['uid_reset_time'] * 60 * 10) {?>
                        login_form.innerHTML = "<div class='login_input_wrap'><div class='login_input_row'></div><div class='login_input_row'></div><div>";
                        login_form.innerHTML += "<div class='login_notice'><p class='login_notice_text' style='display: none;'></p></div>";
                        login_form.innerHTML += "<div class='login_btn_wrap'></div>";
                        input_row[0].innerHTML = "<input type='password' class='login_input_text' name='login_reset_user_pass' placeholder='새 비밀번호'/>";
                        input_row[1].innerHTML = "<input type='password' class='login_input_text' name='login_reset_user_pass_check' placeholder='새 비밀번호 확인'/>";
                        btn_wrap[0].innerHTML = "<button type='submit' class='login_btn_submit' name='login_btn_reset' id='login_btn_reset' value='1'><span class='login_btn_text'>비밀번호 변경</span></button>";

                        notice[0].innerHTML='다시 시도해 주세요.';
                        notice[0].style.display='';
                <?php
                    }
                    else {
                        echo "notice[0].innerHTML='다시 시도해 주세요.';";
                        echo "notice[0].style.display='';";
                    }
                }
            }
            else { ?>
                login_form.innerHTML = "<div class='login_input_wrap'><div class='login_input_row'></div><div class='login_input_row'></div><div>";
                login_form.innerHTML += "<div class='login_notice'><p class='login_notice_text' style='display: none;'></p></div>";
                login_form.innerHTML += "<div class='login_btn_wrap'></div>";
                input_wrap.innerHTML = "<div class='login_input_row'></div><div class='login_input_row'></div>";
                input_row[0].innerHTML = "<input type='password' class='login_input_text' name='login_reset_user_pass' placeholder='새 비밀번호'/>";
                input_row[1].innerHTML = "<input type='password' class='login_input_text' name='login_reset_user_pass_check' placeholder='새 비밀번호 확인'/>";
                btn_wrap[0].innerHTML = "<button type='submit' class='login_btn_submit' name='login_btn_reset' id='login_btn_reset' value='1'><span class='login_btn_text'>비밀번호 변경</span></button>";
            <?php
                if (!ereg_pass($input_pass)) {
                    echo "notice[0].innerHTML='비밀번호는 8~20자의 영문, 숫자, 특수기호( ~, !, @, #, $, %, *, + )만<br>사용 가능합니다.';";
                    echo "notice[0].style.display='';";
                }
                else if ($input_pass != $input_pass_check) {                    
                    echo "notice[0].innerHTML='비밀번호와 확인 비밀번호가 일치하지 않습니다.';";
                    echo "notice[0].style.display='';";
                }
            }
        }
        ?>
    </script>
</html>
