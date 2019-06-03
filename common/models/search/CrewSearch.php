<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Crew;

/**
 * CrewSearch represents the model behind the search form about `common\models\Crew`.
 */
class CrewSearch extends Crew
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_perk'], 'integer'],
            [['name_en', 'name_ru', 'description_ru', 'description_en', 'skill_name', 'next_tanks', 'images'], 'safe'],
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
        $query = Crew::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_perk' => $this->is_perk,
        ]);

        $query->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'skill_name', $this->skill_name])
            ->andFilterWhere(['like', 'next_tanks', $this->next_tanks])
            ->andFilterWhere(['like', 'images', $this->images]);

        return $dataProvider;
    }
}
