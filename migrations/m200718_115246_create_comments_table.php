<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m200718_115246_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'article_id' => $this->integer(),
            'text' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        $this->createIndex(
            'idx-comment-author_id',
            'comments',
            'author_id'
        );

        $this->addForeignKey(
            'fk-comment-author_id',
            'comments',
                'author_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-comment-article_id',
            'comments',
            'article_id'
        );

        $this->addForeignKey(
            'fk-comment-article_id',
            'comments',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
