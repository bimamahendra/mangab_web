<div class="py-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <h3 class="display-3">Ubah Data Backend User</h3> -->
      </div>
    </div>
  </div>
</div>
<?php if ($this->session->flashdata('error_message')){ ?>
  <div class="py-1">
    <div class="container">
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Oh snap!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>
        <p><?= $this->session->flashdata('error_message') ?></p>
      </div>
    </div>
  </div>
<?php } ?>
<div class="py-1">
  <div class="container">
    <div class="alert alert-primary" role="alert">
      <p><b>Informasi!</b> Field yang ditandai harus diisi dengan benar.</p>
    </div>
  </div>
</div>
<div class="py-4">
  <div class="container">
    <form id="c_form-h" method="post" action="<?= base_url('Matkul/update'); ?>" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $matkul->ID_MATKUL ?>">
      <div class="form-group row"> 
        <label for="kode" class="col-2 col-form-label">Kode Mata Kuliah*</label>
        <div class="col-3">
          <input type="text" class="form-control" name="kode" value="<?= $matkul->KODE_MATKUL ?>" readonly> 
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-2 col-form-label">Nama Mata Kuliah*</label>
        <div class="col-5">
          <input type="text" class="form-control" name="nama" value="<?= $matkul->NAMA_MATKUL ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="kelas" class="col-2 col-form-label">Kelas*</label>
        <div class="col-2">
          <select class="form-control" name="kelas">
            <option value="A" <?php if($matkul->KELAS == "A") {echo 'selected';} ?> > A </option>
            <option value="B" <?php if($matkul->KELAS == "B") {echo 'selected';} ?> > B </option>
            <option value="C" <?php if($matkul->KELAS == "C") {echo 'selected';} ?> > C </option>
            <option value="D" <?php if($matkul->KELAS == "D") {echo 'selected';} ?> > D </option>
            <option value="E" <?php if($matkul->KELAS == "E") {echo 'selected';} ?> > E </option>
            <option value="F" <?php if($matkul->KELAS == "F") {echo 'selected';} ?> > F </option>
            <option value="P" <?php if($matkul->KELAS == "P") {echo 'selected';} ?> > P </option>
            <option value="P1" <?php if($matkul->KELAS == "P1") {echo 'selected';} ?> > P1 </option>
            <option value="P2" <?php if($matkul->KELAS == "P2") {echo 'selected';} ?> > P2 </option>
            <option value="SP" <?php if($matkul->KELAS == "SP") {echo 'selected';} ?> > SP </option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
  </div>
</div>