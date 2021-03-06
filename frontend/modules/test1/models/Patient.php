<?php

namespace frontend\modules\test1\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $cid
 * @property string $name
 * @property string $lname
 * @property string $birth
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['name', 'lname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'name' => 'Name',
            'lname' => 'Lname',
            'birth' => 'Birth',
        ];
    }
}
