<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\PublicAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" data-bs-theme="dark">
        <div class="container">
            <!-- Логотип -->
            <a class="navbar-brand" href="/">
                <img src="/public/images/logo.jpg" alt="">
            </a>

            <!-- Кнопка для мобільного меню -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Основне меню -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute(['site/index']) ?>">Головна</a>
                    </li>
                </ul>

                <!-- Правий блок (Авторизація) -->
                <ul class="navbar-nav ms-auto text-uppercase">
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute(['auth/login']) ?>">Вхід</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute(['auth/signup']) ?>">Реєстрація</a>
                        </li>
                    <?php else: ?>
                        <?php if (Yii::$app->user->identity->isAdmin) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::toRoute(['admin/default/index']) ?>">Адмін-панель</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <?php
                            $logoutForm = Html::beginForm(['/auth/logout'], 'post', ['id' => 'logout-form'])
                                . Html::endForm();
                            echo $logoutForm;
                            ?>
                            <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit(); return false;">
                                ВИХІД
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

                </ul>
            </div>
        </div>
    </nav>

    <?= $content ?>

    <footer class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2024 Курсова робота <br> Розробник: Маховик Олександр</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>