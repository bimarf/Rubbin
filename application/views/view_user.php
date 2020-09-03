
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
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
                  <th>Username</th>
                  <th>Email</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($user as $u){
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$u->nama.'</td>
                                <td>'.$u->username.'</td>
                                <td>'.$u->email.'</td>
                                <td>'.$u->kelas.'</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sn" data-toggle="modal" data-target="#update" onclick="prepare_ubah_user('.$u->id_user.')">Ubah</a>
                                    <a href="'.base_url('index.php/user/hapus/'.$u->id_user).'" onclick="return confirm(\'anda yakin?\')" class="btn btn-danger">Delete</a>
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
        <form action="<?=base_url('index.php/user/tambah')?>" method="post">
             Nama
             <input type="text" name="nama" class="form-control"><br>
             Username
             <input type="text" name="username" class="form-control"><br>
             Password
             <input type="text" name="password" class="form-control"><br>
             Email
             <input type="email" name="email" class="form-control"><br>
             Kelas
             <input type="text" name="kelas" class="form-control"><br>
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
        <h4 class="modal-title" id="myModalLabel">Update User</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/user/ubah')?>" method="post" entype="multipart/form-data">
            <input type="hidden" name="ubah_id_user" id="ubah_id_user">
             Nama
             <input type="text" name="ubah_nama" id="ubah_nama" class="form-control"><br>
             Username
             <input type="text" name="ubah_username" id="ubah_username" class="form-control"><br>
             Password
             <input type="text" name="ubah_password" id="ubah_password" class="form-control"><br>
             Email
             <input type="email" name="ubah_email" id="ubah_email" class="form-control"><br>
             Kelas
             <input type="text" name="ubah_kelas" id="ubah_kelas" class="form-control"><br>
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

function prepare_ubah_user(id)
{
  $("#ubah_id_user").empty();
  $("#ubah_nama").empty();
  $("#ubah_username").empty();
  $("#ubah_password").empty();
  $("#ubah_email").empty();
  $("#ubah_kelas").empty();

  $.getJSON('<?php echo base_url(); ?>index.php/user/get_data_user_by_id/' + id, function(data){
    $("#ubah_id_user").val(data.id_user);
  $("#ubah_nama").val(data.nama);
  $("#ubah_username").val(data.username);
  $("#ubah_password").val(data.password);
  $("#ubah_email").val(data.email);
  $("#ubah_kelas").val(data.kelas);
  });
}

</script>