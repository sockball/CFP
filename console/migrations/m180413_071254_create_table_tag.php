<?php

use yii\db\Migration;

/**
 * Class m180413_071254_create_table_tag
 */
class m180413_071254_create_table_tag extends Migration
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

        $this->createTable('pixiv_tag', [
            'id'         => $this->primaryKey(),
            'original'   => $this->string(50)->notNull()->unique()->comment('原标签'),
            'chinese'    => $this->string(50)->comment('译文, 暂预留'),
        ], $tableOptions);

        $this->addCommentOnTable('pixiv_tag', '标签表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pixiv_tag');
    }

}
