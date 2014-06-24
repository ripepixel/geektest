<?php 
    $campaigns = ($plan->credits == 99999) ? 'Unlimited Campaigns' : $plan->credits.' Campaign(s)';
    $payment = ($plan->payment_period == 'monthly') ? 'Monthly' : 'Once Only';
    $access_cvs = ($plan->can_access_cv == 1) ? true : false;
?>
<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse dark-overlay vpadding-strong anima">
                <div class="slide-img fslide-2"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Your Order</h1>
                    </div>
                </article>
            </div>
        </section>

        <section id="policy">           

            <div class="wrap">
                <header class="content-header"></header>
                <article class="container_12 content">
                    <div class="grid_4">
                        <h2>You have chosen</h2>
                        <h3><?php echo $plan->name; ?> plan</h3>
                        <h4>&pound;<?php echo (int)$plan->price . ' '. $payment; ?></h4>
                    </div>
                    
                    <div class="grid_8">
                    
                        <p>The <strong><?php echo $plan->name; ?></strong> plan which includes <strong><?php echo $campaigns; ?></strong>, unlimited candidate tests and job listings for <strong><?php echo $plan->job_days; ?> days</strong></p>
                        <p>You will be charged a <strong><?php echo $payment; ?> payment of &pound;<?php echo (int)$plan->price; ?></strong>
                        <?php if($plan->free_period > 0) { ?>
                        , starting on <?php echo date('d/m/Y', time() + ($plan->free_period * 24 * 60 * 60)); ?> (this includes your free trial period).
                        <?php } ?>
                        </p>
                        <?php if($access_cvs) { ?>
                        <p>Your plan also gives you unlimited access to our database of candidate CV's.</p>
                        <?php } ?>
                        <p><a href="<?php echo base_url(); ?>recruiters/process_payment/<?php echo $this->uri->segment(3); ?>" class="button">Pay Now</a> or <a href="<?php echo base_url(); ?>recruiters/choose_plan" class="button transparent-gray">Change Plan</a></p>
                    </div>
                </article>
                <footer class="content-footer"></footer>
            </div>

        </section>

        

        

    </div> <!-- /wrapper -->
