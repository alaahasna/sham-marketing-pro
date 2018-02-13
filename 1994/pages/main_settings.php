    <?php

    if(isset($_POST['save'])){
        // Text Box Values :
        $site_name_value = safe_input($_POST['site_name']);
        $ar_site_name_value = safe_input($_POST['ar_site_name']);
        $site_url_value = safe_input($_POST['site_url']);
        $site_mail_value = safe_input($_POST['site_mail']);
        $phone_value = safe_input($_POST['phone']);
        $address_value = safe_input($_POST['address']);
        $ar_address_value = safe_input($_POST['ar_address']);
        $copyrights_value = $_POST['copyrights'];
        $ar_copyrights_value = $_POST['ar_copyrights'];
        $facebook_link_value = safe_input($_POST['facebook_link']);
        $youtube_link_value = safe_input($_POST['youtube_link']);
        $instagram_link_value = safe_input($_POST['instagram_link']);
        $linkedin_link_value = safe_input($_POST['linkedin_link']);

        $update_main_settings = @mysql_query("update main_settings set
        site_name='$site_name_value',
        ar_site_name='$ar_site_name_value',
        site_url='$site_url_value',
        site_mail='$site_mail_value',
        phone='$phone_value',
        address='$address_value',
        ar_address='$ar_address_value',
        copyrights='$copyrights_value',
        ar_copyrights='$ar_copyrights_value',
        facebook_link='$facebook_link_value',
        youtube_link='$youtube_link_value',
        instagram_link='$instagram_link_value',
        linkedin_link='$linkedin_link_value'
        ") or die(mysql_error());

        header("Location: index.php?cpages=pages/main_settings");

    }

    ?>
    <section id="main-content">
          <section class="main-setting-page wrapper site-min-height">
            <h3> &nbsp;&nbsp;Main Settings</h3>

            <form action="index.php?cpages=pages/main_settings" method="post">
            <table class="table">
                <tr>
                    <td style="width: 25%;">English Site Name</td>
                    <td><input type="text" name="site_name" value="<?php echo $main_settings['site_name'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Arabic Site Name</td>
                    <td><input type="text" name="ar_site_name" value="<?php echo $main_settings['ar_site_name'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Site URL</td>
                    <td><input type="text" name="site_url" value="<?php echo $main_settings['site_url'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Site Email</td>
                    <td><input type="text" name="site_mail" value="<?php echo $main_settings['site_mail'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Phone</td>
                    <td><input type="text" name="phone" value="<?php echo $main_settings['phone'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">English Address</td>
                    <td><input type="text" name="address" value="<?php echo $main_settings['address'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Arabic Address</td>
                    <td><input type="text" name="ar_address" value="<?php echo $main_settings['ar_address'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">English Copyrights</td>
                    <td><input type="text" name="copyrights" value="<?php echo $main_settings['copyrights'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Arabic Copyrights</td>
                    <td><input type="text" name="ar_copyrights" value="<?php echo $main_settings['ar_copyrights'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Facebook Link</td>
                    <td><input type="text" name="facebook_link" value="<?php echo $main_settings['facebook_link'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Youtube Link</td>
                    <td><input type="text" name="youtube_link" value="<?php echo $main_settings['youtube_link'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Instagram Link</td>
                    <td><input type="text" name="instagram_link" value="<?php echo $main_settings['instagram_link'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Linked-in Link</td>
                    <td><input type="text" name="linkedin_link" value="<?php echo $main_settings['linkedin_link'];?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="save" value="Save" /></td>
                </tr>
            </table>
            </form>
        </section>
</section>