<div class="container register_block_2_farmer_title">
    <div class="title">
        <span><strong>Formulaire d'inscription Agriculteurs</strong></span>
    </div>
</div>
<div class="container register_block_2_farmer_form">
    <?php
    echo $errorFarmers;
    echo $validationFarmers;
    ?>
    <form method="post">
        <div class="input_register_farmer">
            <label><strong>Name :</strong> *</label>
            <input type="text" name="Name" placeholder="Name">
            <p></p>
            <?php echo $errorSignUpFarmersName ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>First-name :</strong> *</label>
            <input type="text" name="First-Name" placeholder="First-name">
            <p></p>
            <?php echo $errorSignUpFarmersFirstName ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>Email :</strong> *</label>
            <input type="text" name="Email" placeholder="Email">
            <p></p>
            <?php echo $errorSignUpFarmersEmail ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>Password :</strong> *</label>
            <input type="password" name="Password" placeholder="Password">
            <p></p>
            <?php echo $errorSignUpFarmersPassword ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>Birth date :</strong></label>
            <input type="date" name="Date" min="1950-01-01" max="2020-12-31">
            <p></p>
            <?php echo $errorSignUpFarmersDate ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>Type of agriculture :</strong> *</label>
            <input type="radio" name="TypeAgriculture" value="1">
            <label><strong>Organic farming</strong></label>
            <input type="radio" name="TypeAgriculture" value="2">
            <label><strong>No-organic agriculture</strong></label>
            <input type="radio" name="TypeAgriculture" value="3">
            <label><strong>Any type of agriculture</strong></label>
            <p></p>
            <?php echo $errorSignUpFarmersTypeAgriculture ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>Address of the farm :</strong> *</label>
            <select name="Road">
                <option value="Rue">Rue</option>
                <option value="Avenue">Avenue</option>
                <option value="boulevard">boulevard</option>
                <option value="Impasse">Impasse</option>
            </select>
            <input type="text" name="NameStreet" placeholder="Name Street">
            <input type="number" name="NumberStreet" placeholder="Number Street">
            <input type="number" name="PostalCode" placeholder="Postal Code">
            <input type="text" name="City" placeholder="City">
            <select name="Region">
                <option>choisir un département</option>
                <?php
                foreach($selectRegion as $key => $value){
                    ?>
                    <option value="<?= $key; ?>"><?= $value ?></option>
                    <?php
                }
                ?>
            </select>
            <select name="Country">
                <option value="France">France</option>
            </select>
            <p></p>
            <?php echo $errorSignUpFarmersAdress ?>
        </div>
        <div class="input_register_farmer">
            <label><strong>Phone :</strong> *</label>
            <input type="number" name="Phone" placeholder="Phone">
            <?php echo $errorSignUpFarmersPhone ?>
        </div>
        <div class="input_register_farmer_button">
            <input type="submit" name="signUpFarmers" value="Sign Up">
        </div>
    </form>
</div>