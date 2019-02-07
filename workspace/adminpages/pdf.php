<?php  

$db = new PDO('mysql:host=localhost;dbname=plantal','root','');
     require "fpdf.php";

     

          class myPDF extends FPDF{
               function headerTable(){
                    $this->SetFont('Times','B',12);

                    $this->Cell(70,10,'Nome',1,0,'C');
                    $this->Cell(80,10,'QrCode',1,0,'C');
                    $this->Ln();
               }

               function viewTable($db){
                    $this->SetFont('Times','B',12);
                    $stnt = $db->query("select * from planta ");
                    while($data = $stnt->fetch(PDO::FETCH_OBJ)){

                         $this->Cell(70,65,$data->nomeCientifico,1,0,'C');
             //  $qrcode = $this->Image($data->qrCode);
                         $x = $this->GetX(); 
                         $y = $this->GetY();

                         $this->Cell(80,65,$this->Image($data->qrcode, $x+7, $y, 65),1,0,'C');

                         $this->Ln();
                    }
               }
          }
     
     


$pdf = new myPDF();
$pdf-> AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();

$pdf->viewTable($db);
$pdf->Output();

 




