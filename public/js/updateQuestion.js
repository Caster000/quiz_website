$(document).ready(function(){
    // $('#ModificationModal').click(function(){
    //
    //     $('#insert').val("Insert");
    //     $('#insert_form')[0].reset();
    // });
    $(document).on('click', '.edit_data', function(){
        //console.log('hello');
        var id_theme = $(this).attr("id");
        $.ajax({
            url:"creation_quiz/index/"+id_theme,
            method:"GET",
            data:{"_token": $('#csrf-token')[0].content,id_theme:id_theme},
            dataType:"json",
            success:function(data){
                for(let i=0;i<10;i++){
                    $("#"+i+"_question").val(data[i].question);
                    $("#"+i+"_reponse").val(data[i].reponse);
                    $("#"+i+"_carre1").val(data[i].carre1);
                    $("#"+i+"_carre2").val(data[i].carre2);
                    $("#"+i+"_carre3").val(data[i].carre3);
                    $("#"+i+"_carre4").val(data[i].carre4);
                    $("#"+i+"_duo1").val(data[i].duo1);
                    $("#"+i+"_duo2").val(data[i].duo2);
                }
                //$('#ModificationModal').modal('show');
            }
        });
    });
    // $('#insert_form').on("submit", function(event){
    //         console.log('heloo')
    //         $.ajax({                     //  permet l'insertion des donnees en ajax  --}}
    //             url:"creation_quiz/update/"+id_theme,
    //             method:"POST",
    //             data:$('#insert_form').serialize(),
    //             beforeSend:function(){
    //                 $('#insert').val("Inserting");
    //             },
    //             success:function(data){
    //                 $('#insert_form')[0].reset();
    //                 $('#ModificationModal').modal('hide');
    //                 $('#bdd_table').html(data);
    //             }
    //         });
    //
    // });

});
