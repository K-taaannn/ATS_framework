<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Makanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default'    => "Se'i Sapi",
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'default'    => 0,
            ],
            'berat' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 250,
                'comment'    => 'Berat porsi dalam gram',
            ],
            'tingkat_pedas' => [
                'type'       => 'INT',
                'constraint' => 2,
                'default'    => 1,
                'comment'    => 'Level pedas skala 1-5',
            ],
            'rating' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,2',
                'default'    => 5.00,
            ],
            'terjual' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['tersedia', 'habis'],
                'default'    => 'tersedia',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('makanan');
    }

    public function down()
    {
        $this->forge->dropTable('makanan');
    }
}
