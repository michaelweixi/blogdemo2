<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{
	public function attributes()
	{
		return array_merge(parent::attributes(),['authorName']);
	}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'update_time', 'author_id'], 'integer'],          
            [['title', 'content', 'tags','authorName'], 'safe'],
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
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => ['pageSize'=>10],
        	'sort'=>[
        			'defaultOrder'=>[
        					'id'=>SORT_DESC,        			
        			],
        			//'attributes'=>['id','title'],
        	],
        ]);

//         echo "<pre>";
//         print_r($dataProvider->getPagination());
        
//         echo "<hr>";
//         print_r($dataProvider->getSort());
//         echo "<hr>";
//         print_r($dataProvider->getCount());
//         echo "<hr>";
//         print_r($dataProvider->getTotalCount());
        
//         echo "</pre>";
//         exit(0);
        
        
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            //'id' => $this->id,
        	'post.id' => $this->id,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        $query->join('INNER JOIN','Adminuser','post.author_id = Adminuser.id');
        $query->andFilterWhere(['like','Adminuser.nickname',$this->authorName]);
        
        $dataProvider->sort->attributes['authorName'] = 
        [
        	'asc'=>['Adminuser.nickname'=>SORT_ASC],
        	'desc'=>['Adminuser.nickname'=>SORT_DESC],
        ];
        
        
        
        
        return $dataProvider;
    }
}

