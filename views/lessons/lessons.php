<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Lessons';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
//var_dump($lessonsLearned[0]['lesson_id']);
//    var_dump($lessonsLearned[0]['user_id']);
//?>

<?php
if(Yii::$app->user->identity->username == 'admin' ){
    echo Html::a('Your Button Label for Admin',
        ['/video-lessons', 'id' => $model->id],
        ['class' => 'btn btn-primary']);
}
?>


<?php
$finish = 0;
?>
<div>
    <h2>Видео Уроки</h2>
    <?php foreach( $videoLesons as $v): ?>
    <div>
        <div id="lesson-<?=$v->id?>" style="border-bottom: 1px solid #d5d5d5;
    list-style-type: none;
    padding: 10px;
    margin: 0;
    cursor: pointer;
    position: relative;">
            <a href="/lessonView/<?=$v->id?>"><?=$v->lesson_title?></a>
            <img src="<?php  foreach ($lessonsLearned as $k) {
                if ($k->lesson_id == $v->id){
                    echo('https://w7.pngwing.com/pngs/437/512/png-transparent-check-mark-computer-icons-right-or-wrong-miscellaneous-angle-text.png');
                    $finish++;
                }
            }?> " alt="" style="width: 2%; margin-left: 6px;" >
        </div>
    </div>
    <h4 style="text-align: center; display: none">Поздравляю вы прошли все курсы </h4>
    <?php endforeach;?>
</div>

<?php
if ($finish==6){
    ?>
    <h4 style=" text-align: center; color: green">вы прошли все уроки</h4><?php
}
?>