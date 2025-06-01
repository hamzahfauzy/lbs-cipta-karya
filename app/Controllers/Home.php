<?php

namespace App\Controllers;

use App\Libraries\Page;
use App\Models\Lbs\LokasiIklan;
use App\Models\Lbs\LokasiStrategis;
use App\Models\Lbs\MediaIklan;
use App\Models\Lbs\Penyewaan;

class Home extends BaseController
{
    public function index(): string
    {
        $mediaIklan = (new MediaIklan())->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi, FORMAT(harga_sewa,0) harga_sewa_format')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id')->findAll();
        return view('landing', [
            'mediaIklan' => $mediaIklan
        ]);
    }

    public function dashboard(): string
    {
        $page = new Page;
        $page->setTitle('Dashboard');
        $page->setBreadcrumbs([
            [
                'label' => 'Dashboard',
                'url' => false
            ]
        ]);
        
        return $page->render('home/dashboard');
    }

    public function order()
    {
        $id = $_GET['id'];
        $media = (new MediaIklan())->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi, FORMAT(harga_sewa,0) harga_sewa_format')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id')->where('tb_media_iklan.id', $id)->first();

        return view('order', [
            'media' => $media
        ]);
    }
    
    public function doOrder()
    {
        $id = $_GET['id'];
        $tanggal_mulai = $this->request->getVar('tanggal_mulai');
        $tanggal_selesai = $this->request->getVar('tanggal_selesai');
        (new Penyewaan)->insert([
            'user_id' => session()->get('id'),
            'media_iklan_id' => $id,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status' => 'Pengajuan'
        ]);

        return redirect()->to('/penyewaan');
    }

    public function search()
    {
        $lokasiIklan = (new LokasiIklan())->findAll();
        $mediaIklan = (new MediaIklan())->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi, FORMAT(harga_sewa,0) harga_sewa_format')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id');

        if(isset($_GET['lokasi_id']))
        {
            $mediaIklan->where('lokasi_id', $_GET['lokasi_id']);
        }

        if(isset($_GET['lalu_lintas']) || isset($_GET['keramaian']) || isset($_GET['zonasi']))
        {
            $laluLintas = isset($_GET['lalu_lintas']) ? $_GET['lalu_lintas'] : '';
            $keramaian = isset($_GET['keramaian']) ? $_GET['keramaian'] : '';
            $zonasi = isset($_GET['zonasi']) ? $_GET['zonasi'] : '';

            $lokasiStrategis = (new LokasiStrategis())
                            ->where('lalu_lintas LIKE "%'.$laluLintas.'%"')
                            ->orWhere('keramaian LIKE "%'.$keramaian.'%"')
                            ->orWhere('zonasi LIKE "%'.$zonasi.'%"')
                            ->findAll();

            $lokasiIds = [];
            foreach($lokasiStrategis as $lokasi)
            {
                $lokasiIds[] = $lokasi['lokasi_id'];
            }

            $mediaIklan->whereIn('tb_lokasi_iklan.id', $lokasiIds);
        }

        return view('search', [
            'mediaIklan' => $mediaIklan->findAll(),
            'lokasiIklan' => $lokasiIklan
        ]);
    }
}
