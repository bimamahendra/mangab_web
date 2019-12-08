<div class="py-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <h3 class="display-3">Tambah Mata Kuliah</h3> -->
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
    <div class="row">
      <div class="col-md-9">
        <form id="c_form-h" method="post" action="<?= base_url('Matkul/create'); ?>" enctype="multipart/form-data">
        <div class="form-group row"> 
          <label for="kode" class="col-3 col-form-label">Kode Mata Kuliah*</label>
          <div class="col-9">
            <input type="text" class="form-control" name="kode"> 
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-3 col-form-label">Nama Mata Kuliah*</label>
          <div class="col-9">
            <input type="text" class="form-control" name="nama"> 
          </div>
        </div>
        <div class="form-group row">
          <label for="kelas" class="col-3 col-form-label">Kelas*</label>
          <div class="col-3">
            <select class="form-control" name="kelas">
              <option value="">-- Pilih Kelas --</option>
              <option value="A"> A </option>
              <option value="B"> B </option>
              <option value="C"> C </option>
              <option value="D"> D </option>
              <option value="E"> E </option>
              <option value="F"> F </option>
              <option value="P"> P </option>
              <option value="P1"> P1 </option>
              <option value="P2"> P2 </option>
              <option value="SP"> SP </option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Baru</button>
      </div>
      </form>
    </div>
  </div>
</div>