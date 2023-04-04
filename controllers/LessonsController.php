<?php

namespace app\controllers;

use app\models\Account;
use app\models\LessonsLearned;
use app\models\VideoLessons;
use Yii;
use yii\web\Controller;




class LessonsController extends Controller
{
    public function actionLessons()
    {
        $videoLesons = VideoLessons::find()->all();
        $lessonsLearned = LessonsLearned::find()->select(['lesson_id'])->where(['user_name' => Yii::$app->user->identity->username])->all();
//        $account = Account::find()->select(['lesson_number'])->where(['username' => Yii::$app->user->identity->username])->all();
        return $this->render('lessons', compact('videoLesons', 'lessonsLearned'));
    }

    public function actionLessonview($id)
    {
        $video = VideoLessons::findOne($id);
        return $this->render('lessonView', ['lesson'=> $video]);
    }
    public function actionCheckId(){
        if(\Yii::$app->request->isAjax){
            $getId =LessonsLearned::find()->select(['id'])->where(['user_name' => Yii::$app->user->identity->username, 'lesson_id'=>$_GET["idLesson"]])->all();

            if ($getId == null){
                $model = new LessonsLearned();
                $model->lesson_id = $_GET["idLesson"];
                $model->user_name = Yii::$app->user->identity->username;
                $model->save();
//                Account::find()->select('username' => Yii::$app->user->identity->username,)
            }
        }
//        $finish =Account::find()->select(['lesson_number'])->where(['username' => Yii::$app->user->identity->username]);
//        var_dump($finish);
    }

}
