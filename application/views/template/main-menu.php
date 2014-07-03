<?php
    if ($this->session->flashdata('success')) {
        echo '<div class="container_12" id="alert-hide">';
            echo "<div class='grid_12 alert alert-success'>";
                echo $this->session->flashdata('success');
            echo "</div>";
        echo "</div>";
    }

    if ($this->session->flashdata('error')) {
    echo '<div class="container_12">';
        echo "<div class='grid_12 alert alert-error'>";
            echo $this->session->flashdata('error');
        echo "</div>";
    echo "</div>";
    }
?>

<!-- HEADER -->
    <header class="header fixed">
        <div class="container_12">
            <div class="grid_2">
                <a href="<?php echo base_url(); ?>" class="logo"><?php echo $this->lang->line('common_site_name'); ?></a>
            </div>
            <div class="grid_10 aligned right">
                <a href="<?php echo base_url(); ?>" class="top-btn button transparent-white narrow">Home</a>
                <?php
                if($this->session->userdata('user_type')) {
                    if($this->session->userdata('user_type') == 'candidate') {
                        // candidate is logged in
                    ?>
                        <a href="<?php echo base_url(); ?>candidates" class="top-btn button transparent-blue narrow">Dashboard</a>
                        <a href="<?php echo base_url(); ?>launch/logout" class="top-btn button narrow">Logout</a>
                    <?php
                    }

                    if($this->session->userdata('user_type') == 'recruiter') {
                        // recruiter is logged in
                    ?>
                        <a href="<?php echo base_url(); ?>recruiters" class="top-btn button transparent-green narrow">Dashboard</a>
                        <a href="<?php echo base_url(); ?>launch/logout" class="top-btn button narrow">Logout</a>
                    <?php
                    }
                } else {
                ?>
                <a href="<?php echo base_url(); ?>launch/candidates" class="top-btn button transparent-blue narrow">Candidates</a>
                <a href="<?php echo base_url(); ?>launch/recruiters" class="top-btn button transparent-green narrow">Recruiters</a>
                <?php
                }
                ?>
            </div>
        </div>
    </header> <!-- /header -->

    <!-- <div class="extendmenu">
        <div class="wrap">
            <header class="content-header container_12 aligned right">
                <div class="grid_12">
                    <a href="#" class="menu-close button transparent-gray narrow">Close</a>
                </div>
            </header>
            <article class="container_12 content vpadding-large inverse">
                <div class="grid_3">
                    <h3><a href="index.html">Home</a></h3>
                    <ul>
                        <li><a href="index.html">Company</a></li>
                        <li><a href="mainPersonal.html">Personal</a></li>
                        <li><a href="mainProduct.html">Product</a></li>
                        <li>&nbsp;</li>
                        <li><a href="countdown.html">Coming Soon</a></li>
                        <li><a href="countdown.html#subscribe">Subscribe</a></li>
                    </ul>
                </div>
                <div class="grid_3">
                    <h3>Pages</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="clients.html">Clients</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a href="inspiration.html">Inspiration</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </div>
                <div class="grid_3">
                    <h3>Works</h3>
                    <ul>
                        <li><a href="works.html#all">All Works</a></li>
                        <li><a href="works.html#branding">Branding</a></li>
                        <li><a href="works.html#drawing">Drawing</a></li>
                        <li><a href="works.html#illustration">Illustration</a></li>
                        <li><a href="works.html#architecture">Architecture</a></li>
                        <li>&nbsp;</li>
                        <li><a href="works.html">Small</a></li>
                        <li><a href="works_medium.html">Medium</a></li>
                        <li><a href="works_large.html">Large</a></li>
                    </ul>
                </div>
                <div class="grid_3">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="contact.html">Full Contacts</a></li>
                        <li><a href="contact-form.html">Contact Form</a></li>
                        <li><a href="contact-simple.html">Simple</a></li>
                    </ul>
                </div>
            </article>
            <footer class="content-footer aligned center">
                <ul class="social">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                </ul>
            </footer>
        </div>
    </div> -->