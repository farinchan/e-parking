<?= $this->extend('layouts') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>User E-parking</h5>
                <!-- <a href="#" data-bs-target="#backDropModal" class="btn btn-primary mb-3">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; Tambah User
                </a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                    <span class="tf-icons bx bx-book-add"></span>&nbsp; Tambah User
                </button>
                <!-- FOR MODALS -->
                <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-3">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">RFID</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter RFID" id="inputrfid">
                                            <button class="btn btn-outline-primary" type="button" id="scanAjax">Scan</button>
                                            <button class="btn btn-outline-primary" type="button" id="clearAjax">Clear</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBackdrop" class="form-label">Name</label>
                                        <input type="text" id="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailBackdrop" class="form-label">Email</label>
                                        <input type="text" id="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="col mb-0">
                                        <label for="phoneBackdrop" class="form-label">No. HP</label>
                                        <input type="text" id="phone" class="form-control" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col mb-3">
                                        <label for="tokenBackdrop" class="form-label">Token Telegram</label>
                                        <input type="text" id="token" class="form-control" placeholder="Enter Token Telegram">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save</button>
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
                            <th>RFID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Token</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($user as $item) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item["rfid"] ?></td>
                                <td><?= $item["user_nama"] ?></td>
                                <td><?= $item["user_email"] ?></td>
                                <td> <?= $item["user_phone"] ?> </td>
                                <td> <?= $item["user_token"] ?> </td>
                                <td> <?= $item["user_status"] == 0 ? '<span class="badge bg-label-pending me-1">Tidak Aktif</span>' : '<span class="badge bg-label-success me-1">Aktif</span>' ?> </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="First group">

                                        <a type="button" class="btn btn-outline-secondary">
                                            <i class='tf-icons bx bxs-edit'></i>
                                        </a>
                                        <a type="button" href="/admin/delete/<?= $item["rfid"] ?>" class="btn btn-outline-secondary">
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