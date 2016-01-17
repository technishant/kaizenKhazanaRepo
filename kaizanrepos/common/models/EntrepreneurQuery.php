<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Entrepreneur]].
 *
 * @see Entrepreneur
 */
class EntrepreneurQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Entrepreneur[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Entrepreneur|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}