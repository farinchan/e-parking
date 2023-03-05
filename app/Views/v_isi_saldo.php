<?= $this->extend('layouts') ?>

<?= $this->section('content') ?>
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Isi Saldo</h5>
            </div>
            <div class="card-body">
                <form action="/isisaldo/card" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tap Kartu ke CardReader</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input id="inputrfid" type="text" name="rfid" class="form-control" placeholder="Tap Your Card">
                                <button class="btn btn-outline-primary" id="scanAjax" type="button">Scan</button>
                                <button class="btn btn-outline-primary" id="clearAjax" type="button">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button id="usertopupid" type="submit" class="btn btn-primary">Lanjut</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Riwayat Pengisian Saldo</h5>
                <!-- <a href="#" data-bs-target="#backDropModal" class="btn btn-primary mb-3">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; Tambah User
                </a> -->
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>UID</th>
                            <th>Nama</th>
                            <th>tanggal</th>
                            <th>Isi Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($isisaldo as $item) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item["rfid"] ?></td>
                                <td><?= $item["user_nama"] ?></td>
                                <td><?= $item["isi_saldo_tanggal"] ?></td>
                                <td> <?= $item["isi_saldo_jumlah"] ?> </td>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>