$(document).ready(function(){
    let selectTab=['individuel','deux'];
    $.ajax({
        type:'get',
        url:'/ROOM_MANAGEMENT/batiment/recupNumBatiment',
        dataType:'json',
        success: function(data, statut){
            data=JSON.stringify(data);
            data=JSON.parse(data);
            $.each(data,function (indice, item){
                $('#selectB').append(`<option>${item.numBatiment}</option>`)
            })

        }
    })



//

$('#selectB').change(function(){
    $.ajax({
        type:'get',
        url:'/ROOM_MANAGEMENT/chambre/nbrRow',
        success: function(data, statut){
            nbr=data;
            function complete(){
                return nbr.toString().padStart(4,'0');
            }
                var numChambre= $('#numero');
                var numeroBatiment=  $('#selectB').val();
                if (numeroBatiment.length===1){
                    numChambre.attr("value",`00${numeroBatiment}-${complete()}`)
                }
                else if (numeroBatiment.length===2){
                    numChambre.attr("value",`0${numeroBatiment}-${complete()}`)
                }else{
                    numChambre.attr("value",`${numeroBatiment}-${complete()}`)
                }
        }
    })
});

//
    var tbody= $('#tbody');

    let offset=0;
    $.ajax({
        url:'/ROOM_MANAGEMENT/chambre/lister',
        type: 'POST',
        data:{limit:3, offset:offset},
        dataType: 'json',
        success:function (data) {
            showData(data, tbody);
            offset+=3;
        }
    });
// pagination suivant
    $('#next').click(function (){

        $.ajax({
            url:'/ROOM_MANAGEMENT/chambre/lister',
            type: 'POST',
            data:{limit:3, offset:offset},
            dataType: 'json',
            success:function (data) {
                tbody.empty();
                showData(data, tbody);

                    offset+=3;


            }
        });
    })
    // pagination precedent
    $('#previous').click(function (){
        offset-=3;
        $.ajax({
            url:'/ROOM_MANAGEMENT/chambre/lister',
            type: 'POST',
            data:{limit:3, offset:(offset-3)},
            dataType: 'json',
            success:function (data) {
                tbody.empty();
                showData(data, tbody);

            }
        });
    })
//
    function showData(data, tbody) {
        $.each(data, function (indice, room){
            tbody.append(`<tr>
                                    <td>${room.numChambre}</td>
                                   <td>${room.typeChambre}</td>

                                   <td>${room.numBatiment.padStart(3,'0')}</td>
                                    <td><button type="button" class="btn btn-outline-primary"id="mdf" data-toggle="modal" data-target="#myModal">Modify</button></td>
                                    <td><button type="button" class="btn btn-outline-danger" id="dlt">Delete</button></td>
                                   </tr>`)
        })

    }

    //fonction ki supprime le tr et les données dans la base de données
    $(document).on('click','#dlt',function () {
        if (confirm("Do you want to delete?")){
            $(this).parents("tr").remove();
            let num= $(this).parents('tr').find('td').eq(0).html();
           // console.log(num);

            $.ajax({
                type:'POST',
                url:'/ROOM_MANAGEMENT/chambre/remove',
                dataType:'html',
                data:{num: num},
                success:function (data) {
                    if (data==="ok"){
                        alert('Successful deletion');
                    }
                }
            });
        }

    });

    //fonction ki charge les données de la ligne dans le popup
    $(document).on("click","#mdf", function() {

        let numero= $(this).parents('tr').find('td').eq(0).html();
        let chambre= $(this).parents('tr').find('td').eq(1).html();
        let batiment= $(this).parents('tr').find('td').eq(2).html();
        console.log(chambre);
        $('#ncham').attr('value',numero);
       // $('#chambrep').attr('value',firstname);
        //$('#batimentp').attr('value',lastname);
        $('#chambrep').children().remove();
        $.each(selectTab, function (indice, value){
            if (value===chambre){
                $('#chambrep').append(` <option selected value="${value}">${value}</option>`)
            }else{
                $('#chambrep').append(` <option value="${value}">${value}</option>`)
            }
        })

        $.ajax({
            type:'get',
            url:'/ROOM_MANAGEMENT/batiment/recupNumBatiment',
            dataType:'json',
            success: function(data, statut){
                data=JSON.stringify(data);
                data=JSON.parse(data);
                $.each(data,function (indice, item){
                    if ( item.numBatiment.toString().padStart(3,"0")===batiment){
                        $('#batimentp').append(`<option selected>${item.numBatiment.toString().padStart(3,"0")}</option>`)
                    }else{
                        $('#batimentp').append(`<option>${item.numBatiment.toString().padStart(3,"0")}</option>`)
                    }

                })

            }
        })


    });
    //fonction qui met a jour les données
    $(document).on("click","#modif", function() {
        let data= $('#popup').serialize();
        $.ajax({
            url:'/ROOM_MANAGEMENT/chambre/change',
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
