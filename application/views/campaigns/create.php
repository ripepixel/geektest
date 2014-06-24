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
                        <h2>Job Title</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="job_title">
                        <?php if(form_error('job_title')) { echo form_error('job_title'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Location</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="location">
                        <?php if(form_error('location')) { echo form_error('location'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Salary</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="salary">
                        <?php if(form_error('salary')) { echo form_error('salary'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Salary Type</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="salary_type">
                        <?php if(form_error('salary_type')) { echo form_error('salary_type'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Job Type</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="job_type">
                        <?php if(form_error('job_type')) { echo form_error('job_type'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Job Description</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea name="details"></textarea>
                        <?php if(form_error('details')) { echo form_error('details'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Expiry Date</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="expiry_date">
                        <?php if(form_error('expiry_date')) { echo form_error('expiry_date'); } ?>
                    </div>
                </article>

                <footer class="content-footer"></footer>
            </form>
            </div>


            

        </section>

    </div> <!-- /wrapper -->