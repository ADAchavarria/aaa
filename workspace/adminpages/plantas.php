<?php
  session_start();
  require_once("../connect.php");
  //include 'addPlanta.php';

  



?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plantas</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/modalAdd.css" rel="stylesheet">

    <link href="css/logonav.css" rel="stylesheet">

  </head>


  <body id="page-top">

    

    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script  type="text/javascript" src="js/modal.js"></script>



    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" ><img src="imgs/logo.png" class="logo"></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
            
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          
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
        
        
        <li class="nav-item active">
          <a class="nav-link" href="plantas.php">
            <i class="fas fa-fw fa-tree"></i>
            <span>Plantas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabelas</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a><b>PLANTAS</b></a>
            </li>
            
          </ol>


          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-tree"></i>
              Adicionar Plantas</div>
            <div class="card-body">
              <div class="form-group">
                  <label>Introduza o <strong> nome da espécie:</strong></label>
                      

                  <form class="form"  method="GET" id="myForm">
                        <input type="text" style="width:40%" placeholder="Pesquise aqui as plantas que pretende adicionar..." name="search" id="searchPlanta">
                        <p></p>
                        <button id="add" data-target="#add_data_Modal" type="submit" class="btn btn-primary" >Procurar Informação</button>
                  </form>





<!--Insert Modal-->


  <div id="add_data_Modal" class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <form method="post" name="insert_form" id="insert_form">
        <h4 class="tittle" style="color: green;" id="tituloModal"  name="tituloModal"></h4>
        <input type="hidden" name="titulo1" id="tituloInput">
        
      </div>
      <div class="modal-body">

        <div class="table-responsive">  
           <table class="table table-bordered">
                <tr>
                  <div class="form-group">
                  <td><b>Nome Comum:</b></td>
                  <td><p id="nomeComumModal" name="nomeComum" ></p>
                  <input type="hidden" name="nomeComum1" id="nomeComumInput"></input></td>
                  
                  
              </div>
            </tr>
              <tr>
              <div class="form-group">
                  <td><b>Espécie:</b></td>
                  <td><p id="especieModal" name="especie" ></p>
                  <input type="hidden" name="especie1" id="especieInput"></input></td>
                  
              </div>
            </tr>
              <tr>
              <div class="form-group">
                  <td width="30%"><b>Família:</b></td>
                  <td width="70%"><p id="familiaModal" name="familia" ></p>
                  <input type="hidden" name="familia1" id="familiaInput"></input></td>
                  
                  
              </div>
            </tr>
              <tr>
              <div class="form-group">
                  <td width="30%"><b>Ordem:</b></td>
                 <td width="70%"><p id="ordemModal" name="ordem"></p>
                  <input type="hidden" name="ordem1" id="ordemInput"></input></td>
              </div>
            </tr>
              <tr>
              <div class="form-group">
                  <td width="30%"><b>Fotos:</b></td>
                  <td width="70%"><div id="fotosModal" name="fotosUrl"  ></div></td>
              </div>
            </tr>


              <tr>
               <div class="form-group">
                  <td width="30%"><b>Qr Code:</b></td>
                  <td width="70%"><p id="qrCodeModal" name="qrcode"  ></p>
                  <input type="hidden" name="qrcode1" id="qrcodeInput"></input></td>
              </div>
            </tr>

             <tr>
              <div class="form-group">
                  <td width="30%"><b>Descrição:</b></td>
                  <td width="70%"><p id="contentModal" name="descricao"></p>
                  <input type="hidden" name="descricao1" id="descricaoInput"></input></td>

              </div>
            </tr>

          </table>  
      </div>
              <input type="hidden" name="employee_id" id="employee_id" />  
              <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                      


                          
                      
                  
                      

              </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
    
            
            
        <!-- /.container-fluid -->

        

      </div>
      <!-- /.content-wrapper -->

    </div>

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
            <a class="btn btn-primary" href="../logout.php">Logout</a>
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
    

    <script src="js/modal.js"></script>

  </body>

</html>