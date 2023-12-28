<?php
session_start();
$email=$_SESSION['email'];
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<style>
.circle {
   display: flex;
    justify-content: center;
    align-items: center;
    width: 200px;
    height: 200px;
    /* line-height: 200px; */
    border-radius: 50%;
    /* text-align: center; */
    /* text-decoration: none; */
    box-shadow: 0 0 3px grey;
    font-size: 20px;
    font-weight: bold;
    /* margin-left: 30px; */
    font-style: italic;
    position: relative;
    /* display: inline-block; */
    border-bottom: 1px dotted black;
    transition: 0.3s;
    
}
.circle:hover {
    color:black;
    background-color: #FFFAFA;
    border: 2px solid #00008B;
}

.btn0{
 color:#f5f5f5;
 background: red;
}
.btn1{
 color:#f5f5f5;
  background: blue;
}
.btn2{
 color:#f5f5f5;
  background: green;
}
.btn3{
 color:#f5f5f5;
  background: #ffc153;
}
.btn4{
 color:#f5f5f5;
  background: #007486;
}

.circle .tooltiptext {
  /*visibility: hidden; */
    opacity: 0;
    width: 300px;
     /*height: 100px; */
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 0px;
    position: absolute;
    z-index: 1039;
    /* bottom: 0%; */
    top: 80%;
    left: 50%;
    transform: translateX(-50%);
    /* margin-left: -150px; */
    transition: 0.5s;

}


@media (max-width: 992px) {
    .circle .tooltiptext {
        max-width: 120%;
    }
}

.circle .tooltiptext > * {
    font-size: 0px;
    transition: 0.3s;
    margin-bottom: 5px;
}
/*.circle .tooltiptext1 {*/
/*  visibility: hidden;*/
/*  width: 300px;*/
/*  height: 150px ;*/
/*  background-color: black;*/
/*  color: #fff;*/
/*  text-align:center ;*/
/*  border-radius: 6px;*/
/*  padding: 5px 0;*/
  
  /* Position the tooltip */
/*  position: absolute;*/
/*  z-index: 1;*/
/*  top: 100%;*/
/*  left: 50%;*/
/*  margin-left: -150px;*/
/*}*/
/*  .circle .tooltiptext2 {*/
/*  visibility: hidden;*/
/*  width: 290px;*/
/*  height: 150px ;*/
/*  background-color: black;*/
/*  color: #fff;*/
/*  text-align:center ;*/
/*  border-radius: 6px;*/
/*  padding: 5px 0;*/
  
  /* Position the tooltip */
/*  position: absolute;*/
/*  z-index: 1;*/
/*  top: 100%;*/
/*  left: 50%;*/
/*  margin-left: -150px;*/
  
/*}*/
/*.circle .tooltiptext3 {*/
/*  visibility: hidden;*/
/*  width: 900px;*/
/*  height: 70px ;*/
/*  background-color: black;*/
/*  color: #fff;*/
/*  text-align:center ;*/
/*  border-radius: 6px;*/
/*  padding: 5px 0;*/
  
  /* Position the tooltip */
/*  position: absolute;*/
/*  z-index: 1;*/
/*  top: 100%;*/
/*  left: 50%;*/
/*  margin-left: -450px;*/
  
/*}*/
/*.circle .tooltiptext4 {*/
/*  visibility: hidden;*/
/*  width: 800px;*/
/*  height: 70px ;*/
/*  background-color: black;*/
/*  color: #fff;*/
/*  text-align:center ;*/
/*  border-radius: 6px;*/
/*  padding: 5px 0;*/
  
  /* Position the tooltip */
/*  position: absolute;*/
/*  z-index: 1;*/
/*  top: 100%;*/
/*  left: 50%;*/
/*  margin-left: -400px;*/
  
/*}*/
.circle .tooltiptext::after {
  content: " ";
  position: absolute;
  bottom: 100%;  /* At the top of the tooltip */
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent black transparent;

}

/*.circle:hover .tooltiptext1 {*/
/*  visibility: visible;*/
 
/*}*/
/*.circle .tooltiptext1::after {*/
/*  content: " ";*/
/*  position: absolute;*/
 /*bottom: 100%;  --- At the top of the tooltip */
/*  left: 50%;*/
/*  margin-left: -5px;*/
/*  border-width: 5px;*/
/*  border-style: solid;*/
/*  border-color: transparent transparent black transparent;*/

/*}*/
/*.circle:hover .tooltiptext2 {*/
/*  visibility: visible;*/
 
/*}*/
/*.circle .tooltiptext2::after {*/
/*  content: " ";*/
/*  position: absolute;*/
  /*bottom: 100%;   At the top of the tooltip */
/*  left: 50%;*/
/*  margin-left: -5px;*/
/*  border-width: 5px;*/
/*  border-style: solid;*/
/*  border-color: transparent transparent black transparent;*/

/*}*/
/*.circle:hover .tooltiptext3 {*/
/*  visibility: visible;*/
 
/*}*/
/*.circle .tooltiptext3::after {*/
/*  content: " ";*/
/*  position: absolute;*/
/*  bottom: 100%;   At the top of the tooltip */
/*  left: 50%;*/
/*  margin-left: -5px;*/
/*  border-width: 5px;*/
/*  border-style: solid;*/
/*  border-color: transparent transparent black transparent;*/

/*}*/
/*.circle:hover .tooltiptext4 {*/
/*  visibility: visible;*/
 
/*}*/
/*.circle .tooltiptext4::after {*/
/*  content: " ";*/
/*  position: absolute;*/
 /*  bottom: 100%;  At the top of the tooltip */
/*  left: 50%;*/
/*  margin-left: -5px;*/
/*  border-width: 5px;*/
/*  border-style: solid;*/
/*  border-color: transparent transparent black transparent;*/

/*}*/

.circle:hover .tooltiptext {
  /*visibility: visible;*/
  padding: 5px;
  top: calc(100% + 7px);
  opacity: 1;
}

.circle:hover .tooltiptext > * {
    font-size: 16px;
}

.circle:hover .tooltiptext2 {
  /*visibility: visible;*/
  padding: 5px;
  top: calc(50% + 7px);
  opacity: 1;
}
 /*.para{*/
/*  position: relative;*/
/*  top: -80px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
 
/*}*/
/*.para2{*/
/*  position: relative;*/
/*  top: -70px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
/*}*/
/*.para3{*/
/*  position: relative;*/
/*  top: -70px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
/*}*/
/*.poro{*/
/*  position: relative;*/
/*  top: -240px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
/*}*/
/*.poro1{*/
/*  position: relative;*/
/*  top: -410px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
/*}*/
/*.poro2{*/
/*  position: relative;*/
/*  top: -580px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
/*  text-align:center ;*/
/*}*/
/*.prem{*/
/*  position: relative;*/
/*  top: -250px;*/
/*  margin: 0px;*/
/*  font-size: 16px;*/
/*  text-align:center ;*/

/*}*/
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 d-none">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
         
            <div>
                <div>
                    <div>
                        <div class="row flex-wrap justify-content-center align-items-center gap-2 gap-md-5">
                            
                        <a href="#" type="text" class="circle btn0 " style="text-align:center;"> 
                            <div class="md-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </div>
                        <span class="tooltiptext" >
                          <p class="para">In employee create, you change information on employees.<p class="prem">In the free version, you can have a maximum of 3 employees</p></p>
                        </span>
                      &nbsp Employee </a>
                        <a href="#" class="circle btn1"  style="text-align:center;">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="40" height="40" fill="currentColor">
                                    <path d="M144 160c-44.2 0-80-35.8-80-80S99.8 0 144 0s80 35.8 80 80s-35.8 80-80 80zm368 0c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM416 224c0 53-43 96-96 96s-96-43-96-96s43-96 96-96s96 43 96 96zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                            </div>
                        <span class="tooltiptext1 tooltiptext" >
                          <p class="para2">Creation of customers and changes to customer information. 
                          <p class="poro">Sales statistics are available here.</p>
                          <p class="poro1">Additional purchase of the storage system or silver/gold version is required</p>
                          <!--<p class="poro2"> standard tout le temps.</p>--></p>
                          </span>
                          &nbsp Customers</a>
                        <a href="#" class="circle btn2"> 
                        <div>
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"  width="40" height="40" fill="currentColor">
                                   <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164.1 160v6.3c6.6 1.2 16.6 3.2 21 4.4c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-3.8-1-17.4-3.7-21.7-4.3c-12.2-1.9-22.2-.3-28.6 2.6c-6.3 2.9-7.9 6.2-8.2 8.1c-.6 3.4 0 4.7 .1 5c.3 .5 1 1.8 3.6 3.5c6.1 4.2 15.7 7.2 29.9 11.4l.8 .2c12.1 3.7 28.3 8.5 40.4 17.4c6.7 4.9 13 11.4 16.9 20.5c4 9.1 4.8 19.1 3 29.4c-3.3 19-15.9 32-31.6 38.7c-4.9 2.1-10 3.6-15.4 4.6V352c0 11.1-9 20.1-20.1 20.1s-20.1-9-20.1-20.1v-6.4c-9.5-2.2-21.9-6.4-29.8-9.1c-1.7-.6-3.2-1.1-4.4-1.5c-10.5-3.5-16.1-14.8-12.7-25.3s14.8-16.1 25.3-12.7c2 .7 4.1 1.4 6.4 2.1l0 0 0 0c9.5 3.2 20.2 6.9 26.2 7.9c12.8 2 22.7 .7 28.8-1.9c5.5-2.3 7.4-5.3 8-8.8c.7-4 .1-5.9-.2-6.7c-.4-.9-1.3-2.2-3.7-4c-5.9-4.3-15.3-7.5-29.3-11.7l-2.2-.7c-11.7-3.5-27-8.1-38.6-16c-6.6-4.5-13.2-10.7-17.3-19.5c-4.2-9-5.2-18.8-3.4-29c3.2-18.3 16.2-30.9 31.1-37.7c5-2.3 10.3-4 15.9-5.1v-6c0-11.1 9-20.1 20.1-20.1s20.1 9 20.1 20.1z"/></svg>
                            </div>
                        <span class="tooltiptext2 tooltiptext" >
                          <p class="para3">Free version you have to fill in all the information yourself. Hours, rate, etc.<p class="poro">In the silver and gold versions, everything is automatic.<p class="poro1">In all versions, the pay slips are saved for up to 5 years.This assumes you have a subscription</p> </p> </p>
                          </span>
                         &nbsp Salary Slip</a>
                    </div>
                    <div class="row flex-wrap justify-content-center align-items-center mt-2 gap-2 gap-md-5">
                        <a href="#" class="circle btn3" style="text-align:center;">
                            <div class="md-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 384 512">
                                    <path d="M288 256H96v64h192v-64zm89-151L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm256 304c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-200v96c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-96c0-8.84 7.16-16 16-16h224c8.84 0 16 7.16 16 16z"/>
                                    </svg>
                            </div> 
                        <span class="tooltiptext2 tooltiptext" >
                          <p class="para3">
                              Invoicing/storage system you create your invoices.
                              <p class="poro"> With the free version, you must manually create an invoice. 
                              <p class="poro1">In silver/gold, you will be able to manage your stock.</p> </p> </p>
                              </span>
                           Invoice & Warehouse</a>
                      <a href="#" class="circle btn4"  style="text-align:center;"> 
                      <div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 640 512">
                              <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 352h8.2c32.3-39.1 81.1-64 135.8-64c5.4 0 10.7 .2 16 .7V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM320 352H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H360.2C335.1 449.6 320 410.5 320 368c0-5.4 .2-10.7 .7-16l-.7 0zm320 16c0-79.5-64.5-144-144-144s-144 64.5-144 144s64.5 144 144 144s144-64.5 144-144zM496 288c8.8 0 16 7.2 16 16v48h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V304c0-8.8 7.2-16 16-16z"/></svg>
                      </div>
                      <span class="tooltiptext2 tooltiptext" >
                      <p class="para3">
                          Time recording is a silver/gold 
                          <p class="poro">product where the employees' hours are automatically
                          <p class="poro1"> converted into the payroll system</p> </p> </p>
                          </span>
                        &nbsp Time Registration</a>
                </div>
            </div>
              

 

        </div>
    </div>
</div>
 <?php
include ('includes/footer.php');
?>