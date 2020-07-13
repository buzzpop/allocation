<form id="chambre" class=" w-50 p-4 rounded shadow-lg" method="post" action="<?=BASE_URL?>/batiment/inscription">
    <div class="row justify-content-center text-center font-weight-bold">
        <p>ENREGISTREMENT D'UN BATIMENT</p>
    </div>
    <div class="row justify-content-center">
        <p class="text-success"><?=@$message ?></p>
    </div>
    <div class="form-group">
        <label for="batiment">N° Batiment</label>
        <input type="text" class="form-control" id="batiment" name="numbatiment" value="<?=@$_POST['numbatiment']?>" placeholder="Saisir le numéro du batiment">
    <span class="text-danger"><?=@$error['numB']?></span>
    </div>


    <div class="form-group">
        <button type="submit" name="btn_submit" class="btn btn-outline-dark">ENREGISTRER</button>
    </div>


    <div class="row justify-content-center text-center mt-4">
        <p class="copyright font-weight-bold">Copyright © R_A_S BEAT 2020.</p>
    </div>
</form>
