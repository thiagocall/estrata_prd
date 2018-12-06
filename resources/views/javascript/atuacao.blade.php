
<script type="text/javascript">
$(function(){
        $('#atuacao').change(function(){
    			var id_regional = $('#atuacao').val();
    					$.ajax({
						  type: "POST",
						  url: '{! url("/atuacao_")!}',
						  data: {id_regional: id_regional},
              //dataType:'text',
						  success: function(data){
              $('#ies_').html(data['options']);
              $('#ies_').removeAttr('disabled');
              $('#corpo_1').html(data['corpo_1']);
              $('#corpo_2').html(data['corpo_2'])
                }       

						});
                    
    			});

        ///////////////////////****************************

         $('#ies_').change(function(){
                var id_ies = $('#ies_').val();
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
                              url: "{{route('getCurso')}}",
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
                          url: "{{route('getTurno')}}",
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

</script>

