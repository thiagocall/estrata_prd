
<script src="https://unpkg.com/popper.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

</body>

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
                }       
                  });      
          })});


$(function(){
        $('#btn_voltar').click(function(){
          history.back();
           $('#btn_buscar').change();
          })});

     ////////////////////////****************************************

    </script>
  </body>

</html>
