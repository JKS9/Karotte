<div class="container register_block_2_users_title">
    <div class="title">
        <span><strong>Formulaire d'inscription Utilisateur</strong></span>
    </div>
</div>
<div class="container register_block_2_users_form">
    <?php
    echo $error;
    echo $validation;
    ?>
    <form method="post">
        <div class="input_register_user">
            <label><strong>Name :</strong>*</label>
            <input type="text" name="Name" placeholder="Name">
            <p></p>
            <?php echo $errorSignUpUsersName ?>
        </div>
        <div class="input_register_user">
            <label><strong>First-name :</strong>*</label>
            <input type="text" name="First-Name" placeholder="First-Name">
            <p></p>
            <?php echo $errorSignUpUsersFirstName ?>
        </div>
        <div class="input_register_user">
            <label><strong>Email :</strong>*</label>
            <input type="text" name="Email" placeholder="Email">
            <p></p>
            <?php echo $errorSignUpUsersEmail ?>
        </div>
        <div class="input_register_user">
            <label><strong>Password :</strong>*</label>
            <input type="password" name="Password" placeholder="Password">
            <p></p>
            <?php echo $errorSignUpUsersPassword ?>
        </div>
        <div class="input_register_user">
            <label><strong>Birth date :</strong>*</label>
            <input type="date" id="start" name="Date" min="1950-01-01" max="2020-12-31">
            <p></p>
            <?php echo $errorSignUpUsersDate ?>
        </div>
        <div class="input_register_user_button">
            <input type="submit" name="signUpUsers" value="Sign Up">
        </div>
    </form>
</div>