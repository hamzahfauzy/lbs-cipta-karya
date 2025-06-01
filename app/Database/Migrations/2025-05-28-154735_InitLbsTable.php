<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitLbsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'lat' => ['type' => 'VARCHAR', 'constraint' => 100],
            'lng' => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat' => ['type' => 'TEXT', 'constraint' => 100],
            'kecamatan' => ['type' => 'VARCHAR', 'constraint' => 100],
            'kelurahan' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_lokasi_iklan');

        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'lokasi_id'   => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'jenis' => ['type' => 'VARCHAR', 'constraint' => 100],
            'ukuran' => ['type' => 'VARCHAR', 'constraint' => 100],
            'harga_sewa' => ['type' => 'VARCHAR', 'constraint' => 100],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255],
            'deskripsi' => ['type' => 'TEXT', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('lokasi_id', 'tb_lokasi_iklan', 'id', '', 'RESTRICT', 'fk_tb_media_iklan_lokasi_id');
        $this->forge->createTable('tb_media_iklan');

        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'media_iklan_id'   => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'tanggal_mulai'       => ['type' => 'DATE'],
            'tanggal_selesai' => ['type' => 'DATE'],
            'status'    => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'RESTRICT', 'fk_tb_penyewaan_user_id');
        $this->forge->addForeignKey('media_iklan_id', 'tb_media_iklan', 'id', '', 'RESTRICT', 'fk_tb_penyewaan_media_iklan_id');
        $this->forge->createTable('tb_penyewaan');

        $this->forge->addField([
            'id'   => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'lokasi_id'   => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'lalu_lintas' => ['type' => 'VARCHAR', 'constraint' => 100],
            'keramaian' => ['type' => 'VARCHAR', 'constraint' => 100],
            'zonasi' => ['type' => 'VARCHAR', 'constraint' => 100],
            'total_skor' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'catatan' => ['type' => 'TEXT', 'constraint' => 100, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('lokasi_id', 'tb_lokasi_iklan', 'id', '', 'RESTRICT', 'fk_tb_lokasi_strategis_lokasi_id');
        $this->forge->createTable('tb_lokasi_strategis');
    }

    public function down()
    {
        $this->forge->dropTable('tb_lokasi_iklan');
        $this->forge->dropTable('tb_media_iklan');
        $this->forge->dropTable('tb_penyewaan');
        $this->forge->dropTable('tb_lokasi_strategis');
    }
}
