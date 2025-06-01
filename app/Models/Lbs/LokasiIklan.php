<?php

namespace App\Models\Lbs;

use CodeIgniter\Model;

class LokasiIklan extends Model {

    protected $table = 'tb_lokasi_iklan';
    protected $allowedFields = ['nama','lat','lng','alamat','kecamatan','kelurahan'];

}