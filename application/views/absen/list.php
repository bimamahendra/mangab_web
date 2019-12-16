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
      <div class="col-md-12"><a class="btn btn-success" href="<?php echo base_url('Dosen/add_absen'); ?>"><i class="fa fa-plus"></i>&ensp;Tambah Dosen</a></div>
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
                <th class="text-center">Dosen</th>
                <th class="text-center">Mata Kuliah</th>
                <th class="text-center">Topik</th>
                <th class="text-center">Ruangan</th>
                <th class="text-center">Waktu</th>
                <th class="text-center">Status</th>
                <th class="text-center" style="width: 50px">Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($absen_list as $absen){ ?>
                <tr>
                  <td class="text-left"><?php echo $absen->NAMA_DOSEN; ?></td>
                  <td class="text-left"><?php echo $absen->NAMA_MATKUL; ?></td>
                  <td class="text-left"><?php echo $absen->TOPIK; ?></td>
                  <td class="text-center"><?php echo $absen->RUANGAN_ABSEN; ?></td>
                  <td class="text-center"><?php echo $absen->TS_ABSEN; ?></td>
                  <?php if($absen->STATUS_ABSEN == 1){?>
                    <td class="text-center"><a href="<?= base_url('Absen/verif/' . $absen->ID_ABSEN) ?>" class="btn btn-sm btn-primary">Verification</a></td>
                  <?php } else { ?>
                    <td class="text-center"><a class="btn btn-sm btn-success" style="color:white">Verified</a></td>
                  <?php } ?>
                  <td class="text-center">
                    <a href="<?= base_url('Absen/det_absen/' . $absen->ID_ABSEN) ?>"><i class="fa fa-bars text-secondary"></i></a>
                    <a href="#" data-toggle="modal" data-target="#ModalDelete" data-id="<?php echo $absen->ID_ABSEN; ?>"
                        data-title="<?php echo $absen->ID_ABSEN; ?>"><i class="fa fa-trash text-danger"></i></a>
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
        <p>Anda yakin ingin menghapus data absen yang dipilih?</p>
        <p id="absentitle"></p>
      </div>
      <div class="modal-footer"> 
        <a href="<?php echo base_url() ?>Absen/delete/<?php echo $absen->ID_ABSEN?>" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
<script>
$('#ModalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var absen_id = button.data('id')
    var modal = $(this)
    var absen_title = button.data('title');
    document.getElementById('absentitle').innerHTML = absen_title;
    modal.find('.modal-footer a').attr("href", "<?= base_url() ?>Absen/delete/" + absen_id)
})
</script>