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
<!-- <div class="py-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12"><a class="btn btn-success" href="<?php echo base_url('Dosen/add_detail'); ?>"><i class="fa fa-plus"></i>&ensp;Tambah Dosen</a></div>
    </div>
  </div>
</div> -->
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped table-borderless" id="newstable">
            <thead>
              <tr>
                <th class="text-center">NRP</th>
                <th class="text-center">Nama Mahasiswa</th>
                <th class="text-center">Status</th>
                <th class="text-center">Timestamp</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($detail_list as $detail){ ?>
                <tr>
                  <td class="text-center"><?php echo $detail->NRP_MHS; ?></td>
                  <td class="text-left"><?php echo $detail->NAMA_MHS; ?></td>
                  <?php if($detail->STATUS_DETABSEN == 0){ ?>
                    <td class="text-center"><a class="btn btn-sm btn-danger text-white">A</a></td>
                  <?php } else if($detail->STATUS_DETABSEN == 1) {?>
                    <td class="text-center"><a class="btn btn-sm btn-primary text-white">M</a></td>
                  <?php } else if($detail->STATUS_DETABSEN == 2) {?>
                    <td class="text-center"><a class="btn btn-sm btn-info text-white">S</a></td>
                  <?php } else {?>
                    <td class="text-center"><a class="btn btn-sm btn-success text-white">I</a></td>
                  <?php } ?>
                  <td class="text-center"><?php echo $detail->TS_DETABSEN; ?></td>
                </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
        <label><b>Note : </b></label>
        <div>
          <textarea class="col-md-12" rows="5" disabled><?php foreach ($detail_note as $note) {echo $note->NOTE;} ?></textarea>
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
        <p>Anda yakin ingin menghapus data detail yang dipilih?</p>
        <p id="detailtitle"></p>
      </div>
      <div class="modal-footer"> 
        <a href="<?php echo base_url() ?>Absen/delete/<?php echo $detail->ID_ABSEN?>" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
<script>
$('#ModalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var detail_id = button.data('id')
    var modal = $(this)
    var detail_title = button.data('title');
    document.getElementById('detailtitle').innerHTML = detail_title;
    modal.find('.modal-footer a').attr("href", "<?= base_url() ?>Absen/delete/" + detail_id)
})
</script>