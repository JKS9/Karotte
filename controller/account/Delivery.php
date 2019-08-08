<?php
if(isset($_POST['deleteDelivery'])){
    $id = $_POST['adresse'];
    $delete = $objDelivery->DeliveryDelete($id);
}

if(isset($_POST['infoDelivery'])){
    $explode = explode('/', $_GET['p']);
    $id = $explode[3];

    $roadNumberForm = $objRegister->test_input($_POST['roadNumber']);
    $RoadFrom = $objRegister->test_input($_POST['Road']);
    $RoadNameFrom = $objRegister->test_input($_POST['RoadName']);
    $CityFrom = $objRegister->test_input($_POST['City']);
    $PostalCodeFrom = $objRegister->test_input($_POST['PostalCode']);
    $RegionFrom = $objRegister->test_input($_POST['Region']);
    $CountryFrom = $objRegister->test_input($_POST['Country']);
    $PhoneForm = $objRegister->test_input($_POST['Phone']);

    $roadNumber = "";
    $Road = "";
    $RoadName = "";
    $City = "";
    $PostalCode = "";
    $Region = "";
    $Country = "";
    $Phone = "";

    $arrayRoad = array('Rue', 'Avenue', 'boulevard', 'impasse');
    $verifInfo = $objDelivery->infoDelivery($id,$session);

    foreach ($verifInfo as $info) {
        $roadNumber = $info['RoadNumber'];
        $Road = $info['Road'];
        $RoadName = $info['RoadName'];
        $City = $info['City'];
        $PostalCode = $info['PostalCode'];
        $Region = $info['Region'];
        $Country = $info['County'];
        $Phone = $info['Phone'];
    }

    if ($roadNumberForm != $roadNumber) {
        if (!empty($roadNumberForm)) {
            if (preg_match('/^[0-9]*$/', "$roadNumberForm")) {
                $new = $objDelivery->updateDelivery($roadNumberForm, 'RoadNumber', $id);
            } else {
                $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorinfoDelivery;
            }
        } else {
            $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorinfoDelivery;
        }
    }

    if ($RoadFrom != $Road) {
        if (!empty($RoadFrom)) {
            if (in_array($RoadFrom, $arrayRoad)) {
                $new = $objDelivery->updateDelivery($RoadFrom, 'Road', $id);
            }else{
                $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                La valeur sélectionner n'est pas répertorier, veuillez choisir une valeur ('Rue', 'Avenue', 'boulevard', 'impasse');
            </div>";
                return $errorinfoDelivery;
            }
        } else {
            $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorinfoDelivery;
        }
    }

    if ($RoadNameFrom != $RoadName) {
        if (!empty($RoadNameFrom)) {
            if (preg_match("/^[a-zA-Z- '\s]+$/", "$RoadNameFrom")) {
                $new = $objDelivery->updateDelivery($RoadNameFrom, 'RoadName', $id);
            } else {
                $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorinfoDelivery;
            }
        } else {
            $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorinfoDelivery;
        }
    }

    if ($CityFrom != $City) {
        if (!empty($CityFrom)) {
            if (preg_match("/^[a-zA-Z- '\s]+$/", "$CityFrom")) {
                $new = $objDelivery->updateDelivery($CityFrom, 'City', $id);
            } else {
                $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorinfoDelivery;
            }
        } else {
            $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorinfoDelivery;
        }
    }

    if ($PostalCodeFrom != $PostalCode) {
        if (!empty($PostalCodeFrom)) {
            if (preg_match("/^[0-9]*$/", "$PostalCodeFrom")) {
                $new = $objDelivery->updateDelivery($PostalCodeFrom, 'PostalCode', $id);
            } else {
                $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorinfoDelivery;
            }
        } else {
            $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorinfoDelivery;
        }
    }

    if ($PhoneForm != $Phone) {
        if (!empty($PhoneForm)) {
            if (preg_match("/^[0-9]*$/", "$PhoneForm")) {
                $new = $objDelivery->updateDelivery($PhoneForm, 'Phone', $id);
            } else {
                $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorinfoDelivery;
            }
        } else {
            $errorinfoDelivery = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorinfoDelivery;
        }
    }

    if ($CountryFrom != $Country) {
        $new = $objDelivery->updateDelivery($CountryFrom, 'County', $id);
    }

    if ($RegionFrom != $Region) {
        $new = $objDelivery->updateDelivery($RegionFrom, 'Region', $id);
    }
}

if(isset($_POST['Addadresse'])){
    $roadNumberForm = $objRegister->test_input($_POST['NumberStreet']);
    $RoadFrom = $objRegister->test_input($_POST['Road']);
    $RoadNameFrom = $objRegister->test_input($_POST['NameStreet']);
    $CityFrom = $objRegister->test_input($_POST['City']);
    $PostalCodeFrom = $objRegister->test_input($_POST['PostalCode']);
    $CountryFrom = $objRegister->test_input($_POST['Country']);
    $RegionFrom = $objRegister->test_input($_POST['Region']);
    $PhoneForm = $objRegister->test_input($_POST['Phone']);

    $arrayRoad = array('Rue', 'Avenue', 'boulevard', 'impasse');

    $roadNumber = "";
    $Road = "";
    $RoadName = "";
    $City = "";
    $PostalCode = "";
    $Region = "";
    $Country = "";
    $Phone = "";

    if (!empty($roadNumberForm)) {
        if (preg_match('/^[0-9]*$/', "$roadNumberForm")) {
            $roadNumber = $roadNumberForm;
        } else {
            $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Le nom ne remplis pas les conditions de formulaire.
        </div>";
            return $errorAddadresse;
        }
    } else {
        $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Vous devez remplir le(s) champ(s) vide.
        </div>";
        return $errorAddadresse;
    }

    if (!empty($RoadFrom)) {
        if (in_array($RoadFrom, $arrayRoad)) {
            $Road = $RoadFrom;
        }else{
            $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            La valeur sélectionner n'est pas répertorier, veuillez choisir une valeur ('Rue', 'Avenue', 'boulevard', 'impasse');
        </div>";
            return $errorAddadresse;
        }
    } else {
        $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Vous devez remplir le(s) champ(s) vide.
        </div>";
        return $errorAddadresse;
    }

    if (!empty($RoadNameFrom)) {
        if (preg_match("/^[a-zA-Z- '\s]+$/", "$RoadNameFrom")) {
            $RoadName = $RoadNameFrom;
        } else {
            $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Le nom ne remplis pas les conditions de formulaire.
        </div>";
            return $errorAddadresse;
        }
    } else {
        $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Vous devez remplir le(s) champ(s) vide.
        </div>";
        return $errorAddadresse;
    }

    if (!empty($CityFrom)) {
        if (preg_match("/^[a-zA-Z- '\s]+$/", "$CityFrom")) {
            $City = $CityFrom;
        } else {
            $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Le nom ne remplis pas les conditions de formulaire.
        </div>";
            return $errorAddadresse;
        }
    } else {
        $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Vous devez remplir le(s) champ(s) vide.
        </div>";
        return $errorAddadresse;
    }

    if (!empty($PostalCodeFrom)) {
        if (preg_match("/^[0-9]*$/", "$PostalCodeFrom")) {
            $PostalCode = $PostalCodeFrom;
        } else {
            $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Le nom ne remplis pas les conditions de formulaire.
        </div>";
            return $errorAddadresse;
        }
    } else {
        $errorinfoDelivery = "
        <div class='alert alert-danger' role='alert'>
            Vous devez remplir le(s) champ(s) vide.
        </div>";
        return $errorAddadresse;
    }

    if (!empty($PhoneForm)) {
        if (preg_match("/^[0-9]*$/", "$PhoneForm")) {
            $Phone = $PhoneForm;
        } else {
            $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Le nom ne remplis pas les conditions de formulaire.
        </div>";
            return $errorAddadresse;
        }
    } else {
        $errorAddadresse = "
        <div class='alert alert-danger' role='alert'>
            Vous devez remplir le(s) champ(s) vide.
        </div>";
        return $errorAddadresse;
    }

    if ($CountryFrom != $Country) {
        $Country = $CountryFrom;
    }

    if ($RegionFrom != $Region) {
        $Region = $RegionFrom;
    }

    $newDelivery = $objDelivery->insertDelivery($session,$roadNumber, $Road, $RoadName, $City, $PostalCode, $Region, $Country, $Phone);
}

?>