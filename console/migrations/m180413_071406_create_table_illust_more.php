<?php

use yii\db\Migration;

/**
 * Class m180413_071406_create_table_illust_more
 */
class m180413_071406_create_table_illust_more extends Migration
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

        $this->createTable('pixiv_illust_more', [
            'illustration'  => $this->integer()->notNull()->comment('原标签'),
            'url'           => $this->string(100)->comment('illust url'),
            'width'         => $this->smallInteger(5)->comment('尺寸的宽'),
            'height'        => $this->smallInteger(5)->comment('尺寸的高'),
        ], $tableOptions);

        $this->addCommentOnTable('pixiv_illust_more', '一次投稿多个作品对应表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pixiv_illust_more');
    }
}
