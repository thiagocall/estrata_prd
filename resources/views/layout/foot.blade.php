
<script src="https://unpkg.com/popper.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    	$(function(){
        $('#atuacao').change(function(){
    			var id_regional = $('#atuacao').val();
    					$.ajax({
						  type: "POST",
						  url: "{{url('getIES')}}",
						  data: {id_regional: id_regional},
              //dataType:'text',
						  success: function(data){
              $('#ies').html(data['options']);
              $('#ies').removeAttr('disabled');
              $('#corpo_1').html(data['corpo_1']);
              $('#corpo_2').html(data['corpo_2'])
                }       

						});
                    
    			});

        ///////////////////////****************************

         $('#ies').change(function(){
                var id_ies = $('#ies').val();
                        $.ajax({
                          type: "POST",
                          url: "{{url('getCampus')}}",
                          data: {id_ies: id_ies},
                        //dataType:'text',
                          success: function(data){
                        //console.log(data);
                        $('#campus').html(data);
                        $('#campus').removeAttr('disabled')
                        $('#campus').change(function(){
                            var id_curso =  $('#campus').val();
                            $.ajax({
                              type: "POST",
                              url: "{{url('getCurso')}}",
                              data: {id_curso: id_curso},
                            //dataType:'text',
                              success: function(data){
                            $('#curso').html(data);
                            $('#curso').removeAttr('disabled')
                               } 
                            });
                        
                    });


                               } 


                        });
                    
                });

         //////////////////////*****************************

         $('#curso').change(function(){
                var id_curso =  $('#curso').val();
                var id_campus =  $('#campus').val();
                        $.ajax({
                          type: "POST",
                          url: "{{url('getTurno')}}",
                          data: {id_curso: id_curso,
                                 id_campus: id_campus},
                        //dataType:'text',
                          success: function(data){
                        $('#turno').html(data);
                        $('#turno').removeAttr('disabled')}
                        });
                });
    });


      //////////////////////****************************************

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
              url: "{{url('getCampus_IES')}}",
              data: {id_ies: id_ies},
              //dataType:'text',
              success: function(data){
              $('#campus').html(data['options']);
                }       

                  });
                    
          })});

//********************** Busca lista de professores
$(function(){ 
        $('#btn_buscar').click(function(){
          var id_campus = $('#campus').val();
          var cpf_ = $('#cpf').val();
          $('#lista').html("<div class='container text-center' style='margin-top:15%'> <img src='../images/WaitCover.gif' class='rounded rounded-circle mx-auto d-block' width=5% > processando...</div>")
              $.ajax({
              type: "POST",
              url: "{{url('lista_professor')}}",
              data: {id_campus: id_campus, cpf: cpf_},
              success: function(data){
              $('#lista').html(data['campus']);
              console.log(data['campus'])
                }       
                  });      
          })});


$(function(){
        $('#btn_voltar').click(function(){
          history.back();
           $('#btn_buscar').change();
          })});


     ////////////////////////****************************************



$(document).ready(function() {localStorage.idshow = "0"});

function mostraDetalhes(obj){
    //localStorage.idshow = localStorage.idshow + 1;
    if(localStorage.idshow == "0"){
    $("#t_"+ obj.id).slideDown("slow");
    localStorage.idshow = "1";
      }

    else {

        $("#t_" + obj.id).slideUp("slow");
        localStorage.idshow = "0";
    
  }

  }

    </script>

    <style type="text/css">
      

.progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #44484b;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}
.progress.blue .progress-bar{
    border-color: #6fc8bf;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1s linear forwards 1.8s;
}
.progress.yellow .progress-bar{
    border-color: #ddde40;
}
.progress.yellow .progress-left .progress-bar{
    animation: loading-2 1s linear forwards 1.8s;
}
.progress.pink .progress-bar{
    border-color: #ed687c;
}
.progress.pink .progress-left .progress-bar{
    animation: loading-4 0.4s linear forwards 1.8s;
}
.progress.green .progress-bar{
    border-color: #29c1f1;
}
.progress.green .progress-left .progress-bar{
    animation: loading-2 1s linear forwards 1.8s;
}

.progress.red .progress-bar{
    border-color: #1E91E0;
}
.progress.red .progress-left .progress-bar{
    animation: loading-2 1s linear forwards 1.8s;
}

@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(145deg);
        transform: rotate(145deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }
}


    </style>

  </body>

</html>
