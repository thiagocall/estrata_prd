<script type="text/javascript">

  $(function () {
    
  $('[data-toggle="tooltip"]').tooltip()
})


$(function(){
        $('#regional').change(function(){
          var id_regional = $('#regional').val();
              $.ajax({
              type: "POST",
              url: "{{route('getIES_Reg')}}",
              data: {id_regional: id_regional},
              //dataType:'text',
              success: function(data){
              $('#ies').html(data['options']);
                } 

                  });     

          })});

$(function(){
        $('#ies').change(function(){
          var id_ies = $('#ies').val();
              $.ajax({
              type: "POST",
              url: "{{route('getCampus_IES')}}",
              data: {id_ies: id_ies},
              //dataType:'text',
              success: function(data){
              $('#campus').html(data['options']);
                }       

                  });
                    
          })});

//###################### Busca lista de professores ######################

$(function(){ 
        $('#btn_buscar').click(function(){
          var id_campus = $('#campus').val();
          var cpf_ = $('#cpf').val();
          var id_ies = $('#ies').val();
          $("#canvas_1").slideUp('slow');
          $('#btnMostResumo').slideUp('slow');
          $('#lista').html("<div class='container text-center' style='margin-top:15%'> <img src='../images/WaitCover.gif' class='rounded rounded-circle mx-auto d-block' width=5%> processando... </div>")
              $.ajax({
              type: "POST",
              url: "{{route('lista_professor2')}}",
              data: {id_campus: id_campus, cpf: cpf_, id_ies: id_ies},
              success: function(data){
              $('#lista').html(data['corpo']);

              //############# Mota resumo em HTML ##############
              if (data['mostra_grafico']){
                $('#resumo').html(data['detalhes']);
                $("#canvas_1").slideDown('slow');
                    }

                },
                error: function(data){
                  $('#lista').html("<div class='alert alert-danger'>Ops! Erro na consulta</div>");

                }

                  });      
          })});


$(function(){
        $('#btn_fechar').click(function(){
          window.close();
          })});


     ////////////////////////****************************************


$(document).ready(function() {localStorage.idshow = "0"});

/*
$(function() {
    $('body').click(function(){
        if(localStorage.idshow == "1") {
            $('md_detalhe').slideUp("slow");
            alert("body clicado");
            //localStorage.idshow = "0";
            $('md_detalhe').removeClass( "fa fa-minus" ).addClass( "fa fa-plus" )
                 };
            })}
    );
    */

function mostraDetalhes(obj){
    //localStorage.idshow = localStorage.idshow + 1;
    if($("#d_"+ obj.id).hasClass("fechado")){
        $("#d_"+ obj.id).slideDown("slow").removeClass("fechado").addClass("aberto");
        $("#" + obj.id).removeClass( "fa fa-plus" ).addClass( "fa fa-minus" )
      }

    else {

        $("#d_" + obj.id).slideUp("slow").removeClass("aberto").addClass("fechado");
        $("#" + obj.id).removeClass( "fa fa-minus" ).addClass( "fa fa-plus" );
    
  }

  }


function hideResumo(){

    $('#canvas_1').slideUp("slow", function(){$('#btnMostResumo').slideDown('Slow');});
}


function showResumo(){

    $('#btnMostResumo').slideUp('Slow', function(){
      $('#canvas_1').slideDown("slow");});
}


//#################### Busca por Professor ########################//


$(function(){ 
        $('#btn_buscaProfessor').click(function(){
          var busca = $('#cpf').val();
          $('#lista').html("<div class='container text-center p-0 m-0'> <img src='../images/WaitCover.gif' class='rounded rounded-circle mx-auto d-block' width=3%> processando... </div>");

              $.ajax({
              type: "POST",
              url: "{{route('buscaProfessor2')}}",
              data: {busca: busca},
              success: function(data){
                $('#lista').html(data['corpo']);
                },
                error: function(data){
                  $('#lista').html("<div class='alert alert-danger'>Ops! Erro na consulta</div>");

                }

                  });      
          })});



$('#infoPessoal').on('hide.bs.collapse', function () {
  // do something…
    $('#btnPessoal').removeClass('fas fa-angle-up').addClass('fas fa-angle-down');

    });



$('#infoPessoal').on('show.bs.collapse', function () {
  // do something…
    $('#btnPessoal').removeClass('fas fa-angle-down').addClass('fas fa-angle-up');

    });


$('#infoContrato').on('hide.bs.collapse', function () {
  // do something…
    $('#btnContrato').removeClass('fas fa-angle-up').addClass('fas fa-angle-down');

    });


$('#infoContrato').on('show.bs.collapse', function () {
  // do something…
    $('#btnContrato').removeClass('fas fa-angle-down').addClass('fas fa-angle-up');

    });


$('#infoRegulatorio').on('hide.bs.collapse', function () {
  // do something…
    $('#btnRegulatorio').removeClass('fas fa-angle-up').addClass('fas fa-angle-down');

    });


$('#infoRegulatorio').on('show.bs.collapse', function () {
  // do something…
    $('#btnRegulatorio').removeClass('fas fa-angle-down').addClass('fas fa-angle-up');

    });


  //*********************** Chart.JS *********************//

/*
function newChart(data_){
  var ctx = $("#chart_TI");
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
                  data: data_,

                  backgroundColor: ['rgba(8, 66, 103  , 1)',
                                    'rgba(221, 222, 64, 1)',
                                    'rgba(111, 200, 191  , 1)']

                  }
                  
                  ],
        labels: ['Horista','T. Integral','T. Parcial'],
        
        },

    options: {
              legend: {display:false}}
          
});

}

*/

</script>