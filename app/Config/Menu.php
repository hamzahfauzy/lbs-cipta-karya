<?php

namespace App\Config;

class Menu {

    static function buildItem($label, $url = false, $slug = '', $icon = '', $controller = false, $roles = [])
    {
        $url = !$url ? "/$slug" : $url;
        return [
            'label' => $label,
            'icon'  => $icon,
            'slug' => $slug,
            'url' => $url,
            'controller' => $controller,
            'roles' => $roles
        ];
    }

    static function get()
    {
        return [
            static::buildItem('Lokasi Iklan', false, 'lokasi-iklan', 'fas fa-map-marker', 'Lbs\LokasiIklanController', ['Admin']),
            static::buildItem('Lokasi Strategis', false, 'lokasi-strategis', 'fas fa-map-marker', 'Lbs\LokasiStrategisController', ['Admin']),
            static::buildItem('Media Iklan', false, 'media-iklan', 'fas fa-film', 'Lbs\MediaIklanController', ['Admin']),
            static::buildItem('Penyewaan', false, 'penyewaan', 'fas fa-hand-holding-usd', 'Lbs\PenyewaanController', ['Admin','Penyewa']),
            static::buildItem('Keuangan', false, 'keuangan', 'fas fa-money-bill', 'Lbs\KeuanganController', ['Admin']),
            static::buildItem('Pengguna', false, 'pengguna', 'fas fa-users', 'Lbs\PenggunaController', ['Admin']),
        ];
    }
}