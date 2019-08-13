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
                    <h2>My banking information :</h2>
                    <div class="Virement_info">
                        <p>You do not have your bic and iban banking information.</p>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="Virement">
                    <h2>My banking information :</h2>
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
                    <h2>Add my banking information :</h2>
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
                                <input type="submit" name="addBancaire" value="Add"/>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="Virement_form">
                    <h2>Change my banking information :</h2>
                    <div class="Virement_info_form">
                        <form method="post">
                            <div class="form-group">
                                <label>My Bic :</label>
                                <input type="text" name="Bic" value="<?= $virement['Bic'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>My Iban :</label>
                                <input type="text" name="IBAN" value="<?= $virement['IBAN'] ?>"/>
                            </div>
                            <div class="form-group addBank">
                                <input type="submit" name="ModifBancaire" value="Edit"/>
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