<?php require 'header.php'?>

    <main class="main">
        <div class="container">
            <form class="RegistrationForm" method="POST" action="db.php">
                <p class="RegistrationText">Забыли пароль?</p>
                <div class="RegistrationInputs">

                    <div class="mail_container">
                        <input name="mail" class="InputClass mail" minlength="10" id="mail" type="text" placeholder="E-Mail">                   
                        <p style="display:none" class="error_mail" id="error_mail">*Адрес электронной почты введен неверно. Электронная почта может начинаться толЬко с буквы латинского алфавита. специальные знаки в имени не могут повторяться два и более раза подряд. Символ "@" может встречаться в адресе электронной почты только один раз. Пример адреса электронной почты: test.t123@mail.ru.</p>
                        <p style="display:none" class="error_mail_size" id="error_mail_size">*Pазмер адреса электронной почты менее 10 символов. Пример почты с минимальным количеством символов: ml@mail.ru.</p>
                    </div>

                    <div class="password_container">
                        <input name="password" type="password" class="InputClass password" id="password" placeholder="Пароль">
                        <label class="lablePass">
                            <input type="checkbox" onclick="checkbox_password()" class="show_password">
                            <p class="viewPassText">Показать пароль</p>
                        </label>
                        <p style="display:none" class="error_password" id="error_password">*Пароль введен неверно. Минимальная длина пароля 8 символов. Пароль должен содержать минимум одну цифру, по одной заглавной и строчную буквы латинского алфавита и один символ.</p>
                    </div>

                    <div class="rep_password_container">
                        <input type="password" class="InputClass" id="repeatPassword" placeholder="Подтверждение пароля">
                        <label class="lablePass">
                            <input type="checkbox" onclick="checkbox_rep_password()" class="show_password">
                            <p class="viewPassText">Показать пароль</p>
                        </label>
                        <p style="display:none" class="error_rep_password" id="error_rep_password">*Пароли не совпадают.</p>
                    </div>
                </div>

                <button disabled=true name="btn" onclick="buttonRegistration()" class="RegistrationButton" id="buttonRegistration">Войти</button>
                
                <div class="RegistrationHelp">
                    <a href="signin.php" class="RegistrationSignIn">Войти в аккаунт</a>
                </div>
            </form>
        </div>
    </main>
<?php require 'end.php'?>