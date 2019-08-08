<?php
include "controller/products.php";
?>
<script type="text/javascript">
    $(document).on('change', '#check', function () {
        let produits =  $('input[name="produits"]:checked').val();
        let department =  $('input[name="department"]:checked').val();
        let poidsUnitaire =  $('input[name="poidsUnitaire"]:checked').val();
        let price =  $('input[name="price"]:checked').val();

        produits = (produits !== undefined) ? produits : '0';
        department = (department !== undefined) ? '/'+department : '/0';
        poidsUnitaire = (poidsUnitaire !== undefined) ? '/'+poidsUnitaire : '/0';
        price = (price !== undefined) ? '/'+price : '/0';

        let urlf = 'http://localhost/Karotte/Products/filters/'+produits+department+poidsUnitaire+price+'/1';

        $('#links').html(urlf);

        $('#links').attr("href", urlf);

    });
</script>
<section>
    <div class="container products_block">
        <div class="row">
            <div class="col-lg-2 products_block_1">
                <div class="products_block_1_form">
                    <form method="post">
                        <div id="minimis_products" class="products_block_1_form_1">
                            <p>Produits</p>
                        </div>
                        <div id="products_display" class="products_block_1_form_2">
                            <?php
                            foreach ($inputProductsFilters as $key => $value){
                                ?>
                                <div class='products_block_1_form_line'>
                                    <div class='products_block_1_form_input_title'>
                                        <span><?= $key ?></span>
                                    </div>
                                    <div class='products_block_1_form_input'>
                                        <input type='radio' id="check" name='produits' value='<?= $value ?>'>
                                    </div>
                                </div>
                                <?php
                            };
                            ?>
                        </div>
                        <hr>
                        <div id="minimis_region" class="products_block_1_form_1">
                            <p>Département</p>
                        </div>
                        <div id="region_display" class="products_block_1_form_2">
                            <?php
                            foreach($inputRegionFilters as $key => $value){
                                ?>
                                <div class='products_block_1_form_line'>
                                    <div class='products_block_1_form_input_title'>
                                        <span><?= $value ?>(<?= $key ?>)</span>
                                    </div>
                                    <div class='products_block_1_form_input'>
                                        <input type='radio' id="check" name='department' value='<?= $key ?>'>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <hr>
                        <div id="minimis_poids" class="products_block_1_form_1">
                            <p>poids</p>
                        </div>
                        <div id="poids_display" class="products_block_1_form_2">
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>200g</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='poidsUnitaire' value='200g'/>
                                </div>
                            </div>
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>500g</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='poidsUnitaire' value='500g'/>
                                </div>
                            </div>
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>1kg</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='poidsUnitaire' value='1kg'/>
                                </div>
                            </div>
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>10kg</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='poidsUnitaire' value='10kg'/>
                                </div>
                            </div>
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>50kg</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='poidsUnitaire' value='50kg'/>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="minimis_prix" class="products_block_1_form_1">
                            <p>prix</p>
                        </div>
                        <div id="prix_display" class="products_block_1_form_2">
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>croissant</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='price' value='1'/>
                                </div>
                            </div>
                            <div class='products_block_1_form_line'>
                                <div class='products_block_1_form_input_title'>
                                    <span>Décroissant</span>
                                </div>
                                <div class='products_block_1_form_input'>
                                    <input type='radio' id="check" name='price' value='2'/>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="products_block_1_form_submit">
                            <a href="http://localhost/Karotte/Products/" id="links">http://Karotte/Products/</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 products_block_2">
                <?php
                include "controller/display/displayProducts.php";
                ?>
            </div>
        </div>
    </div>
</section>
