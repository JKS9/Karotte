<?php
include "controller/addAnAd.php";
?>
<div class="container addAnAd_Block">
    <div class="row addAnAd_Block_form">
        <div class="col-md-6 addAnAd_Block_form_1">
            <?= $error ?>
            <h4>Ajouter une annonce :</h4>
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
                            <option>Mon Produit</option>
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
                        <p>Vous ne trouvez pas votre produits de vente ?</p>
                        <p>Faites un demande au près de nos administateurs pour ajouter un produits.</p>
                        <p>Ajouter le nom + une image</p>
                        <p>On vous répondra au plus vite !</p>
                    </div>
                    <div class="addAnAd_Block_form_2_input">
                        <p>Name :</p>
                        <input type="text" name="NewProductsName" placeholder="Name"/>
                    </div>
                    <div class="addAnAd_Block_form_2_input_file">
                        <p>Choose file</p>
                        <input type="file" name="FileNewProducts"/>
                        <span>Seul les fichier en .png sont accepter</span>
                    </div>
                    <?= $errorFile ?>
                    <div class="addAnAd_Block_form_2_submit">
                        <input type="submit" name="NewProducts" value="Proposer"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
