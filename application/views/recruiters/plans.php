<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse dark-overlay vpadding-strong anima">
                <div class="slide-img fslide-2"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Plans & Pricing</h1>
                        <p class="light-gray">Please choose your payment plan, below.</p>
                    </div>
                </article>
            </div>
        </section>

        <!-- SECTION -->
        <section id="plansheader">
            <div class="wrap">
                <header class="content-header"></header>
                <article class="container_12 content aligned center">
                    <div class="grid_8">
                        <img src="<?php echo base_url(); ?>images/ico-plans.png" alt="">
                        <div class="separator thin"></div>
                        <p>Each campaign includes a job listing and unlimited testing for the potential candidates. Job listings run from 30 to 60 days depending on your package.</p>
                        <div class="separator thin"></div>
                        <!-- <nav class="nav-currency">
                            <a href="#" class="selected" data-currency="£">GBP</a>
                            <a href="#" class="" data-currency="$">USD</a>
                            <ins></ins>
                        </nav> -->
                    </div>
                </article>
                <footer class="content-footer"></footer>
            </div>
        </section>

        <!-- SECTION -->
        <section id="planstable">
            <div class="wrap slider pricing">
                <article class="container_12 content">
                    <ul class="sliderwrap">
                        <li class="aligned center" data-period="Monthly">
                            <div class="grid_12 prefix_3 suffix_6">
                                <h6>most popular</h6>
                            </div>
                            <div class="equal">
                                <?php
                                $c = 0;
                                    foreach($plans as $plan) {
                                         // set up variable for alternate colours
                                        $payment = ($plan['payment_period'] == 'monthly') ? 'per month' : 'one payment';
                                        $campaigns = ($plan['credits'] == 99999) ? 'Unlimited Campaigns' : $plan['credits'].' Campaign(s)';
                                        $border_top = ($plan['is_featured'] == 1) ? 'border-top' : '';
                                        $button = ($plan['is_featured'] == 1) ? 'button' : 'button transparent-gray';
                                        $has_trial = ($plan['free_period'] > 0) ? '<h6>'.$plan['free_period'].' days trial</h6>' : '';
                                        $access_cvs = ($plan['can_access_cv'] == 1) ? 'Access to CV database' : '&mdash;';

                                ?>
                                        <div class="grid_3 <?php echo ($c++%2==1) ? 'bg-grey rounded' : ''; ?> <?php echo $border_top; ?>">
                                            <h2><?php echo $plan['name']; ?></h2>
                                            <div class="num" data-pounds="<?php echo (int)$plan['price']; ?>"><sup>£</sup><ins><?php echo (int)$plan['price']; ?></ins></div>
                                            <h6 class="grey-c"><?php echo $payment; ?></h6>
                                            <div class="separator"></div>
                                            <p><?php echo $campaigns; ?><br>Unlimited Tests<br><?php echo $plan['job_days']; ?> Day Job Listing<br><?php echo $access_cvs; ?></p>
                                            <a href="<?php echo base_url(); ?>recruiters/your_order/<?php echo $plan['id']; ?>" class="<?php echo $button; ?>">Buy Now</a>
                                            <?php echo $has_trial; ?>
                                        </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </li>
                        
                    </ul>
                </article>
                 <footer class="content-footer vpadding-large bottom"></footer>
                    
                </footer>
            </div>
        </section>

        

    </div> <!-- /wrapper -->
