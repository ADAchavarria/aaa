$(document).ready(function(){
	
	$(document).on('click', '.delete_data', function(){
          $('#myModal').modal('show');

           var nomeCientifico = $(this).attr("id");
           

            
           if(nomeCientifico != '')  
           {  
            $('#delete').on("click", function(event){


                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{nomeCientifico: nomeCientifico},  
                          success:function(data){  
                            $('#myModal').modal('hide');
                            window.location.replace("/workspace/adminpages/tables.php");

                            
                            
                            
                     }  
                });

              });    
           }            
      });
});	




