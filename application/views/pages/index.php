 <!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse dark-overlay vpadding-strong anima">
                <div class="slide-img fslide-2"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Find Your Next Developer</h1>
                        <p class="light-gray">Test potential candidates with a variety of programming quizzes, enabling you to weed out</p>
                        <a href="contact-form.html" class="button transparent-white">More Info</a>
                        <a href="<?php echo base_url(); ?>pages/pricing" class="button">Pricing</a>
                    </div>
                </article>
            </div>
        </section>

        <!-- SECTION -->
        <section id="slideserv">
            <div class="wrap slider" data-auto="false" data-fx="crossfade">
                <div class="bg-grey">
                    <article class="container_12 content vpadding-medium">
                        <ul class="sliderwrap">
                            <li class="aligned center">
                                <div class="grid_4">
                                    <img src="images/ico-glasses.png" alt="">
                                    <div class="separator"></div>
                                    <h3>Find Potential Hires</h3>
                                    <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quis ante.</p>
                                </div>
                                <div class="grid_4">
                                    <img src="images/ico-root.png" alt="">
                                    <div class="separator"></div>
                                    <h3>Best Solutions</h3>
                                    <p>Review only the candidates that have passed your criteria.</p>
                                </div>
                                <div class="grid_4">
                                    <img src="images/ico-cloud.png" alt="">
                                    <div class="separator"></div>
                                    <h3>Risk Assessment</h3>
                                    <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quis ante.</p>
                                </div>
                            </li>
                            <li class="aligned center">
                                <div class="grid_4">
                                    <img src="images/ico-root.png" alt="">
                                    <div class="separator"></div>
                                    <h3>Professional Ideas</h3>
                                    <p>Nec odio et ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quis ante.</p>
                                </div>
                                <div class="grid_4">
                                    <img src="images/ico-lamp.png" alt="">
                                    <div class="separator"></div>
                                    <h3>Easy Management</h3>
                                    <p>Ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros libero ace venenatis.</p>
                                </div>
                                <div class="grid_4">
                                    <img src="images/ico-cloud.png" alt="">
                                    <div class="separator"></div>
                                    <h3>Best Solutions</h3>
                                    <p>Odio et ante tincidunt tempus. Donec vitae sapien ut libero ace venenatis faucibus. Nullam quiace venenatis.</p>
                                </div>
                            </li>
                        </ul>
                    </article>
                </div>
                <footer class="content-footer">
                    <nav class="slide-nav dark"></nav>
                </footer>
            </div>
        </section>

        <!-- SECTION -->
        <section id="skils">
            <div class="wrap">
                <article class="container_12 content aligned center">
                    <div class="grid12">
                        <h2>Latest Jobs</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Location</th>
                                    <th>Job Type</th>
                                    <th>Salary</th>
                                    <th>Apply</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($jobs) {
                                    foreach($jobs as $j) { ?>
                                    <tr>
                                        <td><?php echo $j['title']; ?></td>
                                        <td><?php echo $j['location']; ?></td>
                                        <td><?php echo $j['job_type']; ?></td>
                                        <td>&pound;<?php echo (int)$j['salary_from']; ?> to &pound;<?php echo (int)$j['salary_to']; ?> <?php echo $j['salary_type']; ?></td>
                                        <td>Apply Now</td>
                                    </tr>

                                <?php }
                                } else {

                                } ?>
                            </tbody>
                        </table>
                    </div>
                </article>
                <footer class="content-footer"></footer>
            </div>
        </section>

        

        <!-- SECTION -->
        <section id="works">
            <div class="wrap">
                <header class="content-header container_12 aligned center">
                    <div class="grid_8">
                        <div class="separator border"><img src="images/ico-heart.png" alt=""></div>
                    </div>
                </header>
                <article class="container_12 content">
                    <div class="grid_4">
                        <h2>Look at our works</h2>
                        <h4>Best design works</h4>
                    </div>
                    <div class="grid_8">
                        <p>Sed magna purus, fermentum eu, tincidunt eu, varius ut, felis. In auctor lobortis lacus. Quisque libero metus, condimentum nec, tempora, commodo mollis, magna. Vestibulum ullamcorper mauris at ligula. Fusce fermentum. Nullam cursus lacinia erat. Praesent blandit laoreet nibh. Fusce convallis metus id felis luctus adipiscing.</p>
                        <a href="works.html" class="button medium transparent-gray">Portfolio</a>
                    </div>
                </article>
                <footer class="content-footer vpadding-large bottom"></footer>
            </div>
        </section>

    </div> <!-- /wrapper -->