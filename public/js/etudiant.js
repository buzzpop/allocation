$(document).ready(function (){
    let offset=0;
    //Partie Etudiant
    var body= $('#body');
    $('#typeE').change(function (){
        $('#divAdresse').remove();
        if( $('#typeE').val()==="Non Boursier" || $('#typeE').val()=== "Boursier Non Loge"){
            $('#afterType').after(` <div class="form-group" id="divAdresse">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse">
         <span class="text-danger"><?=@$error['adresse']?></span>
    </div>`);
        }else{
            $('#divAdresse').remove();
        }
    })
    // matricule generation
    $('#date').change(function(){
        $.ajax({
            type:'get',
            url:'/ROOM_MANAGEMENT/etudiant/nbrRow',
            success: function(data, statut){
                nbr=data;
                function complete(){
                    return nbr.toString().padStart(4,'0');
                }
                var matricule= $('#matricule');
                var prenom=  $('#prenom').val();
                var nom=  $('#nom').val();
                var tabDate=  $('#date').val().split('-');
                matricule.attr(`value`,`${tabDate[0]}${prenom.substr(0,2).toUpperCase()}${nom.substr((nom.length)-2).toUpperCase()}${complete()}`)
                console.log(prenom.substr(0,2));
                console.log($('#date').val());
                console.log(matricule.val());

            }
        })
    });
    $.ajax({
        url:'/ROOM_MANAGEMENT/etudiant/lister',
        type: 'POST',
        data:{limit:4, offset:offset},
        dataType: 'json',
        success:function (data) {
            showEtudiant(data, body);
            offset+=4;
        }
    });

    //
    //
    function showEtudiant(data, tbody) {
        $.each(data, function (indice, etudiant){
            tbody.append(`<tr>
                                    <td>${etudiant.matricule}</td>
                                     <td>${etudiant.nom.toUpperCase()}</td>
                                   <td>${etudiant.prenom[0]+etudiant.prenom.substr(1)}</td>
                                   <td>${etudiant.email}</td>
                                   <td>${etudiant.tel}</td>
                                   <td>${etudiant.datNaiss}</td>
                                   <td>${etudiant.adresse}</td>
                                   <td>${etudiant.typeBourse}</td>
                                    <td><button type="button" class="btn btn-outline-primary"id="mdfetudiant" data-toggle="modal" data-target="#myModal">Modify</button></td>
                                    <td><button type="button" class="btn btn-outline-danger" id="dltetudiant">Delete</button></td>
                                   </tr>`)
        })

    }
    //fonction ki supprime le tr et les données dans la base de données
    $(document).on('click','#dltetudiant',function () {
        if (confirm("Do you want to delete?")){
            $(this).parents("tr").remove();
            let matricule= $(this).parents('tr').find('td').eq(0).html();
            // console.log(num);

            $.ajax({
                type:'POST',
                url:'/ROOM_MANAGEMENT/etudiant/remove',
                dataType:'html',
                data:{matricule: matricule},
                success:function (data) {
                    if (data==="ok"){
                        alert('Successful deletion');
                    }
                }
            });
        }

    });

    //fonction ki charge les données de la ligne dans le popup
    $(document).on("click","#mdfetudiant", function() {

        let matricule= $(this).parents('tr').find('td').eq(0).html();
        let nom= $(this).parents('tr').find('td').eq(1).html();
        let prenom= $(this).parents('tr').find('td').eq(2).html();
        let email= $(this).parents('tr').find('td').eq(3).html();
        let tel= $(this).parents('tr').find('td').eq(4).html();
        let date= $(this).parents('tr').find('td').eq(5).html();
        let adresse= $(this).parents('tr').find('td').eq(6).html();
        let typeB= $(this).parents('tr').find('td').eq(7).html();
        tabEtu=['Boursier Loge','Non Boursier','Boursier Non Loge'];
        $('#matricule').attr('value',matricule);
         $('#nom').attr('value',nom);
        $('#prenom').attr('value',prenom);
        $('#email').attr('value',email);
        $('#tel').attr('value',tel);
        $('#date').attr('value',date);
        if (adresse !==""){
            $('#adresseG').remove();
            $('#email').after(` <div class="form-group" id="adresseG">
                        <label for="fn">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse">
                    </div>`);
            $('#adresse').attr('value',adresse);
        }else{
            $('#adresseG').remove();
        }
        $('#etudiantT').children().remove();
        $.each(tabEtu, function (indice, value){
            if (value===typeB){
                $('#etudiantT').append(` <option selected value="${value}">${value}</option>`)
            }else{
                $('#etudiantT').append(` <option value="${value}">${value}</option>`)
            }
        })

        //fonction qui met a jour les données
        $(document).on("click","#modifE", function() {
            let data= $('#popup').serialize();
            $.ajax({
                url:'/ROOM_MANAGEMENT/etudiant/change',
                type:'post',
                data:data,
                dataType:'html',
                success:function (data) {
                    alert('Modification carried out successfully');
                    alert(data);
                }
            });
        });


    });
})