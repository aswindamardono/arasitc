        <?php 
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div  class=" py-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-7 comp-grid">
                        <div class=""><div class="fadeIn animated mb-4">
                            <img width="300px" src="assets/images/logo stiker shadow.png" class="object" data-value="-5"/>
                        </div>
                        </div><div class=""><style>
                        body {
                        margin: auto;
                        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
                        overflow: auto;
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
                        animation: gradient 8s ease infinite;
                        background-size: 400% 400%;
                        background-attachment: fixed;
                        min-height: 100vh;
                        }
                        @keyframes gradient {
                        0% {
                        background-position: 0% 0%;
                        }
                        50% {
                        background-position: 100% 100%;
                        }
                        100% {
                        background-position: 0% 0%;
                        }
                        }
                        .wave {
                        background: rgb(255 255 255 / 10%);
                        border-radius: 1000% 1000% 0 0;
                        position: fixed;
                        width: 200%;
                        height: 12em;
                        animation: wave 10s -3s linear infinite;
                        transform: translate3d(0, 0, 0);
                        opacity: 0.4;
                        bottom: 0;
                        left: 0;
                        z-index: -1;
                        backdrop-filter: blur(10px);
                        }
                        .wave:nth-of-type(2) {
                        bottom: -1.25em;
                        animation: wave 18s linear reverse infinite;
                        opacity: 0.3;
                        }
                        .wave:nth-of-type(3) {
                        bottom: -2.5em;
                        animation: wave 20s -1s reverse infinite;
                        opacity: 0.2;
                        }
                        @keyframes wave {
                        2% {
                        transform: translateX(1);
                        }
                        25% {
                        transform: translateX(-25%);
                        }
                        50% {
                        transform: translateX(-50%);
                        }
                        75% {
                        transform: translateX(-25%);
                        }
                        100% {
                        transform: translateX(1);
                        }
                        }
                        .containernew img{
                        position: absolute;
                        width: 200%;
                        height: 200%;
                        top: 0;
                        left: 0;
                        object-fit: contain;
                        }
                        h2 {
                        position: absolute;
                        z-index: 1;
                        color: white;
                        font-weight: 700;
                        font-size: 2.5rem;
                        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                        letter-spacing: 0.5px;
                        }
                                            .modern-card {
                        background: rgba(255, 255, 255, 0.95);
                        backdrop-filter: blur(20px);
                        border-radius: 20px;
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                        animation: slideUp 0.6s ease-out;
                        }
                        @keyframes slideUp {
                        from {
                        opacity: 0;
                        transform: translateY(30px);
                        }
                        to {
                        opacity: 1;
                        transform: translateY(0);
                        }
                        }
                        .modern-card h4 {
                        color: #667eea;
                        font-weight: 700;
                        margin-bottom: 1.5rem;
                        font-size: 1.5rem;
                        }
                        .modern-card hr {
                        border: none;
                        height: 2px;
                        background: linear-gradient(90deg, transparent, #667eea, transparent);
                        margin: 1rem 0;
                        }
                        .modern-input {
                        border: none;
                        border-bottom: 2px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 12px 0;
                        background: transparent;
                        transition: all 0.3s ease;
                        font-size: 0.95rem;
                        }
                        .modern-input:focus {
                        outline: none;
                        border-bottom-color: #667eea;
                        background: rgba(102, 126, 234, 0.05);
                        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
                        }
                        .input-group-text {
                        background: transparent;
                        border: none;
                        color: #667eea;
                        font-size: 1.1rem;
                        border-bottom: 2px solid #e0e0e0;
                        }
                        .modern-btn {
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        border: none;
                        border-radius: 10px;
                        padding: 12px 30px;
                        font-weight: 600;
                        color: white;
                        transition: all 0.3s ease;
                        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
                        position: relative;
                        overflow: hidden;
                        }
                        .modern-btn:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
                        }
                        .modern-btn:active {
                        transform: translateY(0);
                        }
                        .modern-btn i {
                        margin-left: 6px;
                        }
                        .success-btn {
                        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                        }
                        .success-btn:hover {
                        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.6);
                        }
                        .checkbox-custom {
                        accent-color: #667eea;
                        cursor: pointer;
                        }
                        .reset-link {
                        color: #ff6b6b;
                        text-decoration: none;
                        transition: all 0.3s ease;
                        font-weight: 500;
                        }
                        .reset-link:hover {
                        color: #ff5252;
                        text-decoration: underline;
                        }
                    </style>
                    <div class="fadeIn animated mb-4">
                        <div class="text-capitalize">
                            <h2>Welcome To Data Center ArasITC new</h2>
                        </div>
                    </div>
                    <div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                        <div class="wave"></div>
                    </div>
                    <div class="containernew">
                        <img src="assets/images/1.png" class="object" data-value="20" />
                        <img src="assets/images/2.png" class="object" data-value="6" />
                        <img src="assets/images/3.png" class="object" data-value="4" />
                        <img src="assets/images/4.png" class="object" data-value="-6" />
                        <img src="assets/images/5.png" class="object" data-value="8" />
                        <img src="assets/images/7.png" class="object" data-value="5" />
                        <img src="assets/images/8.png" class="object" data-value="-9" />
                        <img src="assets/images/9.png" class="object" data-value="-15" />
                    </div>
                    <script type="text/javascript">
                        document.addEventListener("mousemove", parallax);
                        function parallax(e){
                        document.querySelectorAll(".object").forEach(function(move){
                        var moving_value = move.getAttribute("data-value");
                        var x = (e.clientX * moving_value) / 250;
                        var y = (e.clientY * moving_value) / 250;
                        move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
                        });
                        }
                    </script></div>
                </div>
                <div class="col-md-5 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    
                    <div class="modern-card p-5 animated bounceInRight page-content">
                        <div>
                            <h4><i class="fa fa-lock" style="margin-right: 8px;"></i>Masuk</h4>
                            <hr />
                            <?php 
                            $this :: display_page_errors(); 
                            ?>
                            <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                <div class="input-group form-group mb-4">
                                    <input placeholder="Email" name="username" required="required" class="form-control modern-input" type="text" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="input-group form-group mb-4">
                                    <input placeholder="Password" required="required" v-model="user.password" name="password" class="form-control modern-input" type="password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                </div>
                                <div class="row clearfix mt-4 mb-4">
                                    <div class="col-6">
                                        <label class="checkbox-label">
                                            <input type="checkbox" value="true" name="rememberme" class="checkbox-custom" />
                                            <span style="margin-left: 6px;">Ingat Saya</span>
                                        </label>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="<?php print_link('passwordmanager') ?>" class="reset-link">Lupa Password?</a>
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4 mb-3">
                                    <button class="btn modern-btn btn-block btn-lg" type="submit"> 
                                        <i class="load-indicator">
                                            <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                        </i>
                                        Masuk <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                                <hr />
                                <div class="text-center" style="margin-top: 1.5rem;">
                                    <p style="color: #666; margin-bottom: 1rem;">Belum punya akun?</p>
                                    <a href="<?php print_link("index/register") ?>" class="btn modern-btn success-btn btn-block">
                                        <i class="fa fa-user-plus" style="margin-right: 8px;"></i>Gas Daftar!
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    