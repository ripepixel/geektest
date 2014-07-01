<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse extra-overlay vpadding-strong top">
                <div class="slide-img mapbg"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Create Your Campaign</h1>
                    </div>
                    <div class="separator large"></div>
                </article>
            </div>
        </section>

        <section id="policy">
            <div class="wrap">
            <form action="" method="post">
                <header class="content-header"></header>
                <article class="container_12 content">
                    <div class="grid_3">
                        
                    </div>
                    
                    <div class="grid_9">
                        <h2>Enter The Job Details</h2>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Job Title</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="title" required>
                        <?php if(form_error('title')) { echo form_error('title'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Location</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="location" required>
                        <?php if(form_error('location')) { echo form_error('location'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Salary Type</h2>
                    </div>
                    
                    <div class="grid_9">
                        <select name="salary_type">
                            <?php foreach($salary_types as $st) { ?>
                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if(form_error('salary_type')) { echo form_error('salary_type'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Salary</h2>
                    </div>
                    
                    <div class="grid_4">
                        <input type="text" name="salary_from" placeholder="From">
                        <?php if(form_error('salary_from')) { echo form_error('salary_from'); } ?>
                    </div>
                    <div class="grid_1">
                        
                    </div>
                    <div class="grid_4">
                        <input type="text" name="salary_to" placeholder="To" required>
                        <?php if(form_error('salary_to')) { echo form_error('salary_to'); } ?>
                    </div>
                </article>

                

                <article class="container_12 content">
                    <div class="grid_3">
                        <label for="job_type"><h2>Job Type</h2></label>
                    </div>
                    
                    <div class="grid_9">
                        <select name="job_type">
                            <?php foreach($job_types as $jt) { ?>
                                <option value="<?php echo $jt['id']; ?>"><?php echo $jt['name']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if(form_error('job_type')) { echo form_error('job_type'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Job Description</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea name="details" required></textarea>
                        <?php if(form_error('details')) { echo form_error('details'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Expiry Date</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="date" name="expiry_date">
                        <?php if(form_error('expiry_date')) { echo form_error('expiry_date'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        
                    </div>
                    
                    <div class="grid_9">
                        <h2>Choose Testing Options</h2>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Choose Test</h2>
                    </div>

                    <div class="grid_9">
                        <ul>
                        <?php foreach($tests as $test) { ?>
                            <li><input type="radio" name="test" value="<?php echo $test['id']; ?>"> <?php echo $test['name']; ?></li>
                        <?php } ?>
                        </ul>

                    </div>
                
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Send Reports To</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="email" name="report_email" value="<?php echo $this->session->userdata('user_email'); ?>">
                        <?php if(form_error('report_email')) { echo form_error('report_email'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                    </div>

                    <div class="grid_9">
                       <input type="submit" value="Create" class="button">
                    </div>
                
                </article>

                <footer class="content-footer"></footer>
            </form>
            </div>


            

        </section>

    </div> <!-- /wrapper -->