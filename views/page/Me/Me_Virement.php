<?php
$virements = $objProfile->infoFarmer($idfarmer);
?>
<div class="row block_virement">
    <div class="col-sm-12">
        <?php
        foreach($virements as $virement){
            if($virement['Bic'] == null || $virement['IBAN'] == null ){
                ?>
                <div class="Virement">
                    <h2>Mes information bancaire :</h2>
                    <div class="Virement_info">
                        <p>Vous n'avez enregistrer vos informations de virement bancaire "BIC" et "IBAN".</p>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="Virement">
                    <h2>Mes information bancaire :</h2>
                    <div class="Virement_info">
                        <p>BIC : <?= $virement['Bic'] ?></p>
                        <p>IBAN : <?= $virement['IBAN'] ?></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="col-sm-12">
        <?php
        foreach($virements as $virement){
            if($virement['Bic'] == null || $virement['IBAN'] == null ){
                ?>
                <div class="Virement_form">
                    <h2>Ajouter mes informations bancaire :</h2>
                    <div class="Virement_info_form">
                        <form method="post">
                            <div class="form-group ">
                                <label>Mon Bic :</label>
                                <input type="text" name="Bic"/>
                            </div>
                            <div class="form-group">
                                <label>Mon Iban :</label>
                                <input type="text" name="IBAN"/>
                            </div>
                            <div class="form-group addBank">
                                <input type="submit" name="addBancaire" value="Ajouter"/>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="Virement_form">
                    <h2>Modifier mes informations bancaire :</h2>
                    <div class="Virement_info_form">
                        <form method="post">
                            <div class="form-group">
                                <label>Mon Bic :</label>
                                <input type="text" name="Bic" value="<?= $virement['Bic'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Mon Iban :</label>
                                <input type="text" name="IBAN" value="<?= $virement['IBAN'] ?>"/>
                            </div>
                            <div class="form-group addBank">
                                <input type="submit" name="ModifBancaire" value="Modifier"/>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>