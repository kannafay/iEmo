<footer>
  <div class="copyright">
    <p>
    <?php 
      if(get_option("iemo_copyright")) {
        if(get_option("iemo_copyright") < date("Y")){
          echo "Copyright © ".get_option("iemo_copyright")."-".date("Y");
        } else { 
          echo "Copyright © ".date("Y");
        } 
      } else {
        echo "Copyright © ".date("Y");
      }
    ?>
    <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
    </p>

    <?php
      if(get_option("iemo_icp")) {
        echo '<p><a href="https://beian.miit.gov.cn" target="_blank">'.get_option("iemo_icp").'</a></p>';
      }
    ?>


    <?php 
      if(get_option("iemo_icp_gov")) { 
        $patterns = "/\d+/";
        $strs = get_option("iemo_icp_gov");
        preg_match_all($patterns,$strs,$arr);
        $icp_url = implode($arr[0]);
        echo '<p><a href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode='.$icp_url.'" target="_blank">'.get_option("iemo_icp_gov").'</a></p>';
      }
    ?>

    <?php 
      if(get_option("iemo_upyun") == 1) {
        echo '<p>本站由<a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral" target="_blank"><img src="'.fileUri().'/assets/images/upyun.png" style="vertical-align: middle;height: 26px;margin-top: -3px;"></a>提供CDN加速/云存储服务</p>';
      } 
    ?>
  </div>
</footer>