<div class="py-1">
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-12"><h3 class="display-3">Mahasiswa</h3></div> -->
    </div>
  </div>
</div>
<div class="py-0">
  <?php if ($this->session->flashdata('success_message')){ ?>
  <div class="container">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Sukses!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>
      <p><?= $this->session->flashdata('success_message') ?></p>
    </div>
  </div>
  <?php }
  if ($this->session->flashdata('error_message')){ ?>
  <div class="container">
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Oh snap!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4>
      <p><?= $this->session->flashdata('error_message') ?></p>
    </div>
  </div>
  <?php } ?>
</div>
<div class="py-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12"><a class="btn btn-primary" href="<?php echo base_url('Matkul/add_matkul'); ?>"><i class="fa fa-plus"></i>&ensp;Tambah Mata Kuliah</a></div>
    </div>
  </div>
</div>
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped table-borderless" id="newstable">
            <thead>
              <tr>
                <th class="text-center">Kode Mata Kuliah</th>
                <th class="text-center">Nama Mata Kuliah</th>
                <th class="text-center">Kelas</th>
                <th class="text-center" style="width: 50px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($matkul_list as $matkul){ ?>
                <tr>
                  <td class="text-center"><?php echo $matkul->KODE_MATKUL; ?></td>
                  <td class="text-left"><?php echo $matkul->NAMA_MATKUL ?></td>
                  <td class="text-center"><?php echo $matkul->KELAS; ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('Matkul/edit_matkul/' . $matkul->ID_MATKUL) ?>"><i class="fa fa-pencil text-secondary"></i></a>
                    <a href="#" data-toggle="modal" data-target="#ModalDelete" data-id="<?php echo $matkul->ID_MATKUL; ?>"
                        data-title="<?php echo $matkul->ID_MATKUL; ?>"><i class="fa fa-trash text-danger"></i></a>
                  </td>
                </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalDelete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Penghapusan</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus data mahasiswa yang dipilih?</p>
        <p id="matkultitle"></p>
      </div>
      <div class="modal-footer"> 
        <a href="<?php echo base_url() ?>Matkul/delete/<?php echo $matkul->ID_MATKUL?>" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
<script>
$('#ModalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var matkul_id = button.data('id')
    var modal = $(this)
    var matkul_title = button.data('title');
    document.getElementById('matkultitle').innerHTML = matkul_title;
    modal.find('.modal-footer a').attr("href", "<?= base_url() ?>Matkul/delete/" + matkul_id)
})
</script>