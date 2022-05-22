<?php

header('Content-Type: text/html; charset=UTF-8');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание_5_login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-dark">
    <div class="container-fluid">
        
        <div class="items d-flex flex-column">
            <div class="row d-flex flex-row justify-content-center mt-3 order-sm-3">
                <div class="col-sm-9 content">
                    <div class="items d-flex flex-column ">
                        <div id="form" class="order-sm-3">
                            <center>
                                <a href="index.php"><p>форма</p></a>
                                <h2 class="text-center">Авторизация</h2>
                                <?php 

                                if(isset($_COOKIE['login_error'])){
                                    echo "<p>" . $_COOKIE['login_error'] . "</p>";

                                   // setcookie('login_error', '', time() - 1);
                                }
                                ?>
                             </center>
                             <form action="?" method="post">
                                <label>
                                    Логин:<br />
                                    <input name="login" <?php echo (isset($_COOKIE['login']) ? "value='" . $_COOKIE['login'] . "'" : ""); ?>/>
                                </label><br />
                                <label>
                                    Пароль:<br />
                                    <input name="password" type="password" />
                                </label><br />
                                <input type="submit" value="Войти" />
                             </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php

}elseif(isset($_POST['login'], $_POST['password'])){

    $user = 'u47507';
    $pass = '2613634';
    $db = new PDO('mysql:host=localhost;dbname=u47507', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

    $login = $_POST['login'];
    $password = md5(str_replace(" ", "", $_POST['password']));
  
    $data = $db->query("SELECT * FROM user_pass where login = '$login'");
    $res = $data->fetchALL();

    if(isset($res[0]) && $res[0]['password'] == $password){

        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $password;
        $_SESSION['id'] = $res[0]['id'];

        header('Location: index.php');

        exit();
    }else{
        setcookie('login_error', "User NOT FOUND", time() + 100000);
        header('Location: ?');
    }

}else{
    setcookie('login_error', "Little DATA!", time() + 100000);
    header('Location: ?');

}