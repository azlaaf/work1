<?php
session_start();
$email=$_SESSION['email'];
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
$idemploye=isset($_GET['idEmployee'])?$_GET['idEmployee']:0;
$nbremploye="select count(*) countUser from employee where main_user='$email' ";
$resultatCount=$conn->query($nbremploye);
$tabCount=$resultatCount->fetch_assoc();
$nbrUser=$tabCount['countUser'];

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center" style="">Statistics</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="https://2wahka.com/31012012/admin/index.php">Home</a></li>-->
             <!-- <li class="breadcrumb-item active">Statistics</li>    -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container text-center">
           <div class ="row">
      <div class="row-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height:90%;">
              <div class="inner" style="padding-top:60px;">
                <h3><?php echo $nbrUser ?></h3>
                <p>Numbre Of Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add" style="padding-top:60px;"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="row-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style="height:90%;">
              <div class="inner"style="padding-top:60px;">
                <h3>20</h3>
                <p>Hours Used This Time Period</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars" style="padding-top:60px;"></i>
              </div>
            </div>
          </div>
      </div>

         <div class="row">
         <div class="row-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style=" padding-bottom: 74px;" >
              <div style="position :relative; top: 45px; " >
                <h3>30<sup style="font-size: 20px">%</h3>
                <p>Average Hours Per Employed</p>
              </div>
              <div class="icon"  style="position :relative; bottom: 55px; ">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="row-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                            
                             if($idemploye==0){
                              echo"<h3>0</h3>";
                             }else{
                              $query = "SELECT * FROM employee where idEmployee=$idemploye ";
                              $result = $conn->query($query);
                             $rowem = $result->fetch_assoc();
                              echo"<h3>$rowem[Periode]</h3>";
                              
                             }
                             
                             ?>
                <p>Specific Hours Of An Employee</p>
                
              
              <form method="get" action="statistique.php" >
                   <div class="mb-3">
                    <!--<label for="idEmployee" style="font-style: italic; ">sélectione un employé:</label>-->
              <select name="idEmployee" class="form-control" id="idEmployee"  onchange="this.form.submit()">
              <option value=0>Employee names</option>
                             <?php
                             $query = "SELECT * FROM employee where main_user='$email' ";
                             $result = $conn->query($query);
                             //while($row = $result->fetch_assoc()){
                              
                             //}
                             ?>
                             <?php while ($row = $result->fetch_assoc()) { ?>
                                
                                <option value="<?php echo $row['idEmployee'] ?>"
                                
                                    <?php if($row['idEmployee']===$idemploye) echo "selected" ?>>
                                    
                                    <?php echo $row['Name'] ?> 
                                    
                                </option>
                                <?php } ?>
                            </select>
                </div>
           
                            </form>
                                            
                                        


            </div>
           
              </div>
              
          </div>
          <!-- ./col -->
         </div>
         <div class ="row">
      <div class="row-lg-3 col-6">
            <!-- small box -->
            <div class="small-box"  style="background-color: #9e63ff ;height:100%;"> 
              <div class="inner">
                <h3>3</h3>
                <p>Specific Vacation For An Employee</p>
              </div>
              
              <div class="icon" style="position :relative; bottom: 20px;">
              <!--<label  style="font-style: italic; color: white;">sélectione un employé:</label>-->
              <select class="form-control" style="margin-left:10px; width: 96.5%;  ">
              <option value=0>Employee names</option>
              <?php
                             $query = "SELECT * FROM employee where main_user='$email'  ";
                             $result = $conn->query($query);
                             //while($row = $result->fetch_assoc()){
                              
                             //}
                             ?>
                             <?php while ($row = $result->fetch_assoc()) { ?>
                                
                                <option value="<?php echo $row['idEmployee'] ?>"
                                
                                    <?php if($row['idEmployee']===$idemploye) echo "selected" ?>>
                                    
                                    <?php echo $row['Name'] ?> 
                                    
                                </option>
                                <?php } ?>
                 </select>

              </div>
    
            </div>
          
          </div>
          <!-- ./col -->
          <div class="row-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background-color: #9e6347;height:100%;">
              <div class="inner">
                <h3>10</h3>

                <p>Specific Absence Of An Employee</p>
              </div>
              <div class="icon"   style="position :relative; bottom: 20px;">
              <!--<label for="idEmployee" style="font-style: italic; color: white;">sélectione un employé:</label>-->
              <select class="form-control" style="margin-left:10px; width: 96.5%;  " >
              <option value=0>Employee names</option>
              <?php
                             $query = "SELECT * FROM employee where main_user='$email'  ";
                             $result = $conn->query($query);
                             //while($row = $result->fetch_assoc()){
                              
                             //}
                             ?>
                             <?php while ($row = $result->fetch_assoc()) { ?>
                                
                                <option value="<?php echo $row['idEmployee'] ?>"
                                
                                    <?php if($row['idEmployee']===$idemploye) echo "selected" ?>>
                                    
                                    <?php echo $row['Name'] ?> 
                                    
                                </option>
                                <?php } ?>
                 </select>
              </div>

            </div>
          </div>
      </div>
          
        </div>
        <?php
include ('includes/footer.php');
?>