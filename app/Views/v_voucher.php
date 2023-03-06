<?= $this->extend('layouts') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Voucher Saldo</h5>
                <!-- <a href="#" data-bs-target="#backDropModal" class="btn btn-primary mb-3">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; Tambah User
                </a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; tambah Voucher
                </button>
                <!-- FOR MODALS -->
                <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="<?= base_url() ?>/voucher/add" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Voucher</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row mt-3">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">No Voucher</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="No. Voucher" id="vouch" name="nomor">
                                            <button class="btn btn-outline-primary" type="button" id="btngenerate">Generate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">Nominal</label>
                                        <input type="text" id="harga" class="form-control" placeholder="Masukkan Nominal" name="nominal">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor voucher</th>
                            <th>Nominal</th>
                            <th>Expired</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($voucher as $item) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item["voucher_nomor"] ?></td>
                                <td><?= $item["voucher_nominal"] ?></td>
                                <td><?= $item["voucher_expired"] ?></td>
                                <td> <?= $item["voucher_status"] == "0" ? '<span class="badge bg-label-success me-1">Belum Digunakan</span>' : '<span class="badge bg-label-pending me-1">Sudah digunakan</span>' ?> </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="First group">

                                        <a type="button" class="btn btn-outline-secondary">
                                            <i class='tf-icons bx bxs-edit'></i>
                                        </a>
                                        <a type="button" href="/voucher/delete/<?= $item["id"] ?>" class="btn btn-outline-secondary">
                                            <i class='tf-icons bx bx-trash'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>