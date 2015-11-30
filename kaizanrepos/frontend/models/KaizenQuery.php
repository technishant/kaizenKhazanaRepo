<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Kaizen]].
 *
 * @see Kaizen
 */
class KaizenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kaizen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kaizen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}