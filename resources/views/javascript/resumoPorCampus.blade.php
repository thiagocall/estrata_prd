<script type="text/javascript">


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(function(){
        $('#regional').change(function(){
          var id_regional = $('#regional').val();
              $.ajax({
              type: "POST",
              url: "{{url('getIES_Reg')}}",
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


$(function(){ 
        $('#btnResumo').click(function(){
          var id_campus = $('#campus').val()
          var id_ativos = $('#professorAtivo').is(':checked');
          $('#menssagem').html('');
          
          //$("#canvas_1").slideUp('slow');
          //$('#btnMostResumo').slideUp('slow');

          $('#myModal').modal('toggle');

              $.ajax({
              type: "POST",
              url: "{{route('resumoPorCampus')}}",
              data: {id_campus: id_campus, id_ativos: id_ativos},
              success: function(data){
               $('#myModal').modal('toggle');
                 //console.log({});
                  $('#qtdTotal').html(data['qtdTotal']);
                  $('#qtdDoutor').html(data['qtdDoutor']);
                  $('#qtdMestre').html(data['qtdMestre']);
                  $('#qtdTI').html(data['qtdTI']);
                  $('#qtdTP').html(data['qtdTP']);
                  $('#qtdH').html(data['qtdH']);
                  $('#qtdEspecialista').html(data['qtdEspecialista']);
                  $('#qtdNA').html(data['qtdNA']);
                //######## progress bar #########//
                  $('#perc_DM').width(data['perc_DM']).html(data['perc_DM']);
                  $('#perc_D').width(data['perc_D']).html(data['perc_D']);
                  $('#perc_TI').width(data['perc_TI']).html(data['perc_TI']);
                  $('#perc_R').width(data['perc_R']).html(data['perc_R']);
                  contar();
                  menuPesquisa($('#btnMostrarResultado'));
                  console.log('{{url("/")}}' + "/exportToFile/" + $('#campus').val() + "/xlsx");
                       /* $(function (){

                            $('btnExport').onClick(window.location.href ='{{url("/")}}' + "/exportToFile/" + $('#campus').val() + "/xlsx");

                          }); */
                },

                error: function(data){
                        $('#myModal').modal('toggle');
                        $('#menssagem').append("<div class='alert alert-danger'>Ops Erro na consulta</div>");

                }

                  });
                  $('#myModal').modal('hide');
                  

                  //console.log({id_campus, id_ativos});
          })});

  function contar(){$('.count').each(function () {
            $(this).prop('Counter',0).animate({
            Counter: $(this).text().replace('.','')
            }, {
            duration: 1500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    })}


  function ExportExcel(obj) {

      window.location.href ='{{url("/")}}' + "/exportToFile/" + $('#campus').val() + "/xlsx"

//      "window.location.href=" +  '{{url("/")}}' + "/exportToFile/" + $('#campus').val() + "/xlsx" )

  };

$(function(){
  menuPesquisa($('#btnMostrarResultado'));
  $('#menssagem').html('');
  $('#myModal').modal('show','fast');
  $('#qtdTotal').html('{{$qtdTotal}}');
  $('#qtdDoutor').html('{{$qtdDoutor}}');
  $('#qtdMestre').html('{{$qtdMestre}}');
  $('#qtdTI').html('{{$qtdTI}}');
  $('#qtdTP').html('{{$qtdTP}}');
  $('#qtdH').html('{{$qtdH}}');
  $('#qtdEspecialista').html('{{$qtdEspecialista}}');
  $('#qtdNA').html('{{$qtdNA}}');
  //######## progress bar #########//

  $('#perc_DM').width('{{$perc_DM}}').html('{{$perc_DM}}');
  $('#perc_D').width('{{$perc_D}}').html('{{$perc_D}}');
  $('#perc_TI').width('{{$perc_TI}}').html('{{$perc_TI}}');
  $('#perc_R').width('{{$perc_R}}').html('{{$perc_R}}');


    setTimeout(function() {
        console.log('Inicio comando Toggle');
        $('#myModal').modal('toggle');
        console.log('Fim comando Toggle');
      },800);
    contar(); 
          });

     ////////////////////////****************************************



    //################################### Busca por Campus #########################

function menuPesquisa(obj){

    if ($('#divMenuPesquisa').hasClass('aberto')){
      $('#' + obj.id).tooltip('hide');
      $('#divMenuPesquisa').slideUp("slow").removeClass("aberto").addClass("fechado");//, function(){$('#btnMostResumo').slideDown('Slow');});
      $('#btnImg').removeClass('fa fa-minus-circle').addClass('fa fa-plus-circle');

    }
    else if ($('#divMenuPesquisa').hasClass("fechado")) {
      $('#' + obj.id).tooltip('hide');
      $('#divMenuPesquisa').slideDown("slow").removeClass("fechado").addClass("aberto");
      $('#btnImg').removeClass('fa-plus-circle').addClass('fa-minus-circle'); 
      //console.log(obj);

    }

};




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