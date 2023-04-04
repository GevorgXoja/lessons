<?php
use  \assets\AppAsset;
?>
<div id="lesson-<?=$lesson->id?>">
    <div style="display: flex">
        <h5 id="number-lesson"><?=$lesson->id?>)</h5><h5><?= $lesson->lesson_title?></h5>
    </div>
    <iframe width="420" height="345" src="https://www.youtube.com/embed/<?= $lesson->video?>">
    </iframe>
    <p><?= $lesson->description?></p>

    <button id="btn-next-lesson" type="button" class="btn btn-success"><a href="/lessons">урок просмотрен</a></button>

    <div id="new-lesson"></div>
</div>
<?php
//$this->registerJsFile('@web/js/main.js', ['depends' => 'yii\web\YiiAsset']);
$js = <<<js
// let textData = 4;
$('#btn-next-lesson').on('click',function (){
    $.ajax({
                    url: '/check-id/1?textData',
                    data: {idLesson: "$lesson->id"},
                    type: "GET",
                    success: function(res){
                        console.log(res);
                        },
                    error: function(err){console.log(err);}
                });
})
js;
$this->registerJs ($js);
?>