<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\LokasiIklan;
use App\Models\Lbs\LokasiStrategis;

class LokasiStrategisController extends CrudController {

    protected $model = LokasiStrategis::class;

    protected function getTitle()
    {
        return 'Lokasi Strategis';
    }

    protected function getSlug()
    {
        return 'lokasi-strategis';
    }

    protected function columns()
    {
        return [
            'nama_lokasi' => [
                'label' => 'Lokasi'
            ],
            'lalu_lintas' => [
                'label' => 'Lalu Lintas'
            ],
            'keramaian' => [
                'label' => 'Keramaian'
            ],
            'zonasi' => [
                'label' => 'Zonasi'
            ],
            'catatan' => [
                'label' => 'Catatan'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function getModel()
    {
        $model = new $this->model;
        $model->select('tb_lokasi_strategis.*, tb_lokasi_iklan.nama nama_lokasi')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_lokasi_strategis.lokasi_id');
        return $model;
    }

    protected function fields()
    {
        $lokasi = (new LokasiIklan)->findAll();
        $lokasiOptions = [0 => 'Pilih Lokasi'];
        foreach($lokasi as $item)
        {
            $lokasiOptions[$item['id']] = $item['nama'];
        }

        return [
            'lokasi_id' => [
                'label' => 'Lokasi',
                'type' => 'select',
                'options' => $lokasiOptions
            ],
            'lalu_lintas' => [
                'label' => 'Lalu Lintas',
                'type' => 'select',
                'options' => [
                    'Sangat Ramai' => 'Sangat Ramai',
                    'Ramai' => 'Ramai',
                    'Sedang' => 'Sedang',
                    'Sepi' => 'Sepi',
                    'Sangat Sepi' => 'Sangat Sepi',
                ]
            ],
            'keramaian' => [
                'label' => 'Keramaian',
                'type' => 'select',
                'options' => [
                    'Zona Super Ramai' => 'Zona Super Ramai',
                    'Ramai' => 'Ramai',
                    'Biasa Aja' => 'Biasa Aja',
                    'Sepi' => 'Sepi',
                    'Tidak ada aktivitas' => 'Tidak ada aktivitas',
                ]
            ],
            'zonasi' => [
                'label' => 'Zonasi',
                'type' => 'select',
                'options' => [
                    'Zona Komersial Resmi' => 'Zona Komersial Resmi',
                    'Zona Komersial Biasa' => 'Zona Komersial Biasa',
                    'Zona Campuran' => 'Zona Campuran',
                    'Zona Terbatas' => 'Zona Terbatas',
                    'Zona Terlarang' => 'Zona Terlarang',
                ]
            ],
            'catatan' => [
                'label' => 'Catatan',
                'type' => 'textarea',
            ],
        ];
    }

}