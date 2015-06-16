

<h3 class='col-sm-11'>Login</h3>
    <div class='clearfix'></div>
      
    <?php if(isset($_SESSION['error_message'])): ?> 
      <div class='alert alert-danger'>
        <?= $_SESSION['error_message'] ?>
      </div>
    <?php endif; ?>
    
    <form role="form" action="<?= base_url() ?>auth/login" method="post" class="col-sm-11" id='form-registrasi'>
    <div class="form-group">
    <label for="exampleInputEmail1">Username atau Email</label> 
    <input type="text" name='usernameOrEmail' class="form-control" id="" placeholder="Username atau Email..">
    <div style='color:red'><?= form_error('usernameOrEmail') ?></div>
    </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label> 
    <input type="password" name='password' class="form-control" id="" placeholder="Password..">
    <div style='color:red'><?= form_error('password') ?></div>
  </div>
  
  <div class="form-group">
  <button type="submit" class="btn btn-danger pull-right">Masuk </button>
  </div>
  <div class='clearfix'></div>
  <br>
                          </form>