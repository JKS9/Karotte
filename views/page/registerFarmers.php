<div class="title">
    <p><strong>Farmer registration form :</strong></p>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="register_block_2_farmer_form">
            <?php
            echo $errorFarmers;
            echo $validationFarmers;
            ?>
            <form method="post">
                <div class="input_register_farmer">
                    <p><strong>Name :</strong> *</p>
                    <input type="text" name="Name" placeholder="Name">
                    <?php echo $errorSignUpFarmersName ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>First-name :</strong> *</p>
                    <input type="text" name="First-Name" placeholder="First-name">
                    <?php echo $errorSignUpFarmersFirstName ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>Email :</strong> *</p>
                    <input type="text" name="Email" placeholder="Email">
                    <?php echo $errorSignUpFarmersEmail ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>Password :</strong> *</p>
                    <input type="password" name="Password" placeholder="Password">
                    <?php echo $errorSignUpFarmersPassword ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>Birth date :</strong></p>
                    <input type="date" name="Date" min="1950-01-01" max="2020-12-31">
                    <?php echo $errorSignUpFarmersDate ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>Type of agriculture :</strong> *</p>
                    <input type="radio" name="TypeAgriculture" value="1">
                    <p style="padding-right: 50px;" aria-checked="true"><strong>Organic farming</strong></p>
                    <input type="radio" checked="checked" name="TypeAgriculture" value="2">
                    <label><strong>No-organic agriculture</strong></label>
                    <?php echo $errorSignUpFarmersTypeAgriculture ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>Address of the farm :</strong> *</p>
                    <select name="Road">
                        <option value="Rue">Rue</option>
                        <option value="Avenue">Avenue</option>
                        <option value="boulevard">boulevard</option>
                        <option value="Impasse">Impasse</option>
                    </select>
                    <p><strong>Name street :</strong></p>
                    <input type="text" name="NameStreet" placeholder="Name Street">
                    <p><strong>Number street :</strong></p>
                    <input type="number" name="NumberStreet" placeholder="Number Street">
                    <p><strong>Postal Code :</strong></p>
                    <input type="number" name="PostalCode" placeholder="Postal Code">
                    <p><strong>City :</strong></p>
                    <input type="text" name="City" placeholder="City">
                    <p><strong>Department :</strong></p>
                    <select name="Region">
                        <option>Choise Department :</option>
                        <?php
                        foreach($selectRegion as $key => $value){
                            ?>
                            <option value="<?= $key; ?>"><?= $value ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p><strong>Country :</strong></p>
                    <select name="Country">
                        <option value="France">France</option>
                    </select>
                    <?php echo $errorSignUpFarmersAdress ?>
                </div>
                <div class="input_register_farmer">
                    <p><strong>Phone :</strong> *</p>
                    <input type="number" name="Phone" placeholder="Phone">
                    <?php echo $errorSignUpFarmersPhone ?>
                </div>
                <div class="input_register_farmer_button">
                    <input type="submit" name="signUpFarmers" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="register_block_2_users_img">
            <img style="width: 300px" src="<?= routeUrl() ?>src/images/photoSite/undraw_arrived_f58d.svg"/>
        </div>
    </div>
</div>