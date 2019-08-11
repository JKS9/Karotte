<div class="row">
    <?= $errorEdit ?>
    <div class="col-sm-12">
        <form method="post">
            <div class="form-group textBio">
                <p>Biographie :</p>
                <textarea name="Biographie"></textarea>
            </div>
            <div class="form-group textBio">
                <input type="submit" name="AddEdit" value="Modifier"/>
            </div>
        </form>
    </div>
    <div class="col-sm-12">
        <form method="post">
            <div class="form-group DELETE">
                <p>Supprimer mon annonce :</p>
                <input type="submit" name="DeleteAdd" value="Supprimer"/>
            </div>
        </form>
    </div>
</div>