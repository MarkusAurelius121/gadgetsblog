<?php

use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Search Results54';
?>


<div class="main-content">
    <div class="container">
        <h1>Результати пошуку</h1>
        <aside class="widget widget-search">
            <?php $form = \yii\widgets\ActiveForm::begin([
                'method' => 'get',
                'action' => Url::to(['site/search']),
                'options' => ['class' => 'row', 'role' => 'form'],
            ]); ?>
            <div class="col-auto">
                <?= $form->field($searchForm, 'text')->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Search',
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


        <?php if ($dataProvider): ?>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_article',
                'layout' => "{items}\n{pager}",
            ]); ?>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</div>