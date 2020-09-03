
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Reward</h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-heading">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
            </div>
            <?php 
    $notif = $this->session->flashdata('notif');
    if($notif != NULL){
        echo'
        <div class="alert alert-danger">'.$notif.'</div> 
        ';
    }
    ?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Reward</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($reward as $r){
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$r->nama_reward.'</td>
                                <td>'.$r->harga_poin.'</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sn" data-toggle="modal" data-target="#update" onclick="prepare_ubah_reward('.$r->id_reward.')">Ubah</a>
                                    <a href="'.base_url('index.php/admin/hapus/'.$r->id_reward).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a>
                                </td>
                            ';
                            $no++;
                        }
                    
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <?php if($this->session->flashdata('pesan')!=null): ?>
          <div class= "alert alert-danger"><?= $this->session->flashdata('pesan');?></div>
          <?php endif?>
    <!-- modal -->
    <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Reward</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/reward/tambah')?>" method="post">
             Nama
             <input type="text" name="nama_reward" class="form-control"><br>
             Harga
             <input type="text" name="harga_poin" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Update-->
<div class="modal fade" id="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Reward</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/reward/ubah')?>" method="post" entype="multipart/form-data">
            <input type="hidden" name="ubah_id_reward" id="ubah_id_reward">
             Nama
             <input type="text" name="ubah_nama_reward" id="ubah_nama_reward" class="form-control"><br>
             Harga
             <input type="text" name="ubah_harga_poin" id="ubah_harga_poin" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function prepare_ubah_reward(id)
{
  $("#ubah_id_reward").empty();
  $("#ubah_nama_reward").empty();
  $("#ubah_harga_poin").empty();

  $.getJSON('<?php echo base_url(); ?>index.php/reward/get_data_reward_by_id/' + id, function(data){
    $("#ubah_id_reward").val(data.id_reward);
    $("#ubah_nama_reward").val(data.nama_reward);
    $("#ubah_harga_poin").val(data.harga_poin);
  });
}

</script>