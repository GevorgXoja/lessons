<?php
namespace app\models;


use yii\db\ActiveRecord;

class VideoLessons extends ActiveRecord
{
    public static function tableName()
    {
        return 'video_lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categories', 'lesson_title', 'description', 'video'], 'required'],
            [['description'], 'string'],
            [['categories', 'lesson_title', 'video'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categories' => 'Categories',
            'lesson_title' => 'Lesson Title',
            'description' => 'Description',
            'video' => 'Video',
        ];
    }

}