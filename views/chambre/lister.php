<!-- popup ki charge les donnees a editer: debut -->
<div class="modal text-center" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal">
            <div class="modal-header">
                <h4 class="modal-title">Chambre à modifier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                <form id="popup">
                    <div class="form-group">
                        <label for="fn"> N° Chambre</label>
                        <input type="text" class="form-control" id="ncham" name="ncham" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fn">Type de Chambre</label>
                        <select class="form-control" id="chambrep" name="chambrep">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ln">N° Batiment</label>
                        <select class="form-control" id="batimentp" name="batimentp">

                        </select>
                    </div>
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="modif">Modifier</button>

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
            <th scope="col">N° Chambre</th>
            <th scope="col">Type de Chambre</th>
            <th scope="col">N° Batiment</th>
            <th scope="col"colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li id="previous" class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li id="next" class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
<!-- Fin de mon tableau-->

<script src="<?=BASE_URL?>/public/js/jquery-3.5.1.js"></script>
<script src="<?=BASE_URL?>/public/js/script.js"></script>

