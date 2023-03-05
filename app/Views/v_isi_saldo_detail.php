<?= $this->extend('layouts') ?>

<?= $this->section('content') ?>

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-2"><img class="card-img card-img-left" src="<?= base_url() ?>/assets/img/user.png" height="200" alt="Card image"> </div>
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title"><?= $isisaldo[0]["user_nama"] ?></h5>
                <p class="card-text">UID :<?= $isisaldo[0]["rfid"] ?></p>
                <p class="card-text">Email : <?= $isisaldo[0]["user_email"] ?></p>
                <p class="card-text">phone : <?= $isisaldo[0]["user_phone"] ?></p>
                <form>
                    <div class="row mb-3"><label class="col-sm-2 col-form-label" for="basic-default-name">topup saldo</label>
                        <div class="col-sm-10"><input id="inputrfid" type="text" class="form-control" placeholder="Jumlah saldo" aria-label="Jumlah saldo"></div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary">Top up</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>