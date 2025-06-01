<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Libraries\Page;
use App\Models\Lbs\LokasiIklan;

class LokasiIklanController extends CrudController {

    protected $model = LokasiIklan::class;

    protected function getTitle()
    {
        return 'Lokasi Iklan';
    }

    protected function getSlug()
    {
        return 'lokasi-iklan';
    }

    protected function columns()
    {
        return [
            'nama' => [
                'label' => 'Nama'
            ],
            'alamat' => [
                'label' => 'Alamat'
            ],
            'kecamatan' => [
                'label' => 'Kecamatan'
            ],
            'kelurahan' => [
                'label' => 'Kelurahan'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function fields()
    {
        return [
            'nama' => [
                'label' => 'Nama',
                'type' => 'text'
            ],
            'alamat' => [
                'label' => 'Alamat',
                'type' => 'textarea'
            ],
            'kecamatan' => [
                'label' => 'Kecamatan',
                'type' => 'text'
            ],
            'kelurahan' => [
                'label' => 'Kelurahan',
                'type' => 'text'
            ],
            'lat' => [
                'label' => 'Latitute',
                'type' => 'text'
            ],
            'lng' => [
                'label' => 'Longitude',
                'type' => 'text'
            ],
        ];
    }

    public function create()
    {
        $page = new Page;
        $page->setTitle('Tambah ' . $this->getTitle());
        $page->setSlug($this->getSlug());
        $page->setBreadcrumbs([
            [
                'label' => $this->getTitle(),
                'url' => '/'.$this->getSlug()
            ],
            [
                'label' => 'Tambah Data',
                'url' => false
            ],
        ]);

        return $page->render('lbs/lokasi-iklan/form', [
            'data' => [],
            'fields' => $this->fields(),
            'columns' => $this->columns()
        ]);
    }

}