<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse extra-overlay vpadding-strong top">
                <div class="slide-img mapbg"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Find your next developer job</h1>
                        <p class="light-gray">Sign up to upload your CV, take tests and find jobs</p>
                    </div>
                    <div class="separator large"></div>
                </article>
            </div>
        </section>

        <!-- SECTION -->
        <section id="contactform">
            <div class="wrap vpadding-large">
                <article class="container_12 content aligned">
                    <div class="grid_6">
                        <h2>Candidate Login</h2>
                        <form action="<?php echo base_url(); ?>launch/candidate_login" method="post">
                                <label>Email Address</label>
                                <input type="email" name="log_email" id="send-form-email" placeholder="Email">
                                <?php if(form_error('log_email')) { echo form_error('log_email'); } ?>
                                
                                <label>Password</label>
                                <input type="password" name="log_password" placeholder="Password">
                                <?php if(form_error('log_password')) { echo form_error('log_password'); } ?>

                            <input type="submit" class="button" value="Login">
                        </form>
                    </div>

                    <div class="grid_6">
                        <h2>Candidate Register</h2>
                        <form action="<?php echo base_url(); ?>launch/candidate_register" method="post">
                                <label>Email Address</label>
                                <input type="email" name="reg_email" id="send-form-email" placeholder="Email">
                                <?php if(form_error('reg_email')) { echo form_error('reg_email'); } ?>
                                
                                <label>Password</label>
                                <input type="password" name="reg_password" placeholder="Password">
                                <?php if(form_error('reg_password')) { echo form_error('reg_password'); } ?>

                            <input type="submit" class="button" value="Register">
                        </form>
                    </div>

                    <div class="separator large"></div>

                    <div class="grid_6">
                        <h3>Need help?</h3>
                            <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros.</p>
                    </div>

                    <div class="grid_6">
                        <div class="grid_1"><img src="<?php echo base_url(); ?>images/ico-phone.png" alt=""></div>
                        <div class="grid_4">
                            <div class="phonenumber">01204 23 55 10</div>
                            <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros.</p>
                        </div>
                    </div>
                    
                </article>
            </div>
        </section>

    </div> <!-- /wrapper -->