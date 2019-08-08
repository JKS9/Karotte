<?php
include "controller/addAnAd.php";
?>
<div class="container addAnAd_Block">
    <div class="row addAnAd_Block_form">
        <div class="col-md-6 addAnAd_Block_form_1">
            <?= $error ?>
            <form method="post">
                <div class="addAnAd_Block_form_1_input">
                   <label>Price</label>
                   <input type="number" name="Price" placeholder="Price"/>
                </div>
                <?= $errorPrice ?>
                <div class="addAnAd_Block_form_1_select">
                    <label>Chose products</label>
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
                <div class="addAnAd_Block_form_1_select">
                    <label>sale UnitWeight</label>
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
                    <label>Number in store</label>
                    <input type="number" name="NbStore" placeholder="only put in kilogram : exemple : 2000 = 2000kg">
                </div>
                <?= $errorNbStore ?>
                <div class="addAnAd_Block_form_1_textarea">
                    <label>Biographye</label>
                    <textarea type="text" name="Biography" placeholder="Ma biographie de mon produits"></textarea>
                </div>
                <?= $errorBiography ?>
                <div class="addAnAd_Block_form_1_submit">
                    <input type="submit" name="AddProducts" value="Add product">
                </div>
            </form>
        </div>
        <div class="cal-md-6">
            <?= $errorAddproduits ?>
            <form method="post" enctype="multipart/form-data">
                <div class="addAnAd_Block_form_2_title">
                    <label>New Products</label>
                    <span>Vous ne trouvez pas votre produits de vente ?</span>
                    <span>Faites un demande au près de nos administateurs pour ajouter un produits.</span>
                    <span>Ajouter le nom + une image</span>
                    <span>On vous répondra au plus vite !</span>
                </div>
                <div class="addAnAd_Block_form_2_input">
                    <label>Name :</label>
                    <input type="text" name="NewProductsName" placeholder="Name"/>
                </div>
                <div class="addAnAd_Block_form_2_input_file">
                    <label>Choose file</label>
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
