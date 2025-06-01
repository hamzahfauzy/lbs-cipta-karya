<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\Lbs\LokasiIklan;
use App\Models\Lbs\MediaIklan;
use CodeIgniter\Files\File;

class MediaIklanController extends CrudController {

    protected $model = MediaIklan::class;

    protected function getTitle()
    {
        return 'Media Iklan';
    }

    protected function getSlug()
    {
        return 'media-iklan';
    }

    protected function columns()
    {
        return [
            'nama_lokasi' => [
                'label' => 'Lokasi'
            ],
            'jenis' => [
                'label' => 'Jenis'
            ],
            'ukuran' => [
                'label' => 'Ukuran'
            ],
            'harga_sewa_format' => [
                'label' => 'Harga Sewa'
            ],
            'deskripsi' => [
                'label' => 'Deskripsi'
            ],
        ];
    }

    protected function details()
    {
        return [];
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
            'jenis' => [
                'label' => 'Jenis',
                'type' => 'select',
                'options' => [
                    'Billboard' => 'Billboard',
                    'Videotron' => 'Videotron',
                    'Spanduk' => 'Spanduk',
                ]
            ],
            'ukuran' => [
                'label' => 'Ukuran',
                'type' => 'text',
            ],
            'harga_sewa' => [
                'label' => 'Harga Sewa',
                'type' => 'number',
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'type' => 'textarea',
            ],
            'foto' => [
                'label' => 'Foto',
                'type' => 'file',
            ],
        ];
    }

    protected function beforeInsert($data)
    {
        $img = $this->request->getFile('foto');

        if (! $img->hasMoved()) {
            $data['foto'] = 'uploads/' . $img->store();
        }

        return $data;
    }
    
    protected function beforeUpdate($data)
    {
        if(isset($_FILES['foto']) && !empty($_FILES['foto']['name']))
        {
            $img = $this->request->getFile('foto');
    
            if ($img && !$img->hasMoved()) {
                $data['foto'] = 'uploads/' . $img->store();
            }
        }

        return $data;
    }

    protected function getModel()
    {
        $model = new $this->model;
        $model->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi, FORMAT(harga_sewa,0) harga_sewa_format')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id');
        return $model;
    }

}