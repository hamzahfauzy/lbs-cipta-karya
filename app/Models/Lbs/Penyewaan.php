<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class Penyewaan extends Model {

    protected $table = 'tb_penyewaan';
    protected $allowedFields = ['user_id','media_iklan_id','tanggal_mulai','tanggal_selesai','status'];

}