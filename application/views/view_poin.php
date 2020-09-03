
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Poin Sampah</h3>
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
                  <th>Jenis</th>
                  <th>Poin</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($poin as $p){
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$p->jenis.'</td>
                                <td>'.$p->jumlah.'</td>
                                <td>
                                <a href="#" class="btn btn-info btn-sn" data-toggle="modal" data-target="#update" onclick="prepare_ubah_poin('.$p->id_poin.')">Ubah</a>
                                <a href="'.base_url('index.php/poin/hapus/'.$p->id_poin).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a>
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
        <h4 class="modal-title" id="myModalLabel">Tambah admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/poin/tambah')?>" method="post">
             Jenis
             <input type="text" name="jenis" class="form-control"><br>
             Poin
             <input type="text" name="jumlah" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Poin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/poin/ubah')?>" method="post" entype="multipart/form-data">
            <input type="hidden" name="ubah_id_poin" id="ubah_id_poin">
             Jenis
             <input type="text" name="ubah_jenis" id="ubah_jenis" class="form-control"><br>
             Poin
             <input type="text" name="ubah_jumlah" id="ubah_jumlah" class="form-control"><br>
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

function prepare_ubah_poin(id)
{
  $("#ubah_id_poin").empty();
  $("#ubah_jenis").empty();
  $("#ubah_jumlah").empty();

  $.getJSON('<?php echo base_url(); ?>index.php/poin/get_data_poin_by_id/' + id, function(data){
    $("#ubah_id_poin").val(data.id_poin);
    $("#ubah_jenis").val(data.jenis);
    $("#ubah_jumlah").val(data.jumlah);
  });
}

</script>