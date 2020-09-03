<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Transaksi</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="panel-heading">
                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah Tabungan</a><br>
            </div>
            <?php if($this->session->flashdata('notif')!=null): ?>
          <div class= "alert alert-danger"><?= $this->session->flashdata('notif');?></div>
          <?php endif?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Sampah</th>
                  <th>Poin</th>
                  <th>Jumlah Sampah</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($kasir as $k){
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$k->user.'</td>
                                <td>'.$k->sampah.'</td>
                                <td>'.$k->poin_sampah.'</td>
                                <td>'.$k->jumlah_sampah.'</td>
                                <td>'.$k->waktu.'</td>
                                <td>'.$k->jumlah_poin.'</td>
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

    <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/kasir/tambah')?>" method="post">
              Nama
                <select name="id_user" class="form-control">
                   <?php
                   foreach ($data_user as $u) {
                       echo "<option value= '".$u->id_user."'>
                       ".$u->nama."
                       </option>";
                   }
                    ?>
                </select><br>
                Sampah
                <select name="id_sampah" class="form-control">
                   <?php
                   foreach ($data_sampah as $s) {
                       echo "<option value= '".$s->id_sampah."'>
                       ".$s->nama."
                       </option>";
                   }
                    ?>
                </select><br>
                Poin
                <select name="id_poin" class="form-control">
                   <?php
                   foreach ($data_poin as $p) {
                       echo "<option value= '".$p->id_poin."'>
                       ".$p->jumlah."
                       </option>";
                   }
                    ?>
                </select><br>
             Jumlah sampah
             <input type="text" name="jumlah_sampah" class="form-control"><br>
             tanggal
             <input type="date" name="waktu" class="form-control"><br>
             total
             <input type="text" name="jumlah_poin" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>