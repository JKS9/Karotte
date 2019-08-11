<div class="title">
    <p><strong>Formulaire d'inscription Utilisateur :</strong></p>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="register_block_2_users_form">
            <?php
            echo $error;
            echo $validation;
            ?>
            <form method="post">
                <div class="input_register_user">
                    <label><strong>Name :</strong>*</label>
                    <input type="text" name="Name" placeholder="Name">
                    <?php echo $errorSignUpUsersName ?>
                </div>
                <div class="input_register_user">
                    <label><strong>First-name :</strong>*</label>
                    <input type="text" name="First-Name" placeholder="First-Name">
                    <?php echo $errorSignUpUsersFirstName ?>
                </div>
                <div class="input_register_user">
                    <label><strong>Email :</strong>*</label>
                    <input type="text" name="Email" placeholder="Email">
                    <?php echo $errorSignUpUsersEmail ?>
                </div>
                <div class="input_register_user">
                    <label><strong>Password :</strong>*</label>
                    <input type="password" name="Password" placeholder="Password">
                    <?php echo $errorSignUpUsersPassword ?>
                </div>
                <div class="input_register_user">
                    <label><strong>Birth date :</strong>*</label>
                    <input type="date" id="start" name="Date" min="1950-01-01" max="2020-12-31">
                    <?php echo $errorSignUpUsersDate ?>
                </div>
                <div class="input_register_user_button">
                    <input type="submit" name="signUpUsers" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="register_block_2_users_img">
            <img style="width: 300px;" src="<?= routeUrl() ?>src/images/photoSite/undraw_arrived_f58d.svg"/>
        </div>
    </div>
</div>
