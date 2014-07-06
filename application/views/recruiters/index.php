<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse extra-overlay vpadding-strong top">
                <div class="slide-img mapbg"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Welcome to your dashboard</h1>
                    </div>
                    <div class="separator large"></div>
                </article>
            </div>
        </section>

        <section id="policy">           

            <div class="wrap">
                <header class="content-header"></header>
                <article class="container_12 content">
                    <div class="grid_4">
                        <h2>Your Campaigns</h2>
                        <h4>View jobs and applicants</h4>
                    </div>
                    
                    <div class="grid_8">
                        <p>You currently have <strong><?php echo $credits; ?></strong> campaigns to use.</p>
                        <h3>Your Current Campaigns</h3>
                        <?php
                        if($campaigns) { ?>
                            <table>
                                <tr>
                                    <th>Title</th>
                                    <th>Test</th>
                                    <th>Expires</th>
																		<th>Actions</th>
                                </tr>
                                <tbody>
                        <?php
                            foreach($campaigns as $c) { ?>
                                <tr>
                                    <td><?php echo $c['title']; ?></td>
                                    <td><?php echo $c['test_name']; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($c['expiry_date'])); ?></td>
																		<td><a href="<?php echo base_url(); ?>campaigns/edit/<?php echo $c['id']; ?>/<?php echo url_title($c['title']); ?>">Edit</a></td>
                                </tr>
                        <?php } ?>
                            </tbody>
                            </table>
                        <?php } else { ?>
                            <p>You have not yet created any campaigns.</p>
                        <?php } ?>
                        <a href="<?php echo base_url(); ?>campaigns/create" class="button transparent-blue"><span>Create Campaign</span></a>
                        <a href="about.html" class="button transparent-green"><span>View All Campaigns</span></a>
                    </div>
                </article>
                <footer class="content-footer"></footer>
            </div>

						<div class="wrap">
                <header class="content-header"></header>
                <article class="container_12 content">
                    <div class="grid_4">
                        <h2>Your Details</h2>
                        <h4>Enter your company details</h4>
                    </div>
                    
                    <div class="grid_8">
                        <p>Complete your online profile so that potential recruiters can match you to jobs. You can also upload your current CV.</p>
                        <a href="" class="button transparent-green"><span>Company Details</span></a>
                    </div>
                </article>
                <footer class="content-footer"></footer>
            </div>


        </section>

    </div> <!-- /wrapper -->