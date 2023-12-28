<?php
$conn=mysqli_connect("localhost", "root" , "","2wahka_com2wahka") or die(mysqli_error());


mysqli_select_db($conn,"2wahka_com2wahka")or die(mysqli_error());
$req = "select * from rating";
$r = mysqli_query($conn,$req) or die(mysqli_error()) ;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Rating</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="see_a_rating.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  </head>
  <body style=" background: #333;
    font-family: Arial, Helvetica, sans-serif;
    height: 100%;
    background: url('ressources/BM.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    overflow-x: hidden;">
    <style type="text/css">
    .glow {
   color: yellow;
}
  </style>
<?php
function stars($rating){
    for($i = 0; $i < 5; $i++){
        if($i < $rating){
            echo "<i class='fas fa-star glow'></i>";
        } else {
            echo "<i class='fas fa-star'></i>";
        }
    }
}

 ?>
    <div class="container">
      <h1 align="center" style="color:white;">See all the oppinions</h1>
      <div class="col-lg-3"><button class="btn btn-default btn-lg"><a href="index.php">Back</a></button></div>
      <div align="right">
       <input type="text" id="findField" placeholder="serch" size="20" />
    <button class="btn btn-info" onclick="FindNext ();">Find!</button>
      </div>
      <div class="see" style="background-color: white;">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Company</th>
            <th>Adresse</th>
            <th>City</th>
            <th>Phone number</th>
            <th>description</th>
            <th>Stars</th>
          </tr>
        </thead>
        <tbody>
          <div class="animals">
          <?php
                        while ($data = mysqli_fetch_array($r)) {?>
                            <tr>
                                <td> <?php echo $data["date"];   ?></td>
                                <td  style="color:blue;"> <?php echo $data["company"];   ?> </td>
                                <td class="adr"> <?php  echo $data["addresse"];  ?> </td>
                                <td> <?php echo $data["city"];  ?> </td>
                                <td class="nbr"> <?php echo $data["Phone_number"];  ?> </td>
                                <td> <?php echo $data["text_area"];

                                ?> </td>
                                <td><?php stars($data["stars"]);?></td>

                            </tr>
                        <?php }?>

        </tbody>
      </table></div>
     </div>
    </div>

<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
  <script type="text/javascript">
        function FindNext () {
            var str = document.getElementById ("findField").value;
            if (str == "") {
                alert ("Please enter some text to search!");
                return;
            }

            var supported = false;
            var found = false;
            if (window.find) {        // Firefox, Google Chrome, Safari
                supported = true;
                    // if some content is selected, the start position of the search
                    // will be the end position of the selection
                found = window.find (str);
            }
            else {
                if (document.selection && document.selection.createRange) { // Internet Explorer, Opera before version 10.5
                    var textRange = document.selection.createRange ();
                    if (textRange.findText) {   // Internet Explorer
                        supported = true;
                            // if some content is selected, the start position of the search
                            // will be the position after the start position of the selection
                        if (textRange.text.length > 0) {
                            textRange.collapse (true);
                            textRange.move ("character", 1);
                        }

                        found = textRange.findText (str);
                        if (found) {
                            textRange.select ();
                        }
                    }
                }
            }

            if (supported) {
                if (!found) {
                    alert ("The following text was not found:\n" + str);
                }
            }
            else {
                alert ("Your browser does not support this example!");
            }
        }
    </script>
</html>