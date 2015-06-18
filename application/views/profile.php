<?php

$user = unserialize($_SESSION['login_user']);

?>

<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pohon Level</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" style="display: block;" id='level'>
<?php print_r($user->getDownline()) ?>

            </div><!-- /.box-body -->
            <div class="box-footer" style="display: block;">
              Footer
            </div><!-- /.box-footer-->
          </div>