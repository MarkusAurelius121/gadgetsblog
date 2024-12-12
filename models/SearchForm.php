<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

class SearchForm extends Model
{
    public $text;

    public function rules()
    {
        return [
            ['text', 'string', 'max' => 255],
            ['text', 'trim'],
        ];
    }

    /**
     * Пошук статей за текстом або тегами.
     */
    public function search() 
    {
        $query = Article::find()->joinWith('tags'); // Об'єднуємо статті та теги

        if ($this->text) {
            $query->andFilterWhere(['like', 'article.title', $this->text])
                ->orFilterWhere(['like', 'tag.title', $this->text]);
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);
    }
}
