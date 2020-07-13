<form id="chambre" class=" w-50 p-4 rounded shadow-lg"  method="post" action="<?=BASE_URL?>/chambre/inscription">
    <div class="row justify-content-center text-center font-weight-bold">
        <p>ENREGISTREMENT D'UNE CHAMBRE</p>
    </div>
    <div class="row justify-content-center">
        <p class="text-success"><?=@$message ?></p>
    </div>
    <div class="form-group">
        <label for="numer">N° Chambre</label>
        <input type="text" class="form-control" name="numChambre" id="numero" readonly>
    </div>

    <div class="form-group">
        <label for="type">Type Chambre</label>
        <select class="form-control" id="type" name="typeChambre">
            <option value="">Choisir le type de chambre</option>
            <option value="individuel">individuel</option>
            <option value="deux">deux</option>
        </select>
        <span class="text-danger"><?=@$error['typeC']?></span>
    </div>
    <div class="form-group">
        <label for="selectB">N° Batiment</label>
        <select class="form-control" id="selectB" name="numBatiment">
            <option value="">Choisir le N° du Batiment</option>
        </select>
        <span class="text-danger"><?=@$error['numB']?></span>
    </div>
    <div class="form-group">
        <button type="submit" name="btn"  class="btn btn-outline-dark">ENREGISTRER</button>
    </div>


    <div class="row justify-content-center text-center mt-4">
        <p class="copyright font-weight-bold">Copyright © R_A_S BEAT 2020.</p>
    </div>

</form>
<script src="<?=BASE_URL?>/public/js/jquery-3.5.1.js"></script>
<script src="<?=BASE_URL?>/public/js/script.js"></script>