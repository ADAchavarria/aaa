<?php 

require_once("../connect.php");

?>





<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">





    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/table.css">

    <link rel="stylesheet" type="text/css" href="css/modalDelete.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



  </head>

  <body id="page-top">

     <script type="text/javascript" src="js/jquery/jquery.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/select.js"></script>
    <script src="js/edit.js"></script>
    <script src="js/delete.js"></script>
    
    

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="plantas.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Plantas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>






          <!-- Tabela com as plantas -->


          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabela das plantas</div>
            <div class="card-body">
              <div class="table-responsive">

                
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >

                  <thead bgcolor="#00a156">

                    <tr>
                      <th>Nome Cientifico:</th>
                      <th>Nome Comum:</th>
                      
                      <th>Familia:</th>
                      
                      
                      <th>Ações:</th>

                      
                    </tr>
                  
                  </thead>
                  <tfoot bgcolor="#00a156">
                    <tr>
                      <th>Nome Cientifico</th>
                      <th>Nome Comum</th>
                      
                      <th>Familia</th>
                      
                      
                      
                     
                      <th></th>
                     
                    </tr>
                  </tfoot bgcolor="#00a156">
                  <tbody>

<?php  
$result = mysqli_query($connect,"SELECT nomeCientifico, nomeComum, familia FROM planta");

while($row = mysqli_fetch_array($result))
{
  ?>
<tr>  
     <td><?php echo $row["nomeCientifico"]; ?></td>  
     <td><?php echo $row["nomeComum"]; ?></td>
     <td><?php echo $row["familia"]; ?></td>
     
     <td><center>

      

      <a href="#dataModal" name="view" class="view" id="<?php echo $row["nomeCientifico"]; ?>" data-toggle="modal">
      <i class="material-icons" data-toggle="tooltip" style="color: blue;">visibility</i></a>
      
      <a href="#add_data_Modal" name="edit" class="edit_data" id="<?php echo $row["nomeCientifico"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" style="color:yellow;">&#xE254;</i></a>

      <a href="#myModal" name="delete" class="delete_data" data-toggle="modal" id="<?php echo $row["nomeCientifico"]; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete" style="color: red;">&#xE872;</i></a>
     
     </center></td>  
       
</tr> 
<?php  
}  
?> 
            
                    

                  </tbody>
                </table>
              </div>
              
                  <form action="pdf.php" method="POST">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Imprimir QrCodes" />  
                     </form>    
              

            </div>
            
          </div>


          

        </div>






<!-- /.Modal para ver informação -->


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Info Plantas</h4>  
                </div>  
                <div class="modal-body" id="planta_detalhe">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>




<!-- /Modal para Editar-->




 <div id="add_data_Modal" class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        <h4 class="modal-title" id="tituloModal" name="tituloModal"></h4>
        <input type="hidden" name="titulo1" id="tituloInput">
      </div>
      <div class="modal-body">
        
                  <div class="form-group">
                  <label>Nome Comum</label>
                  <p id="nomeComumModal" name="nomeComum" ></p>
                  <input type="hidden" name="nomeComum1" id="nomeComumInput"></input>
                  <hr>
                  
              </div>
              <div class="form-group">
                  <label>Espécie</label>
                  <p id="especieModal" name="especie" ></p>
                  <input type="hidden" name="especie1" id="especieInput"></input>
                  <hr>
              </div>
              <div class="form-group">
                  <label>Família</label>
                  <p id="familiaModal" name="familia" ></p>
                  <input type="hidden" name="familia1" id="familiaInput"></input>
                  <hr>
                  
              </div>
              <div class="form-group">
                  <label>Ordem</label>
                  <p id="ordemModal" name="ordem"></p>
                  <input type="hidden" name="ordem1" id="ordemInput"></input>
                  <hr>
              </div>
              <div class="form-group">
                  <label>Fotos</label>
                  <p id="fotosModal" name="fotosUrl"  ></p>
                  <input type="hidden" name="fotos1" id="fotosInput"></input>
                  <hr>
                 


              </div>
              
               <div class="form-group">
                  <label>QR Code</label>
                  <p id="qrCodeModal" name="qrcode"  ></p>
                  <input type="hidden" name="qrcode1" id="qrcodeInput"></input>
              </div>

              <div class="form-group">
                  <label>Descrição</label>
                  
                  <textarea id="contentModal" name="descricao" style="min-width: 100%"></textarea>
                  

              </div>
              
              <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
            
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal para apagar plantas -->





<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>        
        <h4 class="modal-title">Tem a certeza ?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Quer mesmo apagar esta planta ? Este processo não pode ser desfeito.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
        <button type="button" id="delete" class="btn btn-danger">Apagar</button>
      </div>
    </div>
  </div>
</div>    


        

</div>
      <!-- /.content-wrapper -->


    </div>


    <!-- /#wrapper -->



    <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
