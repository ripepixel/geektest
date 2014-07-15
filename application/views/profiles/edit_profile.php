<!-- WRAPPER -->
    <div class="wrapper">

        <!-- SECTION -->
        <section id="home">
            <div class="wrap inverse extra-overlay vpadding-strong top">
                <div class="slide-img mapbg"></div>
                <article class="container_12 content aligned center">
                    <div class="grid_6">
                        <h1 class="huge">Create Your Profile</h1>
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
            <form action="<?php echo base_url(); ?>profiles/update_profile" method="post">
                <header class="content-header"></header>
                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Full Name</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="full_name" value="<?php echo $profile->full_name; ?>" required>
                        <?php if(form_error('full_name')) { echo form_error('full_name'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Address</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea name="address"><?php echo str_replace("<br />", "", $profile->address); ?></textarea>                        
                        <?php if(form_error('address')) { echo form_error('address'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Telephone</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="telephone" value="<?php echo $profile->telephone; ?>">
                        <?php if(form_error('telephone')) { echo form_error('telephone'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Email</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="email" name="email" value="<?php echo $profile->email; ?>">
                        <?php if(form_error('email')) { echo form_error('email'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Date of Birth</h2>
                    </div>
                    
                    <div class="grid_9">
                        <input type="text" name="dob" value="<?php echo $profile->dob; ?>">
                        <?php if(form_error('dob')) { echo form_error('dob'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Gender</h2>
                    </div>
                    
                    <div class="grid_9">
                        <select name="gender">
                            <option value="Male" <?php echo $profile->gender == "Male" ? 'selected=selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo $profile->gender == "Female" ? 'selected=selected' : ''; ?>>Female</option>
                        </select>
                        <?php if(form_error('gender')) { echo form_error('gender'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>About You</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea id="bio" name="bio" placeholder="List your personal qualities"><?php echo $profile->bio; ?></textarea>
                        <?php if(form_error('bio')) { echo form_error('bio'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Your Skills</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea id="skills" name="skills"><?php echo $profile->skills; ?></textarea>
                        <?php if(form_error('skills')) { echo form_error('skills'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Qualifications</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea id="quals" name="quals"><?php echo $profile->qualifications; ?></textarea>
                        <?php if(form_error('quals')) { echo form_error('quals'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Work History</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea id="work_history" name="work_history"><?php echo $profile->work_history; ?></textarea>
                        <?php if(form_error('work_history')) { echo form_error('work_history'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                        <h2>Additional Information</h2>
                    </div>
                    
                    <div class="grid_9">
                        <textarea id="more_info" name="more_info" placeholder="List your hobbies, interests or other relevant information (links to a portfolio)"><?php echo $profile->more_info; ?></textarea>
                        <?php if(form_error('more_info')) { echo form_error('more_info'); } ?>
                    </div>
                </article>

                <article class="container_12 content">
                    <div class="grid_3">
                    </div>

                    <div class="grid_9">
                       <input type="submit" value="Update" class="button">
                    </div>
                
                </article>


                <footer class="content-footer"></footer>
            </form>

            </div>


            

        </section>

    </div> <!-- /wrapper -->
