<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property int $mark
 * @property string $text
 * @property int|null $product_id
 *
 * @property Product $product
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'comment';
    }

    const SCENARIO_CREATE_COMMENT = 'create_comment';

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE_COMMENT => ['mark', 'text', 'product_id']
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $MAX_MARK = 5;
        return [
            [['user_id', 'date', 'mark', 'text'], 'required'],
            [['user_id', 'mark', 'product_id'], 'integer'],
            [['mark'], 'integer', 'min' => 1, 'max' => $MAX_MARK, 'message' => 'Неверный диапазон'],
            [['date'], 'safe'],
            [['text'], 'string', 'max' => 1000],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'mark' => 'Оценка',
            'text' => 'Отзыв',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Fills fields $date and $user_id.
     *
     * @return bool
     */
    public function fillMetadataAndSave(): bool
    {
        $this->date = date('Y-m-d H:i:s');
        $this->user_id = Yii::$app->user->id;

        return $this->save();
    }
}
