<?= $this->extend('layouts/app') ?>

<?= $this->section('pageTitle') ?>
Laporan Keuangan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Penyewa</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($keuangan as $index => $list): ?>
            <tr>
                <td><?=$index+1?></td>
                <td><?=$list['tanggal_mulai']?></td>
                <td><?=$list['user_name']?></td>
                <td><?=number_format($list['harga_sewa'])?></td>
            </tr>
            <?php endforeach ?>

            <?php if(empty($keuangan)): ?>
            <tr>
                <td colspan="4"><i>Tidak ada data</i></td>
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="3">Total</td>
                <td><?=number_format(array_sum(array_column($keuangan, 'harga_sewa')))?></td>
            </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>