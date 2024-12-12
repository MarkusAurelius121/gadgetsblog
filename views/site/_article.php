<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\PublicAsset;
use yii\widgets\LinkPager;

/** @var $model app\models\Article */
PublicAsset::register($this);
?>
<article class="post">
    <div class="post-content"> 
        <h2>
            <a href="<?= Url::to(['site/view', 'id' => $model->id]) ?>">
                <?= Html::encode($model->title) ?>
            </a>
        </h2>
        <p><?= Html::encode($model->description) ?></p>
    </div>
</article>