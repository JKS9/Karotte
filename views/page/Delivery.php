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
            <div class="row">
                <form method="post">
                    <div class="col-sm-6 form-group">
                        <label>Référence :</label>
                        <input class="input_filter" style="padding: 7px 15px;width: 250px;background: #f0f0f0;border-radius: 3px;border: none" type="text" name="Id" />
                        <div class="form-group filtreDeliverydiv">
                            <a href="" id="linksId">Rechercher</a>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>status :</label>
                        <select class="input_filter" style="width: 200px;border: none;background: #f3f3f3;padding: 3px;color: #000;"name="Status">
                            <option>choisir status</option>
                            <option value="0">Livraison à faire</option>
                            <option value="1">Livraison en cour</option>
                            <option value="2">Livraison faite</option>
                        </select>
                        <div class="form-group filtreDeliverydiv">
                            <a href="" id="linksStatus">Rechercher</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <p>Faite une recherche filtrer pour mieux vous y retrouvez soit par 'référence de commande ou Status de livraison'</p>
                    </div>
                </form>
            </div>
            <div class="row block_Ordder_history_info">
                <div class="col-sm-12 block_Ordder_history_info_title">
                    <h4>Information :</h4>
                </div>
                <div class="col-sm-4 block_Ordder_history_info_danger">
                    <div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                    <p>Attente confirmation</p>
                </div>
                <div class="col-sm-4 block_Ordder_history_info_warning">
                    <div class="p-3 mb-2 bg-warning text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                    <p>Livraison en cours</p>
                </div>
                <div class="col-sm-4 block_Ordder_history_info_success">
                    <div class="p-3 mb-2 bg-success text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                    <p>Livraison faite</p>
                </div>
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

