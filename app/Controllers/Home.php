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
        $db = \Config\Database::connect();
        $sql = "
            SELECT tb_media_iklan.*, tb_lokasi_iklan.nama AS nama_lokasi, FORMAT(harga_sewa,0) AS harga_sewa_format, tb_penyewaan.tanggal_selesai
            FROM tb_media_iklan
            JOIN tb_lokasi_iklan ON tb_lokasi_iklan.id = tb_media_iklan.lokasi_id
            LEFT JOIN tb_penyewaan ON tb_penyewaan.id = (
                SELECT id FROM tb_penyewaan
                WHERE tb_penyewaan.media_iklan_id = tb_media_iklan.id
                ORDER BY tanggal_selesai DESC
                LIMIT 1
            )
        ";
        $query = $db->query($sql);
        $mediaIklan = $query->getResultArray();

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
        $mediaIklan = (new MediaIklan)->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi, FORMAT(harga_sewa,0) harga_sewa_format, tb_penyewaan.tanggal_selesai')
            ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id')
            ->join('tb_penyewaan','tb_penyewaan.media_iklan_id=tb_media_iklan.id')
            ->where('tb_media_iklan.id', $id)->first();

        // if($mediaIklan && $mediaIklan['tanggal_selesai'] > $tanggal_mulai)
        // {
        //     return redirect()->to('/penyewaan')->with('errors', 'Maaf! Media iklan pada tanggal yang dipesan masih dalam kontrak. Silahkan pilih tanggal yang lain');
        // }

        $img = $this->request->getFile('bukti_pembayaran');

        $data = [
            'user_id' => session()->get('id'),
            'media_iklan_id' => $id,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status' => 'Pengajuan',
            'pembayaran' => 'BELUM DIBAYAR'
        ];

        if (! $img->hasMoved()) {
            $data['bukti_pembayaran'] = 'uploads/' . $img->store();
        }
        
        (new Penyewaan)->insert($data);

        return redirect()->to('/penyewaan');
    }

    public function search()
    {
        $lokasiIklan = (new LokasiIklan())
                ->select('tb_lokasi_iklan.*, tb_media_iklan.jenis')
                ->join('tb_media_iklan','tb_media_iklan.lokasi_id=tb_lokasi_iklan.id', 'LEFT')
                ->findAll();
        // $mediaIklan = (new MediaIklan)->select('tb_media_iklan.*, tb_lokasi_iklan.nama nama_lokasi, FORMAT(harga_sewa,0) harga_sewa_format, tb_penyewaan.tanggal_selesai')
        //     ->join('tb_lokasi_iklan', 'tb_lokasi_iklan.id=tb_media_iklan.lokasi_id')
        //     ->join('tb_penyewaan','tb_penyewaan.media_iklan_id=tb_media_iklan.id')
        //     ->where('tb_penyewaan.tanggal_selesai', date('Y-m-d'));
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

    function sitemap()
    {
        $pages = [
            [
                'loc' => base_url(),
                'lastmod' => date('Y-m-d'),
            ],
            [
                'loc' => base_url('#home'),
                'lastmod' => date('Y-m-d'),
            ],
            [
                'loc' => base_url('#tentang'),
                'lastmod' => date('Y-m-d'),
            ],
            [
                'loc' => base_url('#product'),
                'lastmod' => date('Y-m-d'),
            ],
            [
                'loc' => base_url('login'),
                'lastmod' => date('Y-m-d'),
            ],
            [
                'loc' => base_url('register'),
                'lastmod' => date('Y-m-d'),
            ],
        ];

        // Set Header XML
        header('Content-Type: application/xml');

        echo view('sitemap', ['pages' => $pages]);
    }
}
