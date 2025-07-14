<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\MediaIklan;
use App\Models\Lbs\Penyewaan;
use App\Models\User;

class PenyewaanController extends CrudController {

    protected $model = Penyewaan::class;

    protected function getTitle()
    {
        return 'Penyewaan';
    }

    protected function getSlug()
    {
        return 'penyewaan';
    }

    protected function getModel()
    {
        $model = new $this->model;
        $model->select('tb_penyewaan.*,users.name nama_penyewa, CONCAT(tb_media_iklan.jenis," ",tb_media_iklan.ukuran," - ",tb_lokasi_iklan.nama) media')
            ->join('users', 'users.id=tb_penyewaan.user_id')
            ->join('tb_media_iklan', 'tb_media_iklan.id=tb_penyewaan.media_iklan_id')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id');

        if(session()->get('role') == 'Penyewa')
        {
            $model->where('user_id', session()->get('id'));
        }
        return $model;
    }

    protected function columns()
    {
        return [
            'nama_penyewa' => [
                'label' => 'Penyewa'
            ],
            'media' => [
                'label' => 'Media'
            ],
            'tanggal_mulai' => [
                'label' => 'Tanggal mulai'
            ],
            'tanggal_selesai' => [
                'label' => 'Tanggal selesai'
            ],
            'status' => [
                'label' => 'Status'
            ],
            'pembayaran' => [
                'label' => 'Status Pembayaran'
            ],
            'keterangan_produk' => [
                'label' => 'Keterangan Produk'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function fields()
    {
        $users = (new User)->findAll();
        $userOptions = [0 => 'Pilih Penyewa'];
        foreach($users as $item)
        {
            $userOptions[$item['id']] = $item['name'];
        }
        
        $mediaIklan = (new MediaIklan)->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi,tb_penyewaan.tanggal_selesai')->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id')->join('tb_penyewaan','tb_penyewaan.media_iklan_id=tb_media_iklan.id')->where('tb_penyewaan.tanggal_selesai', date('Y-m-d'))->findAll();
        $mediaOptions = [0 => 'Pilih Media Iklan'];
        if($this->record)
        {
            $selectedMediaIklan = (new MediaIklan)->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi')->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id')->find($this->record['media_iklan_id']);
            $mediaOptions[$this->record['media_iklan_id']] = $selectedMediaIklan['nama_lokasi'] .' - '.$selectedMediaIklan['jenis'].' - '.$selectedMediaIklan['ukuran'].' - '.$selectedMediaIklan['harga_sewa'];
        }
        foreach($mediaIklan as $item)
        {
            $mediaOptions[$item['id']] = $item['nama_lokasi'] .' - '.$item['jenis'].' - '.$item['ukuran'].' - '.$item['harga_sewa'];
        }

        return [
            'user_id' => [
                'label' => 'Penyewa',
                'type' => 'select',
                'options' => $userOptions
            ],
            'media_iklan_id' => [
                'label' => 'Media Iklan',
                'type' => 'select',
                'options' => $mediaOptions
            ],
            'tanggal_mulai' => [
                'label' => 'Tanggal Mulai',
                'type' => 'date',
            ],
            'tanggal_selesai' => [
                'label' => 'Tanggal Selesai',
                'type' => 'date',
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'select',
                'options' => [
                    'Pengajuan' => 'Pengajuan',
                    'Aktif' => 'Aktif',
                    'Selesai' => 'Selesai',
                    'Di Batalkan' => 'Di Batalkan',
                ]
            ],
            'pembayaran' => [
                'label' => 'Status Pembayaran',
                'type' => 'select',
                'options' => [
                    'BELUM DIBAYAR' => 'BELUM DIBAYAR',
                    'SUDAH DIBAYAR' => 'SUDAH DIBAYAR',
                ]
            ],
            'keterangan_produk' => [
                'label' => 'Keterangan Produk',
                'type' => 'textarea',
            ],
        ];
    }

}