<?php

use creocoder\nestedsets\NestedSetsQueryBehavior;
namespace frontend\models;


/**
 * This is the ActiveQuery class for [[Menu]].
 *
 * @see Menu
 */
class MenuQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Menu[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Menu|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function behaviors() {
        return [
            \creocoder\nestedsets\NestedSetsQueryBehavior::className(),
        ];
    }

}
