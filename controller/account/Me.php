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
                    The name does not meet the conditions of the form.
                </div>";
                return $errorInfoPerso;
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    You must fill in the empty fields
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
                    The Surname does not meet the conditions of the form.
                </div>";
                return $errorInfoPerso;
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    You must fill in the empty fields :
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
                        the e-mail adresse already exists :
                    </div>";
                    return $errorInfoPerso;
                }else{
                    $new = $objProfile->updateInfoPerso($EmailFrom,'Email',$session);
                }
            }else{
                $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    The email does not meet the conditions of the form.
                </div>";
                return $errorInfoPerso;
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    You must fill in the empty fields :
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
                    the minimum age required is 16 years old
                </div>";
                return $errorInfoPerso;
            }else{
                $new = $objProfile->updateInfoPerso($DateFrom,'DateBirth',$session);
            }
        }else{
            $errorInfoPerso = "
                <div class='alert alert-danger' role='alert'>
                    You must fill in the empty fields :
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
            The image must be in '.jpg' format :
        </div>";
        return $errorProfilPicture;
    }else{
        move_uploaded_file($_FILES['file_picture']['tmp_name'],$uploaddir.$idfarmer.'.jpg');

        $errorProfilPicture = "
        <div class='alert alert-success' role='alert'>
            Your request has been sent to an administrator
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
                The name does not meet the conditions of the form.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
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
                The number of street does not meet the conditions of the form.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
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
                The selected value is not listed :
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
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
                The Name of street does not meet the conditions of the form.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
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
                The City does not meet the conditions of the form.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
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
                The Postal code does not meet the conditions of the form.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
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
                The phone number does not meet the conditions of the form.
            </div>";
                return $errorInfoPersoFarmer;
            }
        } else {
            $errorInfoPersoFarmer = "
            <div class='alert alert-danger' role='alert'>
                You must fill in the empty fields :
            </div>";
            return $errorInfoPersoFarmer;
        }
    }

    if ($RegionFrom != $Region) {
        $new = $objProfile->updateInfoPersoFarmer($RegionFrom, 'Region', $idfarmer);
    }
}
?>