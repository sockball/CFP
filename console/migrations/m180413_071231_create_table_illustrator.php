<?php

use yii\db\Migration;

/**
 * Class m180413_071231_create_table_illustrator
 */
class m180413_071231_create_table_illustrator extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('pixiv_illustrator', [
            'id'        => $this->primaryKey(),
            'pixiv'     => $this->integer()->notNull()->unique()->comment('画师memberid'),
            'name'      => $this->string(50),
            'avatar'    => $this->string(100)->comment('头像url'),
        ], $tableOptions);

        $this->addCommentOnTable('pixiv_illustrator', '画师信息表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pixiv_illustrator');
    }
}
