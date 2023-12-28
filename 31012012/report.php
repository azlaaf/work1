<?php
session_start();



include('admin/config.php');

?>


    <style>
    body {
       background-color: #343c44;
    }
        .container{
  max-width: 800px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

    </style>

<body>
	
    
    <div class="container" style="margin:50px auto;">
        <div class="title">Report a bad payer</div>
        
        <div class="content">
          <form action="" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Bad payer's full name</span>
                <input type="text" placeholder=" Bad payer's full name" name="a" required />
              </div>
              <div class="input-box">
                <span class="details">Last known address on the bad payer</span>
                <input type="text" placeholder=" Last known address on the bad payer"  name="b" />
              </div>
              <div class="input-box">
                <span class="details">Debt date</span>
                <input type="text" placeholder=" Debt date" name="c" required />
              </div>
              <div class="input-box">
                <span class="details">The size of the debt</span>
                <input type="text" placeholder=" The size of the debt" name="d" >
              </div>
              <div class="input-box">
                <span class="details">CIN No</span>
                <input type="text" placeholder=" CIN No" name="e" required >
              </div>
              <div class="input-box">
                <span class="details">The debt concerns</span>
                <input type="text" placeholder=" The debt concerns" name="f"   required>
              </div>
              <div class="input-box">
                <span class="details">The debt is due to</span>
                <input type="text" placeholder=" The debt is due to" name="g" required>
              </div>
              <div class="input-box">
                <span class="details">The debtor has been convicted in court</span>
                <input type="text" placeholder="The debtor has been convicted in court" name="h" >
              </div>

              <div class="input-box">
                <span class="details">Court case number</span>
                <input type="text" placeholder="Court case number"  name="i">
              </div>
              <div class="input-box">
                <span class="details">The court's decision in "City"</span>
                <input type="text" placeholder="The court's decision in City" name="j">
              </div>
            
      </div>
      <div class="button">
              <input type="submit" value="Submit for verification" name="create">
            </div>
          </form>
        </div>
      </div>
         
            
    
</body>

<?php 
  include ('admin/config.php');
$email=$_SESSION['email'];
  if(isset($_POST['create'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c =$_POST['c'];
    $d = $_POST['d'];
      $e = $_POST['e'];
      $f = $_POST['f'];
     
      $g = $_POST['g'];
      $h = $_POST['h'];
      $i =$_POST['i'];
      $j =$_POST['j'];
   
      $sql = "INSERT INTO `badpayer` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g',  '$h', '$i', '$j')";
    if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Created');
    window.location.href='https://www.2wahka.com/31012012/research_pad_payer.php';
    </script>");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
   }
    
    

  
  
  ?>
  
