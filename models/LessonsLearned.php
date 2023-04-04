<?php
namespace app\models;


use yii\db\ActiveRecord;

class LessonsLearned extends ActiveRecord
{
    public static function tableName()
    {
        return 'lessons_learned';
    }
}