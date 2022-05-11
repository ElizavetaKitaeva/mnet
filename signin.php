<?php 
    session_start();

    if ($_SESSION['user']) {
        header('Location: ../authUser/profile.php');
    }
?>

<?php require 'header.php'?>
    <main class="main">
        <div class="container">
            <form class="SingInForm" method="POST" action="inc/signin.php">
                <p class="SignInText">Вход в аккаунт</p>
                <div class="SingInInputs">
                    <?php
                        if ( $_SESSION['errAuth']) {
                            echo '<p class="error">' . $_SESSION['errAuth'] . '</p>';
                        }
                        unset($_SESSION['errAuth']);
                    ?>
                    <input name="mail_s" class="InputClass email" id="mail" type="text" placeholder="E-Mail">
                    <div class="password_container">
                        <input name="password_s" type="password" class="InputClass password" id="password" placeholder="Пароль">
                        <label class="lablePass">
                            <input type="checkbox" onclick="checkbox_password()" class="show_password">
                            <p class="viewPassText">Показать пароль</p>
                        </label>
                    </div>
                </div>
                <div class="SingInHelp">
                    <a href="forgotPass.php" class="SignInForgotPass">Забыли пароль?</a>
                    <a href="registration.php" class="SignInRegistration">Регистрация</a>
                </div>
                <button type="submit" class="SignInButton">Вход</button>
                <?php
                    if ( $_SESSION['RegS']) {
                         echo '<p  class="RegS">' . $_SESSION['RegS'] . '</p>';
                    }
                     unset($_SESSION['RegS']);
                ?>
            </form>
        </div>
    </main>
<?php require 'end.php'?>