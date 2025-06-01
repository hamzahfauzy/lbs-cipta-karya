<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class MediaIklan extends Model {

    protected $table = 'tb_media_iklan';
    protected $allowedFields = ['lokasi_id','jenis','ukuran','harga_sewa','foto','deskripsi'];

}