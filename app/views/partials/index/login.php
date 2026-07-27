
<style>
@keyframes floatInPage {
    0% {
        opacity: 0;
        transform: translateY(60px) scale(0.93);
    }
    65% {
        opacity: 1;
        transform: translateY(-8px) scale(1.01);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes floatContinuous {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes floatInChild {
    0% {
        opacity: 0;
        transform: translateY(25px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.login-container {
    opacity: 0;
    animation: floatInPage 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.1s forwards, floatContinuous 5s ease-in-out infinite 1s !important;
}

.login-container .form-box.login h1,
.login-container .form-box.login .input-box,
.login-container .form-box.login .forgot-link,
.login-container .form-box.login .btn-auth,
.login-container .form-box.login .social-icons,
.login-container .toggle-panel {
    animation: floatInChild 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.login-container .form-box.login h1 { animation-delay: 0.25s; }
.login-container .form-box.login .input-box:nth-of-type(1) { animation-delay: 0.35s; }
.login-container .form-box.login .input-box:nth-of-type(2) { animation-delay: 0.45s; }
.login-container .form-box.login .btn-auth { animation-delay: 0.55s; }
.login-container .toggle-panel.toggle-left { animation-delay: 0.35s; }

/* Mobile responsiveness adjustments for toggle header panel */
@media screen and (max-width: 650px) {
    .toggle-panel.toggle-left {
        top: 0;
        padding-top: 8px !important;
        justify-content: flex-start !important;
    }

    .toggle-panel.toggle-left img {
        width: 200px !important;
        max-height: 200px !important;
        object-fit: contain !important;
        margin-bottom: 2px !important;
    }

    .toggle-panel.toggle-left h1 {
        font-size: 25px !important;
        margin-bottom: 2px !important;
    }

    .toggle-panel.toggle-left p {
        font-size: 12px !important;
        margin-bottom: 2px !important;
    }

    .toggle-panel.toggle-left #register {
        height: 38px !important;
        line-height: 36px !important;
        margin-top: 0 !important;
    }
}

/* Scroll down hint indicator (simple & unobtrusive) */
.scroll-down-hint {
    position: absolute;
    bottom: 12px;
    left: 50%;
    transform: translateX(-50%);
    width: 32px;
    height: 32px;
    background: rgba(0, 180, 216, 0.85);
    color: #ffffff;
    border-radius: 50%;
    font-size: 13px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 10;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.3s ease, transform 0.3s ease, background-color 0.2s ease;
    user-select: none;
    backdrop-filter: blur(4px);
    pointer-events: none;
    opacity: 0;
}

.scroll-down-hint:hover {
    background: rgba(0, 119, 182, 0.95);
}

.bounce-arrow {
    animation: bounceDown 1.4s infinite;
}

@keyframes bounceDown {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(4px);
    }
    60% {
        transform: translateY(2px);
    }
}
</style>

<div class="login-container" id="container">
    
    <!-- Login Form (Sign In) -->
    <div class="form-box login">
        <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
            <h1>Sign In</h1>
            <?php $this :: display_page_errors(); ?>
            <div class="input-box">
                <input placeholder="Username / Email" name="username" required="required" type="text" />
                <i class="fa fa-user"></i>
            </div>
            <div class="input-box">
                <input placeholder="Password" required="required" name="password" type="password" />
                <i class="fa fa-lock"></i>
            </div>
            
            <div class="forgot-link">
                <a href="<?php print_link('passwordmanager') ?>">Lupa Password?</a>
            </div>

             <div style="width: 100%; text-align: left; font-size: 13px; margin-bottom: 10px;">
                <input type="checkbox" id="rememberme" name="rememberme" value="true" style="width: auto; margin-right: 5px;">
                <label for="rememberme">Ingat identitas saya</label>
            </div>

            <button type="submit" class="btn-auth">Login</button>
            <!-- <p>Follow media sosial kami ya !</p>
            <div class="social-icons">
                <a href="#" class="google"><i class="fa fa-youtube"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="github"><i class="fa fa-github"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-instagram"></i></a>
            </div> -->
        </form>
    </div>

    <!-- Register Form (Sign Up) -->
    <div class="form-box register">
        <form id="user-userregister-form" role="form" novalidate enctype="multipart/form-data" class="form page-form needs-validation" action="<?php print_link("index/register?csrf_token=" . Csrf::$token) ?>" method="post">
            <h1 style="font-size: 28px;">Registrasi</h1>
            
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
                <input value="<?php echo $this->set_field_value('no_hp',""); ?>" type="tel" placeholder="No HP (WA)" required name="no_hp" />
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

            <button type="submit" class="btn-auth">Daftar</button>
        </form>
        <div class="scroll-down-hint" id="scroll-hint-register" title="Gulir ke bawah">
            <i class="fa fa-chevron-down bounce-arrow"></i>
        </div>
    </div>

    <!-- Toggle Container (Overlay) -->
    <div class="toggle-box">
        <div class="toggle-panel toggle-left">
            <img width="220px" src="<?php print_link("assets/images/logo stiker shadow.png") ?>">
            <h1 style="color : white">Welcome Guys</h1>
            <p>Udah punya akun belum?</p>
            <button class="btn-auth register-btn" id="register">Daftar disini !</button>
        </div>

        <div class="toggle-panel toggle-right">
            <h1 style="font-size: 30px">Welcome Back!</h1>
            <p style="font-size: 14px">Bagi yang sudah punya akun klik disini !</p>
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
        setTimeout(checkScrollRegister, 400);
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });

    // Check URL params to see if we should show register by default
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('mode') === 'register') {
        container.classList.add("active");
    }

    // Scroll Down Hint Indicator Logic for Register Form
    const registerFormBox = document.querySelector('.form-box.register');
    const scrollHintRegister = document.getElementById('scroll-hint-register');

    function checkScrollRegister() {
        if (!registerFormBox || !scrollHintRegister) return;
        const isScrollable = registerFormBox.scrollHeight - registerFormBox.clientHeight > 20;
        const isAtBottom = registerFormBox.scrollTop + registerFormBox.clientHeight >= registerFormBox.scrollHeight - 40;

        if (isScrollable && !isAtBottom) {
            scrollHintRegister.style.opacity = '1';
            scrollHintRegister.style.pointerEvents = 'auto';
            scrollHintRegister.style.transform = 'translateX(-50%) translateY(0)';
        } else {
            scrollHintRegister.style.opacity = '0';
            scrollHintRegister.style.pointerEvents = 'none';
            scrollHintRegister.style.transform = 'translateX(-50%) translateY(8px)';
        }
    }

    if (registerFormBox && scrollHintRegister) {
        registerFormBox.addEventListener('scroll', checkScrollRegister);
        window.addEventListener('resize', checkScrollRegister);

        scrollHintRegister.addEventListener('click', function() {
            registerFormBox.scrollBy({
                top: 200,
                behavior: 'smooth'
            });
        });

        // Run checks after render
        checkScrollRegister();
        setTimeout(checkScrollRegister, 300);
        setTimeout(checkScrollRegister, 800);
    }
});
</script>
