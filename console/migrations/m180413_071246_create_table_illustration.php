<?php

use yii\db\Migration;

/**
 * Class m180413_071246_create_table_illustration
 */
class m180413_071246_create_table_illustration extends Migration
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

        $this->createTable('pixiv_illustration', [
            'id'         => $this->primaryKey(),
            'pixiv'      => $this->integer()->notNull()->unique()->comment('illust id'),
            'title'      => $this->string(50),
            'url'        => $this->string(100)->comment('illust url'),
            'uptime'     => $this->dateTime()->comment('投稿时间'),
            'type'       => $this->tinyInteger(1)->defaultValue('1')->comment('单个为1, 多个作品为0并对应more表'),
            'width'      => $this->smallInteger(5)->comment('尺寸的宽'),
            'height'     => $this->smallInteger(5)->comment('尺寸的高'),
            'rank'       => $this->smallInteger(4)->comment('当日rank'),
            'illustrator'=> $this->integer()->notNull()->comment('画师id'),
        ], $tableOptions);

        $this->addCommentOnTable('pixiv_illustration', '插画信息表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pixiv_illustration');
    }

}
