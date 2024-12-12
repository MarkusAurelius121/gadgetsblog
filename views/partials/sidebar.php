<?php

use yii\helpers\Url;
?>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget widget-search">
            <?php $form = \yii\widgets\ActiveForm::begin([
                'method' => 'get',
                'action' => Url::to(['site/search']),
                'options' => ['class' => 'row g-3', 'role' => 'form'],
            ]); ?>
            <div class="col-auto">
                <?= $form->field(new \app\models\SearchForm(), 'text')->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Пошук статті',
                    'id' => 'searchInput'
                ])->label(false); ?>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    Пошук
                </button>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </aside>



        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Популярні пости</h3>
            <?php

            foreach ($popular as $article): ?>
                <div class="popular-post">
                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="popular-img"><img src="<?= $article->getImage(); ?>" alt="">

                        <div class="p-overlay"></div>
                    </a>

                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-uppercase"><?= $article->title ?></a>
                        <span class="p-date"><?= $article->getDate(); ?></span>

                    </div>
                </div>
            <?php endforeach; ?>

        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Останні пости</h3>
            <?php foreach ($recent as $article): ?>
                <div class="thumb-latest-posts">
                    <div class="media">
                        <div class="media-left">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="popular-img"><img src="<?= $article->getImage(); ?>" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-uppercase"><?= $article->title ?></a>
                            <span class="p-date"><?= $article->getDate(); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="<?= Url::toRoute(['site/category', 'id' => $category->id]); ?>"><?= $category->title ?></a>
                        <span class="post-count pull-right"> (<?= $category->getArticlesCount(); ?>)</span>
                    </li>
                <?php endforeach; ?>

            </ul>
        </aside>

    </div>

</div>