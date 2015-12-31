<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Enquiry]].
 *
 * @see Enquiry
 */
class EnquiryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Enquiry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Enquiry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}