<?php


namespace app\models;


use yii\base\Model;
use app\models\User;
use Yii;

class ArticleForm extends Model {
    public $title;
    public $content;
    public $author_id;

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
        ];
    }

    public function createArticle(){
        if($this->validate()){
            $article = new Articles();
            $article->attributes = $this->attributes;
            $article->author_id = Yii::$app->user->id;
            return $article->create();
        }
    }
}
