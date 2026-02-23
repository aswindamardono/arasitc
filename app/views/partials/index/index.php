        <?php 
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div  class=" py-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-8 comp-grid">
                        <div class=""><div class="fadeIn animated mb-4">
                            <img width="300px" src="assets/images/logo stiker shadow.png" class="object" data-value="-5"/>
                        </div>
                        </div><div class=""><style>
                        body {
                        margin: auto;
                        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                        overflow: auto;
                        background: linear-gradient(315deg, rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%, rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%);
                        animation: gradient 15s ease infinite;
                        background-size: 400% 400%;
                        background-attachment: fixed;
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
                        background: rgb(255 255 255 / 25%);
                        border-radius: 1000% 1000% 0 0;
                        position: fixed;
                        width: 200%;
                        height: 12em;
                        animation: wave 10s -3s linear infinite;
                        transform: translate3d(0, 0, 0);
                        opacity: 0.8;
                        bottom: 0;
                        left: 0;
                        z-index: -1;
                        }
                        .wave:nth-of-type(2) {
                        bottom: -1.25em;
                        animation: wave 18s linear reverse infinite;
                        opacity: 0.8;
                        }
                        .wave:nth-of-type(3) {
                        bottom: -2.5em;
                        animation: wave 20s -1s reverse infinite;
                        opacity: 0.9;
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
                        h2
                        {
                        position: absolute;
                        z-index: 1;
                        }
                    </style>
                    <div class="fadeIn animated mb-4">
                        <div class="text-capitalize">
                            <h2>Welcome To Data Center ArasITC</h2>
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
                <div class="col-md-4 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    
                    <div  class="card p-4 animated bounceInRight page-content">
                        <div>
                            <h4><i class="fa fa-key"></i> User Login</h4>
                            <hr />
                            <?php 
                            $this :: display_page_errors(); 
                            ?>
                            <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                <div class="input-group form-group">
                                    <input placeholder="Username Or Email" name="username"  required="required" class="form-control" type="text"  />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <input  placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
                                    </div>
                                </div>
                                <div class="row clearfix mt-3 mb-3">
                                    <div class="col-6">
                                        <label class="">
                                            <input value="true" type="checkbox" name="rememberme" />
                                            Remember Me
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                        <i class="load-indicator">
                                            <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                        </i>
                                        Login <i class="fa fa-key"></i>
                                    </button>
                                </div>
                                <hr />
                                <div class="text-center">
                                    Don't Have an Account? <a href="<?php print_link("index/register") ?>" class="btn btn-success">Register
                                    <i class="fa fa-user"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    