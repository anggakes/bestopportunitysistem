

<h3 class='col-sm-8'><strong>Member</strong> <small>Registration Form</small></h3>
    
    <a href="<?= base_url() ?>auth/login" class='btn btn-link pull-right'> Sudah Punya Akun ?</a>

    <form role="form" action="<?= base_url() ?>auth/daftar" method="post" class="col-sm-11" id='form-registrasi'>
    <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name='member[username]' class="form-control" id="" placeholder="Username..">
    <div style='color:red'><?= form_error('member[username]') ?></div>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Alamat Email</label>
    <input type="email" name='member[email]' class="form-control" id="" placeholder="Email..">
    <div style='color:red'><?= form_error('member[email]') ?></div>
    </div>
  <div class='row'>
  <div class="form-group col-sm-6">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='member[password]' class="form-control" id="" placeholder="Password..">
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputPassword1">Konfirmasi Password</label>
    <input type="password" name='member[repassword]' class="form-control" id="" placeholder=" Retype Password..">
  </div>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kode Referal</label>
    <input type="text" name='member[referral_code]' class="form-control" id="" placeholder=" Kode Referal..">
  </div>
 <hr>
<div class="form-group">
    <label for="exampleInputPassword1">Nama Lengkap</label>
    <input type="text" name='profile[nama]' class="form-control" id="" placeholder=" Nama Lengkap Anda..">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Lahir</label>
    <input type="text" name='profile[tanggal_lahir]' class="form-control" id="" placeholder=" Tanggal Lahir">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" name='profile[alamat]' class="form-control" id="" placeholder=" Alamat Tempat Tinggal..">
  </div>
<div class='row'>
  <div class="form-group col-sm-4">
    <label for="exampleInputPassword1">Provinsi</label>
    <input type="text" name='profile[provinsi]' class="form-control" id="" placeholder=" Provinsi..">
  </div>
  <div class="form-group col-sm-4">
    <label for="exampleInputPassword1">Kota</label>
    <input type="text" name='profile[kota]' class="form-control" id="" placeholder=" Kota..">
  </div>
  <div class="form-group col-sm-4">
    <label for="exampleInputPassword1">Negara</label>
    <input type="text" name='profile[negara]' class="form-control" id="" placeholder=" Negara..">
  </div>

</div>

  <div class="form-group">
    <label for="exampleInputPassword1">Kode Pos</label>
    <input type="text" name='profile[kode_pos]' class="form-control" id="" placeholder=" Kode Pos..">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nomor Handphone</label>
    <input type="text" name='profile[no_hp]' class="form-control" id="" placeholder=" Nomor Yang Bisa Dihubungi..">
  </div>
   <div class="checkbox">
    <label>
      <input class='setuju' type="checkbox"> Setuju dengan ketentuan dan syarat 
    </label>
  </div>
  <hr>
    <div class="form-group">
  <button type="submit" class="btn btn-danger pull-right">Daftar <br> Menjadi Member </button>
  </div>
  <div class='clearfix'></div>
  <br>
                          </form>

<script type="text/javascript">

$(document).ready(function(){

    /*
        Submit form
    */

    $('#form-registrasi').submit(function(){
    
        if($('.setuju').is(':checked'))
        {
          return true;
        }
        alert('Maaf anda belum menyetujui syarat dan ketentuan')
        return false;
    });

});

</script>