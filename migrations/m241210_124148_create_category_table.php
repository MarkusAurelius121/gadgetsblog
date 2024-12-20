<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m241127_165138_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() 
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
