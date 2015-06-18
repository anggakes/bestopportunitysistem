<?php

$user = unserialize($_SESSION['login_user']);

?>
<!-- orgchart -->
 <ul id="chart" style='display:none'>
      <li>
        <!-- Referral -->
        <?php if($user->hasReferral()) : ?>
            <adjunct><?= $user->getReferral()->profile('nama') ?></adjunct> 
        <?php endif;?>

        <em><?= $user->profile('nama') ?></em> 
        <!-- Downline -->
           <?php $user->drawChartDownline($user->getDownline()) ?>
      
      </li>
</ul>
<!-- end orgchart -->
<style type="text/css">
            .orgChart{
              overflow: scroll;
            }
</style>

<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Downline</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
           
            <div class="box-body"  id='main'>


            </div><!-- /.box-body -->
            <div class="box-footer" style="display: block;">
              Footer
            </div><!-- /.box-footer-->
          </div>


<link rel="stylesheet" href="<?= base_url() ?>theme/plugins/jquery-orgchart/jquery.orgchart.css"/>
<script src="<?= base_url() ?>theme/plugins/jquery-orgchart/jquery.orgchart.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  var org =  $("#chart").orgChart({container: $("#main")});


    
});

</script>