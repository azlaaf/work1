<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config.php');

?>


<style>
.container {
    max-width: 800px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}

form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
}

form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.user-details .input-box input {
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
.user-details .input-box input:valid {
    border-color: #9b59b6;
}

form .gender-details .gender-title {
    font-size: 20px;
    font-weight: 500;
}

form .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
}

form .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

form .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
}

#dot-1:checked~.category label .one,
#dot-2:checked~.category label .two,
#dot-3:checked~.category label .three {
    background: #9b59b6;
    border-color: #d9d9d9;
}

form input[type="radio"] {
    display: none;
}

form .button {
    height: 45px;
    margin: 35px 0
}

form .button input {
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
    background: #6495ED;
}

/*form .button input:hover{
  /* transform: scale(0.99); 
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }*/
@media(max-width: 584px) {
    .container {
        max-width: 100%;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
    }

    form .category {
        width: 100%;
    }

    .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
        width: 5px;
    }
}

@media(max-width: 459px) {
    .container .content .category {
        flex-direction: column;
    }
}
</style>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard Create A Employee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- /.<li class="breadcrumb-item"><a href="https://2wahka.com/31012012/admin/index.php">Home</a></li> -->
                            <!--<li class="breadcrumb-item active">Dashboard create a employee</li>-->
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <div class="container" style="margin:50px auto;">
                    <div class="card-header bg-white text-center p-3">
                        <h3>Create an Employee</h3>
                    </div>
                    <div class="form-check" style="position: relative; left:388px; top:18px;">
                        <input class="form-check-input" type="radio" value="Hourly" name="flexRadioDefault"
                            id="flexRadioDefault1">
                        <label for="flexRadioDefault1" class="form-label fw-bold">Hourly Paid <a style="color:black;"
                                href="#" data-toggle="tooltip" title="If the employee is paid per hour"><i
                                    class="fa fa-question-circle"></i></a></label>
                    </div>
                    <div class="form-check" style="position: relative; left:388px;; top:19px;">
                        <input class="form-check-input" type="radio" value="Monthly" name="flexRadioDefault"
                            id="flexRadioDefault2" checked>
                        <label for="flexRadioDefault2" class="form-label fw-bold">Monthly Salary <a style="color:black;"
                                href="#" data-toggle="tooltip" title="If the employee is paid per Month"><i
                                    class="fa fa-question-circle"></i></a></label>
                    </div>
                    <div class="content">
                        <form action="" method="post">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">
                                        Job Title
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="What does the employee do ! The job function"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="text" placeholder=" Job Title" name="Job" required />
                                </div>
                                <div class="input-box">
                                    <span class="details">Name
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Full name of the employee, incl middle name"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="text" placeholder=" Name" name="Name" />
                                </div>
                                <div class="input-box">
                                    <span class="details">Adresse
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The employee's address according to ID Card"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="text" placeholder=" Adresse" name="Adresse" required />
                                </div>
                                <div class="input-box">
                                    <span class="details">
                                        City
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="City according to the ID Card"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="text" placeholder=" City" name="Ville">
                                </div>
                                <div class="input-box">
                                    <span class="details">ZIP Code
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Zip according to the ID Card"><i
                                                class="fa fa-question-circle"></i></a></span>
                                    <input type="text" placeholder=" Zip Code" name="CP" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Cin
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="CIN number from the employee's ID card [Note: the CIN number can't be changed]"><i
                                                class="fa fa-question-circle"></i></a> </span>
                                    <input type="text" placeholder=" Cin" name="Cin" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Hours
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="How many hours the employee works per month, if the employee if paid monthly enter 1"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder=" Hours" max="???" min="???" name="Periode"
                                        id="myInput" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Employee Number
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Employee number, so the employee got a unique ID number in the accounting department[Note : Employee number can't be changed]"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="Employee Number" name="N_employe">
                                </div>

                                <div class="input-box">
                                    <span class="details">Work Start Date
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The date when the employee started working"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="date" placeholder="Work start date" name="Datede_disposition">
                                </div>
                                <!-- swaping this place with sallary input-->
                                <div class="input-box">
                                    <span class="details">
                                        Salary

                                        <a style="color:black;" href="#" data-toggle="tooltip" title="if you have set the employee to a monthly salary, enter the gross monthly salary,
                     if the employee is paid by the hour, enter the gross hourly salary"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="Salary" name="N_reglement">
                                </div>
                                <div class="input-box">
                                    <span class="details">CNSS Number
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Social Security Number [Note : the number can't be changed]. If your company does not have CNSS, please inset 00000, and desactivate it in edit employee"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="CNSS Number" name="N_cnss">
                                </div>
                                <div class="input-box">
                                    <span class="details">CIMR Number
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="If your company pays insurance to your employee"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="CIMR Number" name="N_cimr">
                                </div>
                                <div class="input-box">
                                    <span class="details">DIM
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Number if there is an extra assurance. If your company does not have an extra inssurance inset 00000, and desactivate it in edit employee "><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="DIM" name="DIM">
                                </div>
                                <div class="input-box">
                                    <span class="details">AMO
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="If your company pays an extra insurance"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="AMO" name="AMO">
                                </div>
                                <!--this is swap with salary-->
                                <div class="input-box">
                                    <span class="details">Bank Account Number
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The bank account number is also what called RIB number.It is always 24 number."><i
                                                class="fa fa-question-circle"></i></a>
                                        <input type="number" placeholder="Bank Account Number" name="N_account">
                                </div>
                                <div class="input-box">
                                    <span class="details">Bank
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Tha name of the bank"><i class="fa fa-question-circle"></i></a>
                                    </span>
                                    <select name="bank" class="rounded-0" style="height: 45px;
                width: 100%;
                outline: none;
                font-size: 16px;
                border-radius: 5px;
                padding-left: 15px;
                border: 1px solid #ccc;
                border-bottom-width: 2px;
                transition: all 0.3s ease;
            ">
                                        <option value="N/A">N/A</option>
                                        <option value="Banque Populaire" selected>Banque Populaire</option>
                                        <option value="Attijariwafa Bank">Attijariwafa Bank</option>
                                        <option value="Bank of Africa">Bank of Africa</option>
                                        <option value="Société générale Maroc">Société générale Maroc</option>
                                        <option value="BMCI">BMCI</option>
                                        <option value="Crédit agricole du Maroc">Crédit agricole du Maroc</option>
                                        <option value="Crédit du Maroc">Crédit du Maroc</option>
                                        <option value="CIH Bank">CIH Bank</option>
                                        <option value="CFG Bank">CFG Bank</option>
                                        <option value="Arab Bank Maroc">Arab Bank Maroc</option>
                                        <option value="Banco Immobiliario & Mercantil de Marruecos">Banco Immobiliario &
                                            Mercantil de Marruecos</option>
                                        <option value="Bank Al Amal">Bank Al Amal</option>
                                        <option value="Bex-Maroc">Bex-Maroc</option>
                                        <option value="Caisse Interprofessionnelle Marocaine de Retraites">Caisse
                                            Interprofessionnelle Marocaine de Retraites</option>
                                        <option value="Caisse Marocaine des Marches">Caisse Marocaine des Marches
                                        </option>
                                        <option value="Caisse Mutualiste Interprofessionelle">Caisse Mutualiste
                                            Interprofessionelle</option>
                                        <option value="Caisserie Commerciale">Caisserie Commerciale</option>
                                        <option value="Citibank Maghreb">Citibank Maghreb</option>
                                        <option value="Limar Bank Casa Union Marocaine de Banques">Limar Bank Casa Union
                                            Marocaine de Banques</option>
                                        <option value="Raw-Mat Bank">Raw-Mat Bank</option>
                                        <option value="Societe de Banque & de Credit">Societe de Banque & de Credit
                                        </option>
                                        <option value="Societe Mithaq Al Maghreb">Societe Mithaq Al Maghreb</option>
                                        <option value="Union Bancaria Hispano Marroqui Uniban">Union Bancaria Hispano
                                            Marroqui Uniban</option>
                                        <option value="Union Marocaine de Banques">Union Marocaine de Banques</option>
                                        <option value="Banque Commerciale du Maroc">Banque Commerciale du Maroc</option>
                                        <option value="Banque Marocaine pour l'Afrique et l'Orient">Banque Marocaine
                                            pour l'Afrique et l'Orient</option>
                                        <option value="Banque Nationale pour le Developpement Economique">Banque
                                            Nationale pour le Developpement Economique</option>
                                        <option value="Societe Marocaine de Depot et Credit">Societe Marocaine de Depot
                                            et Credit</option>
                                        <option value="Wafabank">Wafabank</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <span class="details">Time registration
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Activation of automatic salary calculation"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <select name="bank" class="rounded-0" style="height: 45px;
                width: 100%;
                outline: none;
                font-size: 16px;
                border-radius: 5px;
                padding-left: 15px;
                border: 1px solid #ccc;
                border-bottom-width: 2px;
                transition: all 0.3s ease;
            ">

                                        <option value="Banque Populaire" selected>Active</option>
                                        <option value="Attijariwafa Bank">Inactive</option>

                                    </select>
                                </div>
                                <div class="input-box">
                                    <span class="details">Password
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The password for employee if time registration is activated"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="text" placeholder="Password" name="Password">
                                </div>
                                <div class="input-box">
                                    <span class="details">Email
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The Email to send the password to the employee"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="text" placeholder="Email " name="Email">
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone Number
                                        <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Phone number of the employee"><i
                                                class="fa fa-question-circle"></i></a>
                                    </span>
                                    <input type="number" placeholder="Phone Number " name="Phone_number">
                                </div>

                            </div>
                            <!--<div class="button">
              <input type="submit" value="Create" name="create">
            </div>-->
                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="create">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                $(document).ready(function() {
                    let card_type;
                    if ($("input[type='radio'].form-check-input").is(':checked')) {
                        card_type = $("input[type='radio'].form-check-input:checked").val();
                        if (card_type == "Monthly") {
                            $("#myInput").attr({
                                "max": 1,
                                "min": 1
                            });
                        }
                        if (card_type == "Hourly") {
                            $("#myInput").attr({
                                "max": 44,
                                "min": 1
                            });
                        }

                    }
                    $(".form-check-input").change(function() {

                        if ($("input[type='radio'].form-check-input").is(':checked')) {
                            card_type = $("input[type='radio'].form-check-input:checked").val();
                            if (card_type == "Monthly") {
                                $("#myInput").attr({
                                    "max": 1,
                                    "min": 1
                                });
                            }
                            if (card_type == "Hourly") {
                                $("#myInput").attr({
                                    "max": 44,
                                    "min": 1
                                });
                            }

                        }
                    })
                });
                </script>

</body>

<?php
include('config.php');
$email = $_SESSION['email'];
if (isset($_POST['create'])) {
    $job = $_POST['Job'];
    $Name = $_POST['Name'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CP = $_POST['CP'];
    $Cin = $_POST['Cin'];
    $Periode = $_POST['Periode'];
    $N_e = $_POST['N_employe'];
    $Date = $_POST['Datede_disposition'];
    $N_account = $_POST['N_account'];
    $cnss = $_POST['N_cnss'];
    $cimr = $_POST['N_cimr'];
    $N_reglement = $_POST['N_reglement'];
    $bank = $_POST['bank'];
    $Email = $_POST['Email'];
    $Phone_number = $_POST['Phone_number'];
    $Password = $_POST['Password'];
    
   
    $sql = "insert into employee (Job,Name,Adresse,Ville,Code_Postal,Cin,Numero_employe,Periode,Date_de_disposition,N_account,N_cnss,N_cimr,Numero_de_reglement,main_user,bank,statut,Email,Phone_number,Password) values ('$job','$Name','$Adresse','$Ville','$CP','$Cin','$N_e','$Periode','$Date','$N_account','$cnss','$cimr','$N_reglement','$email','$bank','activer','$Email','$Phone_number','$Password')";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Created');
    window.location.href='https://www.2wahka.com/31012012/admin/list-employee.php';
    </script>");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

   //phpMailer  

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
  require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';
   require 'phpmailer/src/SMTP.php';
   if(isset($_POST['create'])){

      $mail = new PHPMailer(true);
      try{
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Host ='mailout.one.com';
        $mail->SMTPAuth =true;
        $mail->Username ='no-reply@2wahka.com';
        $mail->Password='0677334781';
        $mail->SMTPSecure='tls';
        $mail->Port =25;
  
        $mail->setFrom('no-reply@2wahka.com');
        $mail->addAddress($_POST["Email"]);
        $mail->isHTML(true);
        $mail->Subject = 'Activation';
        $mail->Body ='Your Password :'.$_POST["Password"].' <br>https://2wahka.com/31012012/admin/check_IN_OUT.php?Cin='.$_POST['Cin'].'';
       
        $mail->send();
        echo"
        <script>
        alert('Sent Successfully');
        document.location.href='add.php'
  
  
        </script>
        
        
        ";
  
  
  
      }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
      
   }
   ?> 

<?php
include('includes/footer.php');
?>