<div class="container-fluid">

    <h3><?php echo $title; ?></h3>
    <hr>
    <br>
    <form method="post" action="<?php echo base_url('Home/proses_tambah_data'); ?>">
  <div class="form-group row">
    <label for="nama_siswa" class="col-sm-2 col-form-label">Nama  Siswa</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama_siswa">
    </div>
  </div>

  <div class="form-group row">
    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" name="kelas">
    </div>
  </div>

  <div class="form-group row">
    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="jurusan">
    </div>
</div>

    <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="alamat">
    </div>
</div>
<div class="form-group row">
  <br><br>
 <label for="">Keterangan</label>
          <select name="kategori_id" id="kategori_id">
                <option value="izin">izin</option>
                <option value="sakit">sakit</option>
             
         </select>  
         <br> 
    </div>
</div> 
<div class="form-group">
           <label>Foto</label>
            <input type="file" name="userfile" class="form-control"
            size="20">
        </div>
    
      <button type="submit" class="btn btn-primary">Tambah</button>
      <button type="submit" class="btn btn-danger">reset</button>
    </div>
</div>
</form>
</div>