$(document).ready(function(){
	
	$(document).on('click', '.view', function(){  
           var nomeCientifico = $(this).attr("id"); 
           if(nomeCientifico != '')  
           {                    
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{nomeCientifico: nomeCientifico},  
                          success:function(data){  
                          $('#planta_detalhe').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });

          }
          $(document).on('click', '#imprimir', function(){
    


                  $.ajax({  
                     url:"pdff.php",  
                     method:"POST",  
                     data:{
                      
                      nomeCientifico: nomeCientifico
                      

                     }, 
                     dataType: "JSON"
                     
                     
                
                     
                          
                     
          });
                             
      });

 
});	
});



