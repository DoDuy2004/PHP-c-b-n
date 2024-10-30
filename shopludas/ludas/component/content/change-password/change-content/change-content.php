<?php
    include $level.DATABASE_PATH.'db.php';
    $error = "";
    if(isset($_POST['btn']))
    {
        $curPass = $_POST['cpass'];

        $newPass = $_POST['npass'];
        $cfPass = $_POST['cfnpass'];

        $check = $db -> prepare('SELECT MATKHAU from khachhang where MATKHAU = :pass');
        $check -> bindValue(':pass', $curPass, PDO::PARAM_STR);
        $check -> execute();
        $result = $check -> fetch();

        if(!empty($result))
        {
            $change = $db -> prepare('UPDATE khachhang set `MATKHAU` = :MATKHAU WHERE khachhang.ID = :ID');
            $change -> bindValue(':MATKHAU', $newPass, PDO::PARAM_STR);
            $change -> bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
            if($change -> execute())
            {
                echo "
                <script>
                    var confirmation = confirm('Password changed successfully');
                    if (confirmation) {
                        window.location.href = '../pages/dash-my-profile.php'; // Đường dẫn đến trang giỏ hàng
                    } else {

                    }
                </script>
                ";
            }
        }
        else
           $error ='Current password is incorrect';
    }
 
?>
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'dashboard_feature.php') ?>
                    <div class="col-lg-9 col-md-12">
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                            <div class="dash__pad-2">
                                <h1 class="dash__h1 u-s-m-b-14">Change Password</h1>

                                <span class="dash__text u-s-m-b-30">Your password must be at least six characters and should include a combination of numbers, letters and special characters (!$@%).</span>
                                <form class="dash-address-manipulation" id="frm_reg" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                    <div class="">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-fname">Current Password *</label>

                                            <input class="input-text input-text--primary-style" id="cp" name="cpass" type="password"  placeholder="Current Password">
                                            <p style="color: red; margin: .4rem 0 0 .4rem;"><?php if(!empty($error)) echo $error ?></p>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-lname">New Password *</label>

                                            <input class="input-text np input-text--primary-style" id="np" name="npass" type="password"  placeholder="New Password">
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-phone">Retype New Password *</label>

                                            <input class="input-text cfnp input-text--primary-style" id="cfnp" name="cfnpass" type="password"  placeholder="New Password">
                                        </div>
                                        <ul class="error" style="display: none;">
                                            
                                        </ul>
                                    </div>
                                    <button class="btn btn--e-brand-b-2" name="btn" type="submit">SAVE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<script>

    document.getElementById('frm_reg').onsubmit = function(e)
    {
        var cpass=document.querySelector('#cp').value;
        var npass=document.querySelector('#np').value;
        var cfnpass=document.querySelector('#cfnp').value;
        var error='';
        if(cpass.length == 0 || npass.length == 0 || cfnpass.length == 0)
        {
            e.preventDefault();
            error+= '<li style="color: red;">The password cannot be empty</li>';
        }
        if(npass != cfnpass)
        {
            e.preventDefault();
            error+= '<li style="color: red;">The new password and confirm password do not match</li>';
        }
        var msg = document.querySelector('ul.error');
        msg.innerHTML=error;
        msg.style.display = 'block';
    }
</script>