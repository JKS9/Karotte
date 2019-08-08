<?php
include "controller/farmers.php";
?>
<script type="text/javascript">
    $(document).on('change', '#checkFarmer', function () {
        let produitsFarmer =  $('input[name="produitsFarmer"]:checked').val();
        let departmentFarmer =  $('input[name="departmentFarmer"]:checked').val();

        produitsFarmer = (produitsFarmer !== undefined) ? produitsFarmer : '0';
        departmentFarmer = (departmentFarmer !== undefined) ? '/'+departmentFarmer : '/0';

        let urlfarmers = "http://localhost/Karotte/Farmers/filters/"+produitsFarmer+departmentFarmer+"/1";

        $('#linksFarmers').attr("href", urlfarmers);

    });
</script>
<section>
    <div class="container farmers_block">
        <div class="row">
            <div class="col-lg-2 farmers_block_1">
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
                                    <input type='radio' id="checkFarmer" name='produitsFarmer' value='<?= $value ?>'>
                                </div>
                            </div>
                            <?php
                        };
                        ?>
                    </div>
                    <hr>
                    <div id="minimis_region" class="farmers_block_1_form_1">
                        <p>Département</p>
                    </div>
                    <div id="region_display" class="farmers_block_1_form_2">
                        <?php
                        foreach($inputRegionFilters as $key => $value){
                            ?>
                            <div class='farmers_block_1_form_line'>
                                <div class='farmers_block_1_form_input_title'>
                                    <span><?= $value ?>(<?= $key ?>)</span>
                                </div>
                                <div class='farmers_block_1_form_input'>
                                    <input type='radio' id="checkFarmer" name='departmentFarmer' value='<?= $key ?>'>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="farmers_block_1_form_submit">
                        <a href="http://localhost/Karotte/Farmers/" id="linksFarmers">http://localhost/Karotte/Farmers/</a>
                    </div>
                </form>
            </div>
            <div class="col-lg-10 farmers_block_2">
                <?php
                include "controller/display/displayFarmers.php";
                ?>
            </div>
        </div>
    </div>
</section>