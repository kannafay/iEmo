<?php
@$iemo_recommend_post = stripslashes($_POST["iemo_recommend_post"]);
@$iemo_copyright = stripslashes($_POST["iemo_copyright"]);
@$iemo_icp = stripslashes($_POST["iemo_icp"]);
@$iemo_icp_gov = stripslashes($_POST["iemo_icp_gov"]);
@$iemo_upyun = stripslashes($_POST["iemo_upyun"]);

if(@stripslashes($_POST["iemo_option"])){
  update_option("iemo_recommend_post",$iemo_recommend_post);
  update_option("iemo_copyright",$iemo_copyright);
  update_option("iemo_icp",$iemo_icp);
  update_option("iemo_icp_gov",$iemo_icp_gov);
  update_option("iemo_upyun",$iemo_upyun);
}
?>

<div class="wrap">
  <h1>iEmo主题设置</h1>
  <form method="post" action="" novalidate="novalidate">
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="iemo_recommend_post">推荐文章</label></th>
          <td>
            <input name="iemo_recommend_post" type="text" value="<?php echo get_option("iemo_recommend_post"); ?>" class="regular-text">
            <p class="description">显示在首页顶部，如：1,2,3（以英文逗号隔开）</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_copyright">版权号</label></th>
          <td>
            <input name="iemo_copyright" type="number" value="<?php echo get_option("iemo_copyright"); ?>" class="regular-text">
            <p class="description">请填写年份（数字），默认：Copyright © <?php echo date("Y"); ?></p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_icp">ICP备案</label></th>
          <td>
            <input name="iemo_icp" type="text" value="<?php echo get_option("iemo_icp"); ?>" class="regular-text">
            <p class="description">没有ICP备案号请留空</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_icp_gov">公网安备号</label></th>
          <td>
            <input name="iemo_icp_gov" type="text" value="<?php echo get_option("iemo_icp_gov"); ?>" class="regular-text">
            <p class="description">没有公网安备号请留空</p>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="iemo_upyun">又拍云联盟</label></th>
          <td>
            <input name="iemo_upyun" type="text" value="<?php echo get_option("iemo_upyun"); ?>" class="regular-text">
            <p class="description">数字1开启</p>
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="iemo_option"  class="button button-primary" value="保存更改">
    </p>
  </form>
</div>