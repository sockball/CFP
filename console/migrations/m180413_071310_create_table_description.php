<?php

use yii\db\Migration;

/**
 * Class m180413_071310_create_table_description
 */
class m180413_071310_create_table_description extends Migration
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

        $this->createTable('pixiv_desc', [
            'illustration'=> $this->integer()->notNull()->comment('illust id'),
            'original'    => $this->string(500)->comment('原作品说明'),
            'chinese'     => $this->string(500)->comment('译文, 暂预留'),
        ], $tableOptions);

        $this->addCommentOnTable('pixiv_desc', '插画说明表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pixiv_desc');
    }

}
