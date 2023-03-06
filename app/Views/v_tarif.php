<?= $this->extend('layouts') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Tarif Parkir</h5>
                <!-- <a href="#" data-bs-target="#backDropModal" class="btn btn-primary mb-3">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; Tambah User
                </a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; Tambah Tarif
                </button>
                <!-- FOR MODALS -->
                <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="<?= base_url() ?>/TarifParkir/add" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Tarif Parkir</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row mt-3">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="Masukkkan Nama tarif" name="nama">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">Harga</label>
                                        <input type="text" id="harga" class="form-control" placeholder="Masukkan Harga" name="harga">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">slot</label>
                                        <input type="text" id="slot" class="form-control" placeholder="Masukkan Harga" name="slot">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="tokenBackdrop" class="form-label">Status</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
                                            <option value="1" selected>Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>

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
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Slot</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($tarif as $item) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item["tarif_nama"] ?></td>
                                <td><?= $item["tarif_nilai"] ?></td>
                                <td><?= $item["tarif_slot"] ?></td>
                                <td> <?= $item["tarif_status"] == 0 ? '<span class="badge bg-label-warning me-1">Tidak Aktif</span>' : '<span class="badge bg-label-success me-1">Aktif</span>' ?> </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="First group">

                                        <a type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $item['id']; ?>">
                                            <i class='tf-icons bx bxs-edit'></i>
                                        </a>
                                        <a type="button" href="<?= base_url() ?>/TarifParkir/delete/<?= $item["id"] ?>" class="btn btn-outline-secondary">
                                            <i class='tf-icons bx bx-trash'></i>
                                        </a>
                                    </div>
                                </td>
                                <div class="modal fade" id="exampleModal<?= $item['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="modal-content" action="<?= base_url() ?>/TarifParkir/edit/<?= $item['id']; ?>" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="backDropModalTitle">Tambah Tarif Parkir</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row mt-3">
                                                        <div class="col mb-3">
                                                            <label for="nameBackdrop" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" placeholder="Masukkkan Nama tarif" name="nama" value="<?= $item["tarif_nama"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBackdrop" class="form-label">Harga</label>
                                                            <input type="text" id="harga" class="form-control" placeholder="Masukkan Harga" name="harga" value="<?= $item["tarif_nilai"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBackdrop" class="form-label">slot</label>
                                                            <input type="text" id="slot" class="form-control" placeholder="Masukkan Harga" name="slot" value="<?= $item["tarif_slot"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="tokenBackdrop" class="form-label">Status</label>
                                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
                                                                <option value="1" selected>Aktif</option>
                                                                <option value="0">Tidak Aktif</option>
                                                            </select>

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
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>