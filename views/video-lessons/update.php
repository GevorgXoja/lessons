<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoLessons $model */

$this->title = 'Update Video Lessons: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Video Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-lessons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
