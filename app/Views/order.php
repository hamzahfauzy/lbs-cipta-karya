<?= $this->extend('layouts/app-minimum') ?>

<?= $this->section('content') ?>
<div class="container" style="padding-top: 100px;">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= getenv('app.name'); ?></h1>
            <h4 class="text-center">Form Pemesanan</h4>
        </div>
        <div class="col-12 col-lg-8">
            <img src="/<?=$media['foto']?>" alt="" width="100%">
            <center>
                <h2><?=$media['nama_lokasi']?></h2>
                <p>Rp. <?=number_format($media['harga_sewa'])?></p>
            </center>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <?php if(session()->getFlashdata('success')):?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif;?>
                        <?php if(session()->getFlashdata('msg')):?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="email2">Nama Pemesan</label>
                            <input type="text" class="form-control" id="email2" name="pemesan" disabled value="<?=session()->get('name')?>">
                        </div>
                        <div class="form-group">
                            <label for="email2">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="email2" name="tanggal_mulai">
                        </div>
                        <div class="form-group">
                            <label for="password">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="password" name="tanggal_selesai">
                        </div>
                        <div class="form-group">
                            <label for="password">Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="form-control" onchange="document.querySelector('#bukti_pembayaran').style.display = this.value != 'CASH' ? 'block' : 'none'">
                                <option value="CASH">CASH</option>
                                <option value="BANK BRI (3388010282164986)">BANK BRI (3388010282164986)</option>
                                <option value="BANK SUMUT (0112345678)">BANK SUMUT (0112345678)</option>
                            </select>
                        </div>
                        <div class="form-group" id="bukti_pembayaran" style="display:none">
                            <label>Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="bukti_pembayaran">
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button class="btn btn-primary w-100 mb-3">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>