<?php
if(isset($_POST['infoPerso'])){

    $NameForm = $objRegister->test_input($_POST['Name']);
    $LastNameForm = $objRegister->test_input($_POST['LastName']);
    $EmailFrom = $objRegister->test_input($_POST['Email']);
    $DateFrom = $objRegister->test_input($_POST['DateBirth']);

    $Name = "";
    $LastName = "";
    $Email = "";
    $Date = "";

    $verifInfo = $objProfile ->infoUser($session);

    foreach($verifInfo as $info){
        $Name = $info['Name'];
        $LastName = $info['Name'];
        $Email = $info['Name'];
        $Date = $info['Name'];
    }

    if($NameForm != $Name){
        if(!empty($NameForm)){
            if(preg_match("/^[a-zA-Z-'\s]+$/", "$NameForm")){
                $new = $objProfile->updateInfoPerso($NameForm,'Name',$session);
            }else{
                $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    Le nom ne remplis pas les conditions de formulaire.
                </div>";
                return $errorInfoPerso;
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    Vous devez remplir le(s) champ(s) vide.
                </div>";
            return $errorInfoPerso;
        }
    }

    if($LastNameForm != $LastName){
        if(!empty($LastNameForm)){
            if(preg_match("/^([a-zA-Z' ]+)$/", "$LastNameForm")){
                $new = $objProfile->updateInfoPerso($LastNameForm,'LastName',$session);
            }else{
                $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    Le Prénon ne remplis pas les conditions de formulaire.
                </div>";
                return $errorInfoPerso;
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    Vous devez remplir le(s) champ(s) vide.
                </div>";
            return $errorInfoPerso;
        }
    }

    if($EmailFrom != $Email){
        if(!empty($EmailFrom)){
            if(filter_var($EmailFrom, FILTER_VALIDATE_EMAIL)){
                $verifEmail = $objRegister->verifEmail($Email);

                if ($verifEmail === 1) {
                    $errorInfoPerso = "
                    <div class='alert alert-danger' role='alert'>
                        L'adresse email existe déjà.
                    </div>";
                    return $errorInfoPerso;
                }else{
                    $new = $objProfile->updateInfoPerso($EmailFrom,'Email',$session);
                }
            }else{
                $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    L'adresse email ne remplis pas les conditions de formulaire.
                </div>";
                return $errorInfoPerso;
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    Vous devez remplir le(s) champ(s) vide.
                </div>";
            return $errorInfoPerso;
        }
    }

    if($DateFrom != $Date){
        if(!empty($DateFrom)){
            $legalAge = $objRegister->calculateAge($DateFrom);
            if ($legalAge < 16) {
                $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    L'age minimum est de 16 ans :
                </div>";
                return $errorInfoPerso;
            }else{
                $new = $objProfile->updateInfoPerso($DateFrom,'DateBirth',$session);
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    Vous devez remplir le(s) champ(s) vide.
                </div>";
            return $errorInfoPerso;
        }
    }
}

if(isset($_POST['picture'])){
    $file_name = $_FILES['file_picture']['name'];
    $file_size =$_FILES['file_picture']['size'];
    $file_tmp =$_FILES['file_picture']['tmp_name'];
    $file_type=$_FILES['file_picture']['type'];
    $errorFile= $_FILES['file_picture']['error'];

    $uploaddir = "src/images/Agriculteurs/";

    $extensionsAutorisees = array("image/jpeg", "image/jpg");
    if (!(in_array($file_type, $extensionsAutorisees))) {
        $errorProfilPicture = "
        <div class='alert alert-danger' role='alert'>
            Votre image doit impérativement etre '.jpg' :
        </div>";
        return $errorProfilPicture;
    }else{
        move_uploaded_file($_FILES['file_picture']['tmp_name'],$uploaddir.$idfarmer.'.jpg');

        $errorProfilPicture = "
        <div class='alert alert-success' role='alert'>
            Votre demande à été envoi à un administrateur : fichier valide
        </div>";
        return $errorProfilPicture;
    }
}

if(isset($_POST['infoPersofarmer'])) {

    $BiographyForm = addslashes($_POST['Biography']);
    $roadNumberForm = $objRegister->test_input($_POST['roadNumber']);
    $RoadFrom = $objRegister->test_input($_POST['Road']);
    $RoadNameFrom = $objRegister->test_input($_POST['RoadName']);
    $CityFrom = $objRegister->test_input($_POST['City']);
    $PostalCodeFrom = $objRegister->test_input($_POST['PostalCode']);
    $RegionFrom = $objRegister->test_input($_POST['Region']);
    $PhoneForm = $objRegister->test_input($_POST['Phone']);

    $Biography = "";
    $roadNumber = "";
    $Road = "";
    $RoadName = "";
    $City = "";
    $PostalCode = "";
    $Region = "";
    $Phone = "";

    $arrayRoad = array('Rue', 'Avenue', 'boulevard', 'impasse');
    $verifInfo = $objProfile->infoFarmer($idfarmer);

    foreach ($verifInfo as $info) {
        $Biography = $info['Biography'];
        $roadNumber = $info['roadNumber'];
        $Road = $info['Road'];
        $RoadName = $info['RoadName'];
        $City = $info['City'];
        $PostalCode = $info['PostalCode'];
        $Region = $info['Region'];
        $Phone = $info['Phone'];
    }

    if ($BiographyForm != $Biography) {
        if (!empty($BiographyForm)) {
            if (preg_match("/^[0-9A-Za-z\'\_\.\,\-\ \[\]\(\)âêîôûéèçàïäüù]+$/m", "$BiographyForm")) {
                $new = $objProfile->updateInfoPersoFarmer($BiographyForm, 'Biography', $idfarmer);
            } else {
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($roadNumberForm != $roadNumber) {
        if (!empty($roadNumberForm)) {
            if (preg_match('/^[0-9]*$/', "$roadNumberForm")) {
                $new = $objProfile->updateInfoPersoFarmer($roadNumberForm, 'roadNumber', $idfarmer);
            } else {
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($RoadFrom != $Road) {
        if (!empty($RoadFrom)) {
            if (in_array($RoadFrom, $arrayRoad)) {
                $new = $objProfile->updateInfoPersoFarmer($RoadFrom, 'Road', $idfarmer);
            }else{
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                La valeur sélectionner n'est pas répertorier, veuillez choisir une valeur ('Rue', 'Avenue', 'boulevard', 'impasse');
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($RoadNameFrom != $RoadName) {
        if (!empty($RoadNameFrom)) {
            if (preg_match("/^[a-zA-Z- '\s]+$/", "$RoadNameFrom")) {
                $new = $objProfile->updateInfoPersoFarmer($RoadNameFrom, 'RoadName', $idfarmer);
            } else {
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($CityFrom != $City) {
        if (!empty($CityFrom)) {
            if (preg_match("/^[a-zA-Z- '\s]+$/", "$CityFrom")) {
                $new = $objProfile->updateInfoPersoFarmer($CityFrom, 'City', $idfarmer);
            } else {
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($PostalCodeFrom != $PostalCode) {
        if (!empty($PostalCodeFrom)) {
            if (preg_match("/^[0-9]*$/", "$PostalCodeFrom")) {
                $new = $objProfile->updateInfoPersoFarmer($PostalCodeFrom, 'PostalCode', $idfarmer);
            } else {
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($PhoneForm != $Phone) {
        if (!empty($PhoneForm)) {
            if (preg_match("/^[0-9]*$/", "$PhoneForm")) {
                $new = $objProfile->updateInfoPersoFarmer($PhoneForm, 'Phone', $idfarmer);
            } else {
                $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Le nom ne remplis pas les conditions de formulaire.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                Vous devez remplir le(s) champ(s) vide.
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($RegionFrom != $Region) {
        $new = $objProfile->updateInfoPersoFarmer($RegionFrom, 'Region', $idfarmer);
    }
}
?>