<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OffersMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'hotel_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'hotel_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'unsigned' => true,
            ],
            'source' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'country_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'city_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'zip' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'latitude' => [
                'type' => 'DECIMAL',
                'constraint' => '8,6',
            ],
            'longitude' => [
                'type' => 'DECIMAL',
                'constraint' => '9,6',
            ],
            'star' => [
                'type' => 'TINYINT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);

        $this->forge->createTable('offers');
    }

    public function down()
    {
        $this->forge->dropTable('offers');
    }
}
