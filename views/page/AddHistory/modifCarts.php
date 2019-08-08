<div class="row">
    <?= $errorEdit ?>
    <div class="col-sm-12">
        <form method="post">
            <div class="form-group">
                <label>Biographie :</label>
                <textarea name="Biographie"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="AddEdit" value="Modifier"/>
            </div>
        </form>
    </div>
    <div class="col-sm-12">
        <form method="post">
            <div class="form-group">
                <label>Supprimer mon annonce :</label>
                <input type="submit" name="DeleteAdd" value="Supprimer"/>
            </div>
        </form>
    </div>
</div>