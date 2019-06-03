<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tanks;

/**
 * TanksSearch represents the model behind the search form about `common\models\Tanks`.
 */
class TanksSearch extends Tanks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tank_id', 'is_premium', 'price_credit', 'price_gold', 'tier'], 'integer'],
            [['name_en', 'name_ru', 'description_ru', 'description_en', 'nation', 'next_tanks', 'prices_xp', 'short_name_en', 'short_name_ru', 'tag', 'type', 'images', 'packages'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tanks::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 500,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tank_id' => $this->tank_id,
            'is_premium' => $this->is_premium,
            'price_credit' => $this->price_credit,
            'price_gold' => $this->price_gold,
            'tier' => $this->tier,
        ]);

        $query->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'next_tanks', $this->next_tanks])
            ->andFilterWhere(['like', 'prices_xp', $this->prices_xp])
            ->andFilterWhere(['like', 'short_name_en', $this->short_name_en])
            ->andFilterWhere(['like', 'short_name_ru', $this->short_name_ru])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'images', $this->images]);

        return $dataProvider;
    }
}
