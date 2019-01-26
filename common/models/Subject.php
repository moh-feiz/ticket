<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subject}}".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 *
 * @property Stream[] $streams
 * @property UserSubject[] $userSubjects
 * @property User[] $users
 */
class Subject extends \yii\db\ActiveRecord
{
    const DEACTIVE = 0 ;
    const ACTIVE = 1 ;
    public $user_id ;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subject}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['user_id'], 'safe'],

            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreams()
    {
        return $this->hasMany(Stream::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSubjects()
    {
        return $this->hasMany(UserSubject::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('{{%user_subject}}', ['subject_id' => 'id']);
    }

     /* static function get_subject(){
          $sql ="select * from subject";
          $subject = Yii::$app->db->createCommand($sql)->queryAll();
          return $subject;
      } */
    static function getSubject()
    {
        $subjects = Subject::find()->select('title')->indexBy('id')->column();
        return $subjects;
    }
    static function get_Subjects()
    {
        $sql = "select * from subject ";
        $subject = Yii::$app->db->createCommand($sql)->queryAll();
        return $subject;
    }
}
