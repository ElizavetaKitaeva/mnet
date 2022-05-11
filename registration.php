<?php 
    session_start();

    if ($_SESSION['user']) {
        header('Location: ../authUser/profile.php');
    }
?>
<?php require 'header.php'?>

    <main class="main">
        <div class="container">
            <form class="RegistrationForm" method="POST" action="inc/signup.php">
                <p class="RegistrationText">Регистрация</p>
                <div class="RegistrationInputs">

                    <div class="name_container">
                        <input name="name" class="InputClass name" maxlength="50" id="name" type="text" required placeholder="Имя">
                        <?php
                            if ( $_SESSION['messageName']) {
                                echo '<p class="error_name">' . $_SESSION['messageName'] . '</p>';
                            }
                            unset($_SESSION['messageName']);
                        ?>
                    </div>

                    <div class="last_name_container">
                        <input name="lastname"  class="InputClass lastName" maxlength="50" id="lastName" type="text" required placeholder="Фамилия">
                        <?php
                            if ( $_SESSION['messageLastName']) {
                                echo '<p  class="error_last_name">' . $_SESSION['messageLastName'] . '</p>';
                            }
                            unset($_SESSION['messageLastName']);
                        ?>
                    </div>

                    <div class="mail_container">
                        <input name="mail" class="InputClass mail" minlength="10" id="mail" type="text" required placeholder="E-Mail">
                        <?php
                            if ( $_SESSION['messageMail']) {
                                echo '<p  class="error_mail">' . $_SESSION['messageMail'] . '</p>';
                            }
                            unset($_SESSION['messageMail']);
                        ?>
                    </div>

                    <div class="password_container">
                        <input name="password" type="password" class="InputClass password" id="password" required placeholder="Пароль">
                        <label class="lablePass">
                            <input type="checkbox" onclick="checkbox_password()" class="show_password">
                            <p class="viewPassText">Показать пароль</p>
                        </label>
                        <?php
                            if ( $_SESSION['messagePass']) {
                                echo '<p  class="error_password">' . $_SESSION['messagePass'] . '</p>';
                            }
                            unset($_SESSION['messagePass']);
                        ?>
                    </div>

                    <div class="rep_password_container">
                        <input name="repassword" type="password" class="InputClass" id="repeatPassword" required placeholder="Подтверждение пароля">
                        <label class="lablePass">
                            <input type="checkbox" onclick="checkbox_rep_password()" class="show_password">
                            <p class="viewPassText">Показать пароль</p>
                        </label>
                            <?php
                                if ( $_SESSION['messageRepPass']) {
                                    echo '<p class="error_rep_password">' . $_SESSION['messageRepPass'] . '</p>';
                                }
                                unset($_SESSION['messageRepPass']);
                            ?>
                    </div>
                </div>

                <button type="submit" class="RegistrationButton">Зарегистрироваться</button>
                
                <div class="RegistrationHelp">
                    <a href="signin.php" class="RegistrationSignIn">Войти в аккаунт</a>
                </div>
            </form>
        </div>
    </main>
<?php require 'end.php'?>