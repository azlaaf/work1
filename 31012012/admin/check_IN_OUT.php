<?php

include ('includes/header_employee.php');
include ('includes/topbar_employee.php');
include ('includes/sidebar_employee.php');
include('config.php');
if(isset($_GET['Cin'])){
  $Cin=$_GET['Cin'];
  $sql="SELECT * from employee WHERE  Cin='$Cin'";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
  $idEmployee=$row['idEmployee'];
  //$Email=$row['email'];

  }


}
?>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1./jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <style>
   .butt {
    border: 3px outset blue;
    background-color: #228B22;
    height:100px;
    width:400px;
    cursor:pointer;
    border-radius: 50px 20px;
    color:white;
    font-size: 40px;
    font-style: italic;

}

.butt:hover {
   background-color: LightGreen ;
    color:black;
}
.butt1 {
    border: 3px outset blue;
    background-color: #FF0000;
    height:100px;
    width:400px;
    cursor:pointer;
    border-radius: 20px 50px;
    color:white;
    font-size: 40px;
    font-style: italic;
}

.butt1:hover {
   background-color: LightCoral ;
    color:black;
}
  </style>
  </head>


<div class="container-fluid overflow-hidden">
        <div class="col-md-8 mx-auto">
            <div class="card-header">
                <h3 class="text-center text-uppercase" style="position:relative; left:100px;">
                Check IN/OUT
                </h3>
               <!-- <form action="" method="">
            <button style="position: relative; left:1000px; top:200px;" class="butt1" name="click">CHECK OUT</button>
            <button style="position: relative; right:10px; top:200px;" class="butt" name="click">CHECK IN</button>
    </form>-->
            </div>
            </div>
            </div>
           
            <form action="" method="post">
            <button id="submit-button" style="position: relative; left:400px; top:200px;" class="butt" name="click1">CHECK IN </button>
    
            <button id="submit-button2"style="position: relative; left:600px; top:200px;" class="butt1" name="click2">CHECK OUT </button>
    </form>
               
              
               
<?php

if(isset($_POST['click1']))
{
    $Time_check_IN = date('H:i:s');
    $date_check_IN = date('Y-m-d');
     $sql="insert into Check_IN (Check_IN,date_check_IN,idEmployee) values ('$Time_check_IN','$date_check_IN','$idEmployee' )";
    if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
    window.alert(' sucessfully Check In ');
    const submitButton = document.getElementById('submit-button');
  submitButton.addEventListener('click', function() {
    submitButton.setAttribute('disabled', true);
  });
   /* window.location.href='https://2wahka.com/31012012/admin/check_IN_OUT.php?Cin=$Cin';*/
    </script>");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}

if(isset($_POST['click2']))
{
 
    $Time_check_OUT = date('H:i:s');
    $date_check_OUT = date('Y-m-d');
    $sql="insert into Check_OUT (Check_OUT,date_check_OUT,idEmployee) values ('$Time_check_OUT','$date_check_OUT','$idEmployee')";
    if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Check OUT');
     const submitButton = document.getElementById('submit-button2');
  submitButton.addEventListener('click', function() {
    submitButton.setAttribute('disabled', true);
  });
   /* window.location.href='https://2wahka.com/31012012/admin/check_IN_OUT.php?Cin=$Cin';*/
    </script>");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}
?>
                
        </div>
        
        


                  
        <script>
        $(document).ready(function() {
            $('#employee_data').DataTable({
                scrollY: '200',
                scrollX: true,
                deferRender: true,
                scrollCollapse: true,
                paging: false,
                scroller: true,
            });
            $("input[type='search']").attr("placeholder", "search by lastname")
        });
      

     
        </script>
        
    </div>
</div>


</html>


<?php
include ('includes/footer.php');
?>