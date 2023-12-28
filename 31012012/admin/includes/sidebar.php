<?php
include('config.php');


$sql="SELECT * FROM `user` WHERE `email`='".$_SESSION['email']."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row['logo']==null){
    $_SESSION['logo']="person.png";
}else{
    $_SESSION['logo']=$row['logo'];
}
$_SESSION['Entreprise']=$row['Entreprise'];

?>
<html>
    
<link rel="stylesheet" href="astyle.css">

<body onLoad="side()" ;>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="brand-link  logOut" style="display: grid !important;
          grid-template-columns: 60% 40% !important;">
            <a href="../index.html" class="brand-link" style="margin-top:10px;">
                <span class="brand-text font-weight-light">2wahka</span>
            </a>
            <a href="logOut.php">
                <button type="submit" name="logout" class="btn btn-light" style="font-size:14px;float:right;outline:none;">
                <i class="fa-solid fa-right-from-bracket"></i>LogOut</button>
                </a>
            <a href="faq.php" style="margin-top:0px;font-size:20px;">FAQ</a>
    
           
   

        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../upload/<?php echo $_SESSION['logo'] ?>" class="img-circle elevation-2"
                        alt="User Image">
                </div>

                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['Entreprise'] ?></a>
                    <a href="./edit-profil.php">
                        <p style="font-size:15px;">Edit Profile</p>
                    </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <!-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Rechercher"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" style="padding-top: 6px;  height: 35px;"
                            class="list-group-item list-group-item-action active btn nav-link active" id="togg1"
                            data-toggle="list">
                            <i class=""></i>
                            <p>
                                Employee
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav side" id="d1" style="display: none;">

                            <li class="nav-item">
                                <a href="add.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Employes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="list-employee.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Employes</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" style="padding-top: 6px;  height: 35px;"
                                class="list-group-item list-group-item-action active btn nav-link active" id="togg2"
                                data-toggle="list">
                                <i class="fa-regular fa-user-helmet-safety"></i>
                                <p>
                                    Customers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav side" id="d2" style="display: none;">
                                <li class="nav-item">
                                    <a href="add-client.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Customer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-client.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit Customer</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="#" style="padding-top: 6px;  height: 35px;"
                                    class="list-group-item list-group-item-action active btn nav-link active" id="togg3"
                                    data-toggle="list">
                                    <i class=""></i>
                                    <p>
                                        Invoice And Warehouse
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav side" id="d3" style="display: none;">
                                    <li class="nav-item">
                                        <a href="invoice.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Invoice</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="list-invoice.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Invoice Archive</p>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:<?= $_SESSION['type'] != 'gold' ? "none" : "block" ?>">
                                        <a href="gestion-stock.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Warehouse</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">

                                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                <li class="nav-item menu-open">
                                    <a href="#" style="padding-top: 6px;  height: 35px;"
                                        class="list-group-item list-group-item-action active btn nav-link active"
                                        id="togg4" data-toggle="list">
                                        <i class="fa-regular fa-user-helmet-safety"></i>
                                        <p>
                                            Salary Slip
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav side" id="d4" style="display: none;">
                                        <li class="nav-item">
                                            <a href="salary.php" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Salary Silp Manuel</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </li>
                            <!-----****************Enregistrement de l'heure *******************-->
                            <li class="nav-item menu-open">
                                <a href="#" style="padding-top: 6px;  height: 35px;"
                                    class="list-group-item list-group-item-action active btn nav-link active" id="togg5"
                                    data-toggle="list">
                                    <i class="fa-regular fa-user-helmet-safety"></i>
                                    <p>
                                        Time Registration
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav side" id="d5" style="display: none;">
                                    <li class="nav-item">
                                        <a href="statistique.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>statistics</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Daily_check.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daily Check</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="control.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Checkup</p>
                                        </a>
                                    </li>

                                    
                                </ul>
                            </li>
                            <!-----------********Newsletter***********--------------->
                            <li class="nav-item menu-open" style="display:<?= $_SESSION['type'] != 'gold' ? "none" : "block" ?>">
                                <a href="#" style="padding-top: 6px;  height: 35px;"
                                    class="list-group-item list-group-item-action active btn nav-link active" id="togg6"
                                    data-toggle="list">
                                    <i class=""></i>
                                    <p>
                                        Newsletter
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav side" id="d6" style="display: none;">

                                    <li class="nav-item">
                                        <a href="CreateNewsletter.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="insertE-Mails.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Email</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="MailList.php" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Mail List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        </li>

                        <!-----**************** end Enregistrement de l'heure*******************-->
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            </nav>


    </aside>
</body>
<script type="text/javascript">
let togg1 = document.getElementById("togg1");
let togg2 = document.getElementById("togg2");
let d1 = document.getElementById("d1");
let d2 = document.getElementById("d2");
togg1.addEventListener("click", () => {
    if (getComputedStyle(d1).display != "none") {
        d1.style.display = "none";
    } else {
        d1.style.display = "block";
    }
})

function togg() {
    if (getComputedStyle(d2).display != "none") {
        d2.style.display = "none";
    } else {
        d2.style.display = "block";
    }
};
togg2.onclick = togg;
</script>
<script type="text/javascript">
let togg3 = document.getElementById("togg3");
let togg4 = document.getElementById("togg4");
let d3 = document.getElementById("d3");
let d4 = document.getElementById("d4");
togg3.addEventListener("click", () => {
    if (getComputedStyle(d3).display != "none") {
        d3.style.display = "none";
    } else {
        d3.style.display = "block";
    }
})

function togg() {
    if (getComputedStyle(d4).display != "none") {
        d4.style.display = "none";
    } else {
        d4.style.display = "block";
    }
};
togg4.onclick = togg;
</script>
<script type="text/javascript">
let togg5 = document.getElementById("togg5");
let togg6 = document.getElementById("togg6");

let d5 = document.getElementById("d5");
let d6 = document.getElementById("d6");

togg5.addEventListener("click", () => {
    if (getComputedStyle(d5).display != "none") {
        d5.style.display = "none";
    } else {
        d5.style.display = "block";
    }
})

function togg() {
    if (getComputedStyle(d6).display != "none") {
        d6.style.display = "none";
    } else {
        d6.style.display = "block";
    }
};
togg6.onclick = togg;
</script>
<script>
let togg7 = document.getElementById("togg7");
let d7 = document.getElementById("d7");
togg7.addEventListener("click", () => {
    if (getComputedStyle(d7).display != "none") {
        d7.style.display = "none";
    } else {
        d7.style.display = "block";
    }
})

function togg() {
    if (getComputedStyle(d7).display != "none") {
        d7.style.display = "none";
    } else {
        d7.style.display = "block";
    }
};
togg7.onclick = togg();
</script>

</html>