<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php
$depart=$_GET['depart'];
$fin=$_GET['fin'];
$name=$_GET['name'];
$num=$_GET['num'];
$dep=$_GET['dep'];

?>

<div class="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
            <div class="card p-3 my-5">
            <div class="card-header">
                <h3>Vacation</h3>
            </div>
            <div class="card-body">
<p> Mr <?php echo $name ?> est employee a departement de <?php echo $dep ?></p>
<p>Numero de compte est :<?php echo $num ?></p>
<p> Il demande un conge de <?php echo $depart ?> a <?php echo $fin ?></p>
<button onclick="window.print()" type="button" class="btn btn-primary ">Print</button>

        </div>
        </div>
    </div>
</div>
</div>