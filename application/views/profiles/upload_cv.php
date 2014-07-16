<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse extra-overlay vpadding-strong top">
                <div class="slide-img mapbg"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Upload Your CV</h1>
                    </div>
                    <div class="separator large"></div>
                </article>
            </div>
        </section>

        <section id="policy">
        <?php
            if(validation_errors()) { ?>
                <article class="container_12 content">
                    <div class="grid_3">
                    </div>

                    <div class="grid_9 error-message">
                        <p class="error">Some errors have occurred; please check below.</p>
                    </div>
                </article>
                                    
        <?php } ?>
            <div class="wrap">
                <?php print_r($_POST); ?>
                    <header class="content-header"></header>
                    <article class="container_12 content">
                        <div class="grid_3">
                            <h2>Upload CV</h2>
                            <p>Max file size: 1MB<br />
                            Word, PDF or text files only</p>
                        </div>
                        <div class="grid_9">                            
                            <form action="<?php echo base_url(); ?>profiles/save_cv" class="dropzone" id="cvUpload" method="post">
                               
                            </form>
                        </div>
                        <!--<div class="grid_9 fallback">                            
                            <input type="file" name="file" required>
                            <?php if(form_error('file')) { echo form_error('file'); } ?>
                            
                        </div> -->
                        
                    </article>


                    


                    <footer class="content-footer"></footer>
                

            </div>


            

        </section>

    </div> <!-- /wrapper -->
