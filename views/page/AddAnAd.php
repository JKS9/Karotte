<?php
include "controller/addAnAd.php";
?>
<div class="container addAnAd_Block">
    <div class="row addAnAd_Block_form">
        <div class="col-md-6 addAnAd_Block_form_1">
            <?= $error ?>
            <h4>Add an Ad :</h4>
            <div class="addAnAd_Block_form_1_block">
                <form method="post">
                    <div class="addAnAd_Block_form_1_input">
                       <p>Price</p>
                       <input type="number" name="Price" placeholder="Price"/>
                    </div>
                    <?= $errorPrice ?>
                    <div class="addAnAd_Block_form_1_input">
                        <p>Chose products</p>
                        <select name="Products">
                            <option>My Product</option>
                            <?php
                            foreach ($inputProductsFilters as $key => $value){
                                ?>
                                <option value="<?= $value ?>"><?= $key ?></option>
                                <?php
                            };
                            ?>
                        </select>
                    </div>
                    <?= $errorProducts ?>
                    <div class="addAnAd_Block_form_1_input">
                        <p>sale UnitWeight</p>
                        <select name="UnitWeight">
                            <option value="200g">200g</option>
                            <option value="500g">500g</option>
                            <option value="1kg">1kg</option>
                            <option value="10kg">10kg</option>
                            <option value="50kg">50kg</option>
                        </select>
                    </div>
                    <?= $errorUnitWeight ?>
                    <div class="addAnAd_Block_form_1_input">
                        <p>Number in store</p>
                        <input type="number" name="NbStore" placeholder="number">
                    </div>
                    <?= $errorNbStore ?>
                    <div class="addAnAd_Block_form_1_input">
                        <p>Biographye</p>
                        <textarea type="text" name="Biography" placeholder="Ma biographie de mon produits"></textarea>
                    </div>
                    <?= $errorBiography ?>
                    <div class="addAnAd_Block_form_1_submit">
                        <input type="submit" name="AddProducts" value="Add product">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 addAnAd_Block_form_2">
            <?= $errorAddproduits ?>
            <h4>New Products</h4>
            <div class="addAnAd_Block_form_2_block">
                <form method="post" enctype="multipart/form-data">
                    <div class="addAnAd_Block_form_2_title">
                        <p>You can not find your product for sale ?</p>
                        <p>Make a request to our administrators to add a product</p>
                        <p>Add the name plus an image</p>
                        <p>We'll answer you soon</p>
                    </div>
                    <div class="addAnAd_Block_form_2_input">
                        <p>Name :</p>
                        <input type="text" name="NewProductsName" placeholder="Name"/>
                    </div>
                    <div class="addAnAd_Block_form_2_input_file">
                        <p>Choose file</p>
                        <input type="file" name="FileNewProducts"/>
                        <span>Only .png files are accepted</span>
                    </div>
                    <?= $errorFile ?>
                    <div class="addAnAd_Block_form_2_submit">
                        <input type="submit" name="NewProducts" value="Send"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
