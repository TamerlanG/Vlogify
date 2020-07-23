<?php


namespace app\models;


use yii\base\Model;
use app\models\Comments;
use Yii;

class CommentForm extends Model {
    public $text;
    public $author_id;

    public function rules()
    {
        return [
            [['text'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'Message',
        ];
    }

    public function createComment($article_id){
        if($this->validate()){
            $comment = new Comments();
            $comment->attributes = $this->attributes;
            $comment->author_id = Yii::$app->user->id;
            $comment->article_id = $article_id;
            return $comment->create();
        }
    }
}
