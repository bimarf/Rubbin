
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Sampah</h3>
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
                  <th>Nama</th>
                  <th>Jenis</th>
                  <th>Poin</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($sampah as $s){
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$s->nama.'</td>
                                <td>'.$s->jenis.'</td>
                                <td>'.$s->jumlah.'</td>
                                <td>
                                <a href="#" class="btn btn-info btn-sn" data-toggle="modal" data-target="#update" onclick="prepare_ubah_sampah('.$s->id_sampah.')">Ubah</a>
                                    <a href="'.base_url('index.php/sampah/hapus_sampah/'.$s->id_sampah).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a>
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

    <!-- modal -->
    <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Sampah</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/sampah/tambah')?>" method="post">
             Nama
             <input type="text" name="nama" class="form-control"><br>
             jenis
                <select name="id_poin" class="form-control">
                   <?php
                   foreach ($data_poin as $s) {
                       echo "<option value= '".$s->id_poin."'>
                       ".$s->jenis."
                       </option>";
                   }
                    ?>
                </select><br>
                poin
                <select name="id_poin" class="form-control">
                   <?php
                   foreach ($data_poin as $s) {
                       echo "<option value= '".$s->id_poin."'>
                       ".$s->jumlah."
                       </option>";
                   }
                    ?>
                </select><br>
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
        <h4 class="modal-title" id="myModalLabel">Update sampah</h4>
      </div>
      <div class="modal-body">
      <form action="<?=base_url('index.php/sampah/ubah')?>" method="post" entype="multipart/form-data">
      <input type="hidden" name="ubah_id_sampah" id="ubah_id_sampah">
             Nama
             <input type="text" name="ubah_nama" id="ubah_nama"  class="form-control"><br>
             jenis
                <select name="id_poin" class="form-control">
                   <?php
                   foreach ($data_poin as $s) {
                       echo "<option value= '".$s->id_poin."'>
                       ".$s->jenis."
                       </option>";
                   }
                    ?>
                </select><br>
                poin
                <select name="id_poin" class="form-control">
                   <?php
                   foreach ($data_poin as $s) {
                       echo "<option value= '".$s->id_poin."'>
                       ".$s->jumlah."
                       </option>";
                   }
                    ?>
                </select><br>
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

function prepare_ubah_sampah(id)
{
  $("#ubah_id_sampah").empty();
  $("#ubah_nama").empty();


  $.getJSON('<?php echo base_url(); ?>index.php/sampah/get_data_sampah_by_id/' + id, function(data){
    $("#ubah_id_sampah").val(data.id_sampah);
    $("#ubah_nama").val(data.nama);
  });
}

</script>