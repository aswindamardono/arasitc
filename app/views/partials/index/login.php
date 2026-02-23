
<div class="login-container" id="container">
    
    <!-- Login Form (Sign In) -->
    <div class="form-box login">
        <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
            <h1>Sign In</h1>
            <div class="input-box">
                <input placeholder="Username / Email" name="username" required="required" type="text" />
                <i class="fa fa-user"></i>
            </div>
            <div class="input-box">
                <input placeholder="Password" required="required" name="password" type="password" />
                <i class="fa fa-lock"></i>
            </div>
            
            <div class="forgot-link">
                <a href="<?php print_link('passwordmanager') ?>">Forgot Your Password?</a>
            </div>

             <div style="width: 100%; text-align: left; font-size: 13px; margin-bottom: 10px;">
                <input type="checkbox" id="rememberme" name="rememberme" value="true" style="width: auto; margin-right: 5px;">
                <label for="rememberme">Remember Me</label>
            </div>

            <button type="submit" class="btn-auth">Sign In</button>
            <p>or login with social platforms</p>
            <div class="social-icons">
                <a href="#" class="google"><i class="fa fa-google"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="github"><i class="fa fa-github"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
        </form>
    </div>

    <!-- Register Form (Sign Up) -->
    <div class="form-box register">
        <form id="user-userregister-form" role="form" novalidate enctype="multipart/form-data" class="form page-form needs-validation" action="<?php print_link("index/register?csrf_token=" . Csrf::$token) ?>" method="post">
            <h1 style="font-size: 28px;">Registration</h1>
            
            <div class="input-box" style="margin: 10px 0;">
                <input value="<?php echo $this->set_field_value('username',""); ?>" type="text" placeholder="Nama Lengkap" required name="username" />
                <i class="fa fa-user"></i>
            </div>
            
            <div class="input-box" style="margin: 10px 0;">
                <input value="<?php echo $this->set_field_value('email',""); ?>" type="email" placeholder="Email Address" required name="email" />
                <i class="fa fa-envelope"></i>
            </div>

             <div class="input-box" style="margin: 10px 0;">
                <input type="password" placeholder="Password" required name="password" />
                <i class="fa fa-lock"></i>
            </div>
             <div class="input-box" style="margin: 10px 0;">
                <input type="password" name="confirm_password" required placeholder="Confirm Password" />
                <i class="fa fa-lock"></i>
            </div>

            <!-- Additional fields from original form -->
             <div class="input-box" style="margin: 10px 0;">
                <input class="datepicker" required value="<?php echo $this->set_field_value('tgl_lahir',""); ?>" type="text" name="tgl_lahir" placeholder="Tanggal Lahir (YYYY-MM-DD)" data-date-format="Y-m-d" />
                <i class="fa fa-calendar"></i>
            </div>
             <div class="input-box" style="margin: 10px 0;">
                <input value="<?php echo $this->set_field_value('no_hp',""); ?>" type="text" placeholder="No HP (WA)" required name="no_hp" />
                <i class="fa fa-phone"></i>
            </div>
             <div class="input-box" style="margin: 10px 0;">
                 <input value="<?php echo $this->set_field_value('instansi',""); ?>" type="text" placeholder="Instansi" required name="instansi" />
                 <i class="fa fa-building"></i>
            </div>

            <textarea placeholder="Alamat Lengkap" required rows="2" name="alamat" style="width:100%; border:none; background:#eee; padding:10px; border-radius:8px; margin:8px 0;"><?php echo $this->set_field_value('alamat',""); ?></textarea>
            
            <select required name="materi" style="width:100%; border:none; background:#eee; padding:10px; border-radius:8px; margin:8px 0;">
                <option value="">Pilih Paket Materi...</option>
                <?php
                $materi_options = Menu :: $materi;
                if(!empty($materi_options)){
                    foreach($materi_options as $option){
                        $selected = $this->set_field_selected('materi', $option['value'], "");
                        echo "<option $selected value='{$option['value']}'>{$option['label']}</option>";
                    }
                }
                ?>
            </select>
            
             <div class="dropzone" input="#ctrl-photo" fieldname="photo" data-multiple="false" dropmsg="Upload Photo" btntext="Browse" extensions=".jpg,.png,.jpeg" filesize="10" maximum="1" style="min-height: 50px; padding: 5px; width: 100%; margin: 8px 0; background: #eee; border-radius: 8px;">
                <input name="photo" id="ctrl-photo" class="dropzone-input" value="<?php echo $this->set_field_value('photo',""); ?>" type="text" />
                <div class="dz-file-limit text-center text-muted small"></div>
            </div>

            <button type="submit" class="btn-auth">Register</button>
        </form>
    </div>

    <!-- Toggle Container (Overlay) -->
    <div class="toggle-box">
        <div class="toggle-panel toggle-left">
            <h1>Hello, Welcome!</h1>
            <p>Don't have an account?</p>
            <button class="btn-auth register-btn" id="register">Register</button>
        </div>

        <div class="toggle-panel toggle-right">
            <h1>Welcome Back!</h1>
            <p>Already have an account?</p>
            <button class="btn-auth login-btn" id="login">Login</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });

    // Check URL params to see if we should show register by default
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('mode') === 'register') {
        container.classList.add("active");
    }
});
</script>
