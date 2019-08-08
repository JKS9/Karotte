<?php
require "controller/Delivery.php";
?>
<script type="text/javascript">
    $(document).on('input', '.input_filter', function () {

        let Id =  $('input[name="Id"]').val();
        let Status =  $('select[name="Status"]').val();

        if(Id !== undefined) {
            filtreId = 'Id';
            valueId = '/' + Id;

            let urlfId = 'http://localhost/Karotte/Delivery/'+filtreId+valueId;

            $('#linksId').attr("href", urlfId);
        }

        if(Status !== undefined) {
            filtreStatus = 'Reference';
            valueStatus = '/' + Status;

            let urlfStatus = 'http://localhost/Karotte/Delivery/'+filtreStatus+valueStatus;

            $('#linksStatus').attr("href", urlfStatus);
        }

    });
</script>
<div class="container block_delivery">
    <div class="row">
        <h1> Mes livraison faite et à faire</h1>
        <div class="col-lg-12 block_delivery_1">
            <form method="post">
                <div class="form-group">
                    <label>Référence :</label>
                    <input class="input_filter" type="text" name="Id" />
                    <div class="form-group">
                        <a href="" id="linksId">Rechercher</a>
                    </div>
                </div>
                <div class="form-group">
                    <label>status :</label>
                    <select class="input_filter" name="Status">
                        <option>choisir status</option>
                        <option value="0">Livraison à faire</option>
                        <option value="1">Livraison en cour</option>
                        <option value="2">Livraison faite</option>
                    </select>
                    <div class="form-group">
                        <a href="" id="linksStatus">Rechercher</a>
                    </div>
                </div>
                <p>Faite une recherche filtrer pour mieux vous y retrouvez soit par 'référence de commande ou Status de livraison'</p>
            </form>
            <div class="block_delivery_title">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"> Information</span>
            </div>
            <div class="block_delivery_danger">
                <div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>
                <span>= livraison à faire</span>
            </div>
            <div class="block_delivery_warning">
                <div class="p-3 mb-2 bg-warning text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>
                <span>= livraison en cours</span>
            </div>
            <div class="block_delivery_success">
                <div class="p-3 mb-2 bg-success text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>
                <span>= livraison faite</span>
            </div>
        </div>
        </div>
        <div class="col-lg-12 block_delivery_2">
            <?php
            include "controller/display/displayDelivery.php"
            ?>
            </div>
        </div>
    </div>
</div>

