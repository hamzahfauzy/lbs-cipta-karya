<?php

namespace App\Controllers\Lbs;

use App\Libraries\Page;
use App\Controllers\BaseController;

class KeuanganController extends BaseController {

    function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT 
                    users.name user_name,
                    tb_penyewaan.tanggal_mulai, 
                    tb_media_iklan.harga_sewa
                FROM tb_penyewaan 
                LEFT JOIN tb_media_iklan ON tb_media_iklan.id = tb_penyewaan.media_iklan_id
                LEFT JOIN users ON users.id = tb_penyewaan.user_id
                WHERE tb_penyewaan.pembayaran = 'SUDAH DIBAYAR'";
        $query = $db->query($sql);
        $keuangan = $query->getResultArray();

        $page = new Page;
        $page->setTitle('Laporan Keuangan');
        $page->setBreadcrumbs([
            [
                'label' => 'Laporan Keuangan',
                'url' => false
            ]
        ]);
        
        return $page->render('keuangan', [
            'keuangan' => $keuangan
        ]);
    }
}