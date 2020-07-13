<form id="etudiant"  class="w-50 bg-light p-4 rounded shadow-lg"  method="post" action="<?=BASE_URL?>/etudiant/inscription">
    <div class="row justify-content-center text-center font-weight-bold">
        <p>ENREGISTREMENT D'UN ETUDIANT</p>
    </div>
    <div class="row justify-content-center">
        <p class="text-success"><?=@$message ?></p>
    </div>
    <div class="form-group">
        <label for="matricule">N° Matricule</label>
        <input type="text" class="form-control" id="matricule" placeholder="N° Matricule" readonly name="matricule">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom</label>
        <input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom">
        <span class="text-danger"><?=@$error['prenom']?></span>
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
        <span class="text-danger"><?=@$error['nom']?></span>
    </div>
    <div class="form-group">
        <label for="date">Date de Naissance</label>
        <input type="date" class="form-control" id="date" placeholder="16/12/2000" name="date">
        <span class="text-danger"><?=@$error['date']?></span>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
        <span class="text-danger"><?=@$error['email']?></span>
    </div>

    <div class="form-group">
        <label for="tel">Telephone</label>
        <input type="tel" class="form-control" id="tel" placeholder="77 xxx xx xx" name="tel">
        <span class="text-danger"><?=@$error['tel']?></span>
    </div>

    <div class="form-group" id="afterType">
        <label for="type">Type Etudiant</label>
        <select class="form-control" id="typeE" name="type">
            <option value="">Choisir le Type d'Etudiant</option>
            <option>Boursier Loge</option>
            <option>Boursier Non Loge</option>
            <option>Non Boursier</option>
        </select>
        <span class="text-danger"><?=@$error['type']?></span>
    </div>
    <div class="form-group">
        <button type="submit" name="btn"  class="btn btn-outline-dark">ENREGISTRER</button>
    </div>
    <div class="row justify-content-center text-center mt-4">
        <p class="copyright font-weight-bold">Copyright © R_A_S BEAT 2020.</p>
    </div>
</form>
<script src="<?=BASE_URL?>/public/js/jquery-3.5.1.js"></script>
<script src="<?=BASE_URL?>/public/js/etudiant.js"></script>

