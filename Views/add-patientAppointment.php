<?php
require_once 'includes/header.php';
?>
<div class="row">
    <?php
    if(isset($success)){ ?>
    <p class="alert alert-success">Le compte et le rendez-vous du patient <?= $patient->firstname. ' '. $patient->lastname ?> a été créé</p>
    <?php
    }
    ?>
    <div class="card col-sm-10 offset-2 bg-light">
        <div class="card-header font-weight-bold bg-info">
            <h1>Ajout d'un patient</h1>
        </div>
        <form method="post" action="#">
            <div class="form-group col">
                <label for="lastName">Nom</label>
                <input name="lastname" type="text" id="lastName" class="form-control" placeholder="" value="<?= $lastname ?>">
            </div>
            <div class="form-group col">
                <label for="firstName">Prénom</label>
                <input name="firstname" type="text" id="firstName" class="form-control" placeholder="" value="<?= $firstname ?>">
            </div>
            <div class="form-group col">
                <label for="birthdate"> Date de Naissance:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?= $birthdate ?>">
                <span class="text-danger"><?= ($errors['birthdate']) ?? '' ?></span>
            </div>
            <div class="contact mb-2">
                <label for="phone"> Numéro de téléphone:</label>
                <input type="text" id="phone" name="phone" value="<?= $phone ?>">
                <span class="text-danger"><?= ($errors['phone']) ?? '' ?></span>
                <label for="mail"> Mail:</label>
                <input type="mail" id="mail" name="mail" value="<?= $mail ?>">
                <span class="text-danger"><?= ($errors['mail']) ?? '' ?></span>
            </div>
            <div class="appointment">
                    <label for="periodpicker"> Date et heure du rendez-vous: </label>
                    <input id="periodpicker" name="dateHour" type="text" />
            </div>
            <div class="button col-sm-5 offset-3 mb-2">
                <input class=" btn btn-info" type="submit" name="addPatientApp" value="Ajout d'un patient">
                <a class="btn btn-dark" href="liste-patientsController.php">Accueil</a>
            </div>

        </form>
    </div>   
</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery.datetimepicker.full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script>
    var min_date = new Date();
    jQuery.datetimepicker.setLocale('fr');
    jQuery('#periodpicker').datetimepicker({
        format: 'd.m.Y H:i',
        minDate: min_date,
        inline: false,
        lang: 'fr'
    });
   
</script>
<?php
require_once 'includes/footer.php';
?>



