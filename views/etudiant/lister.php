<!-- popup ki charge les donnees a editer: debut -->
<div class="modal text-center" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal">
            <div class="modal-header">
                <h4 class="modal-title">Etudiant à modifier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body" id="popupEtudiant">
                <form id="popup">
                    <div class="form-group">
                        <label for="fn">Matricule</label>
                        <input type="text" class="form-control" id="matricule" name="matricule" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fn">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="fn">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" >
                    </div>
                    <div class="form-group">
                        <label for="fn">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="fn">Tel</label>
                        <input type="text" class="form-control" id="tel" name="tel" >
                    </div>
                    <div class="form-group">
                        <label for="fn">Date d'Inscription</label>
                        <input type="date" class="form-control" id="date" name="date" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ln">Type Etudiant</label>
                        <select class="form-control" id="etudiantT" name="etudiantT">

                        </select>
                    </div>

                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="modifE">Modifier</button>

            </div>

        </div>
    </div>
</div>
<!--Fin popup-->

<!-- Mon tableau pour lister les chambres-->
<div id="scrollzone" class="col">
    <table class="table table-bordered text-center" id="tableroom">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Matricule</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Inscription</th>
            <th scope="col">Adresse</th>
            <th scope="col">Type Bourse</th>
            <th scope="col"colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody id="body">

        </tbody>
    </table>
</div>
<!-- Fin de mon tableau-->

<script src="<?=BASE_URL?>/public/js/jquery-3.5.1.js"></script>
<script src="<?=BASE_URL?>/public/js/etudiant.js"></script>

