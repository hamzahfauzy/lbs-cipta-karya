<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class LokasiStrategis extends Model {

    protected $table = 'tb_lokasi_strategis';
    protected $allowedFields = ['lokasi_id','lalu_lintas','keramaian','zonasi','total_skor','catatan'];

}