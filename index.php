<?php
    session_start();
    require 'process.php';
    $auth = $_SESSION['auth'] ?? null;
    $userId = $_SESSION['userId'] ?? null;
    $userName = $_SESSION['userName'] ?? null;
    $userBirthday = $_SESSION['userBirthday'] ?? null;
    $userLoginTime = $_SESSION['userLoginTime'] ?? null;
    $newRegistration = $_SESSION['newRegistration'] ?? null;
    $userBirthdayCount = birthdayCount($userBirthday);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./style/style_index.css">
    <title>Красота и Здоровье</title>
</head>

<body>

    <header id="home" class="header">
        <div class="div-background-picture">
            <nav class="nav-menu">
                <ul class="nav-menu-list">
                    <li class="nav-menu-item"><a class="nav-menu-link" href="#services">Услуги</a></li>
                    <li class="nav-menu-item"><a class="nav-menu-link" href="#promo">Акции</a></li>
                    <li class="nav-menu-item"><a class="nav-menu-link" href="#comment">Отзывы</a></li>
                    <li class="nav-menu-item"><a class="nav-menu-link" href="#about">О нас</a></li>
                    <li class="nav-menu-item"><a class="nav-menu-link" href="#contacts">Контакты</a></li>
                </ul>
                <?php
                if (!$userName) { ?>
                    <div class="div-right-btn"><button class="button-enter"
                            onclick="location.href='login.php'">Войти</button></div>
                <?php
                } else { ?>
                    <div class="div-right-btn">Личный кабинет&nbsp&nbsp&nbsp<button class="button-enter"
                            onclick="location.href='logoff.php'">Выйти</button></div>
                <?php } ?>
            </nav>
            <div class="div-header">
                <div class="div-header-title"><?php echo $userName ? $userName . ' д' : 'Д'; ?>обро пожаловать в наш SPA-салон</div>
                <div class="div-header-title-name">Красота и Здоровье</div>
                <div class="div-header-title-user"> 
                    <?php echo $userName && $userBirthdayCount != 1 ? 'Ваш День рождения через ' . $userBirthdayCount : null; ?>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <?php if (!$newRegistration && $userBirthdayCount == 1) { ?>
            <div class="div-promo-birthday-sertificate">Мы Вас поздравляем и дарим в подарок сертификат</div>
            <section id="promo" class="section-birthday">
                <div class="div-promo-birthday">С Днем рождения!!!</div>
                <div class="div-promo-discont">
                    <div class="div-discont-percent">5%</div>
                    <div class="div-discont-title">на все услуги салона</div>
                </div>
            </section>
        <?php } ?>
        <?php if ($newRegistration) { ?>
            <section id="promo" class="section">
                <div class="div-promo-newuser">
                    <div class="div-promo-newuser-title">
                         До окончания Вашей персональной скидки в 10%<br>за регистрацию на нашем сайте 
                    </div>
                    <div class="div-promo-newuser-counter">
                        <?php echo discountCount($userLoginTime); ?>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php if (!$auth) {?>
        <section id="promo" class="section">
            <div class="div-main-title">Акции</div>
            <div class="div-promo">
                <img class="img-promo" src="images/black_fridey.png" alt="Черная пятница">
                <div class="div-promo-title">Скидки до 30% на все виды услуг</div>
                <div class="div-promo-time">Акция действует с 01.11.2025 до 15.12.2025</div>
                <button type="submit" class="button-subscribe" id="subscribe" 
                    onclick="location.href='<?php echo !$userName ? 'login.php' : 'discount.php' ?>'">Получить скидку</button>
            </div>
        </section>
        <?php } ?>
        <section id="services" class="section">
            <div class="div-main-title">Наши услуги</div>
            <div class="div-cards-services">
                <div class="div-card">Комплексный массаж
                    <img class="img-serveces" src="images/spa_pict_1.png" alt="Комплексный массаж">
                    <p class="description">Лучший способ для расслабления и снятия стресса</p>
                </div>
                <div class="div-card">Массаж шея+спина
                    <img class="img-serveces" src="images/spa_pict_2.png" alt="Массаж шея+спина">
                    <p class="description">Прорабатывает самые глубокие мышечные зажимы в области спины и шеи, снимает
                        болевые ощущения и напряжение, благотворно влияет на осанку</p>
                </div>
                <div class="div-card">Массаж лица и головы
                    <img class="img-serveces" src="images/spa_pict_3.png" alt="Массаж лица и головы">
                    <p class="description">Отлично подойдет для снятия напряжения</p>
                </div>
                <div class="div-card">Массаж ног
                    <img class="img-serveces" src="images/spa_pict_4.png" alt="Массаж ног">
                    <p class="description">Способствует улучшению кровообращения, нормализации обмена веществ,
                        активизации иммунных механизмов, избавляет от эффекта "усталых ног"</p>
                </div>
                <div class="div-card">Маслянный массаж
                    <img class="img-serveces" src="images/spa_pict_5.png" alt="Маслянный массаж">
                    <p class="description">Снимает нервное напряжение, дарит расслабление и легкий лимфодренажный эффект
                    </p>
                </div>
                <div class="div-card">Медовый массаж
                    <img class="img-serveces" src="images/spa_pict_6.png" alt="ММедовый массаж">
                    <p class="description">Позволяет очистить кожу от шлаков и токсинов, снять отечность, усилить
                        интенсивность оттока скапливающейся жидкости</p>
                </div>
                <div class="div-card">Stone массаж
                    <img class="img-serveces" src="images/spa_pict_7.png" alt="Stone массаж">
                    <p class="description">Массаж выполняется горячими нефритовыми камнями, оказывает глубокий
                        расслабляющий эффект, регулирует работу вегетативной нервной системы</p>
                </div>
                <div class="div-card">Скрабирование
                    <img class="img-serveces" src="images/spa_pict_8.png" alt="Скрабирование">
                    <p class="description">Процедура очищения и омоложения кожи, отшелушивание, глубокое очищение,
                        массаж, тонизирование и восстановление эпидермиса</p>
                </div>
                <div class="div-card">Обертование
                    <img class="img-serveces" src="images/spa_pict_9.png" alt="Обертование">
                    <p class="description">Создаёт парниковый эффект, который способствует проникновению активных
                        веществ в кожу</p>
                </div>
            </div>
        </section>
        <section id="subscribe" class="section">
            <div class="div-main-title">Записаться на сеанс</div>
            <form action="<?php echo !$userName ? "login.php" : "subscribe.php" ?>" metod="post" class="form-subscribe">
                <input type="text" class="input-subscribe" id="name" placeholder="Имя">
                <input type="tel" class="input-subscribe" id="rel" placeholder="+7 (000) 000-00-00">
                <button type="submit" class="button-subscribe" id="subscribe">Записаться</button>
            </form>
        </section>
        <section id="about" class="section">
            <div class="div-main-title">О нашем салоне</div>
            <div class="div-pictures">
                <img class="img-salon" src="images/spa_salon_1.png" alt="Фото салона">
                <img class="img-salon" src="images/spa_salon_2.png" alt="Фото салона">
                <img class="img-salon" src="images/spa_salon_5.png" alt="Фото салона">
                <img class="img-salon" src="images/spa_salon_3.png" alt="Фото салона">
                <img class="img-salon" src="images/spa_salon_4.png" alt="Фото салона">
            </div>
        </section>
        <section id="comment" class="section">
            <div class="div-main-title">Отзывы</div>
        </section>
    </main>

    <footer class="footer" id="contacts">
        <ul class="footer-ul-list">
            <li class="footer-ul-item"><a class="footer-ul-link" href="#home">Главная</a></li>
            <li class="footer-ul-item"><a class="footer-ul-link" href="#services">Услуги</a></li>
            <li class="footer-ul-item"><a class="footer-ul-link" href="#promo">Акции</a></li>
            <li class="footer-ul-item"><a class="footer-ul-link" href="#comment">Отзывы</a></li>
            <li class="footer-ul-item"><a class="footer-ul-link" href="#about">O нас</a></li>
            <li class="footer-ul-item"><a class="footer-ul-link" href="#contacts">Контакты</a></li>
        </ul>
    </footer>

</body>
</html>