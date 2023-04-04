<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoLessons $model */

$this->title = 'Create Video Lessons';
$this->params['breadcrumbs'][] = ['label' => 'Video Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-lessons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
