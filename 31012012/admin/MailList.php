<?php
session_start();
include('config.php');
include("includes/header.php");
include('includes/topbar.php');
include('includes/sidebar.php');
include('config.php');
$email = $_SESSION['email'];
$query = "SELECT * FROM newsletter where company_email='$email'";
$result = $conn->query($query);
?>

<div class="content-wrapper">

    <div class="main">
        <div class="container">
            <h2 class="text-center">List E-mails</h2>
            <div class="container" style="width: 80%;">
                <hr>
                <div class="stock-buttons ">
                    <div class="stock-buttons-left">
                        <!-- 
                        <a href="#" id="edit-item"><button type="button" class="btn btn-info mx-2"><i
                                    class="fa-sharp fa-solid fa-pen-to-square">
                                </i> Edit Item</button></a> -->
                        <a href="#" id="delet-email"><button type="button" class="btn btn-danger mx-2"><i
                                    class="fa-sharp fa-solid fa-trash"></i> Delete
                                Item</button></a>
                    </div>
                    <input class="search-input2" type="search" placeholder="Search" aria-label="Search"
                        id="live-search">
                    <div class="stock-buttons-right">

                    </div>
                </div>
                <div class="container mt-2">
                    <table class="table table-bordered overflow-hidden">
                        <thead class="overflow-hidden">
                            <tr class="row text-center">
                                <th width="2%" class="col"><input id="S_checkAll" class="formcontrol" type="checkbox">
                                </th>
                                <th width="49%" class="col">Email</th>
                                <th width="49%" class="col">Name</th>
                            </tr>
                        </thead>
                        <table class="table overflow-hidden">
                            <tbody class="items_Search">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr class="row text-center">
                                    <th width="2%" class="col"><input class="formcontrol Gcheck" type="checkbox"
                                            name="s_check" value="<?= $row['Id'] ?>">
                                    </th>

                                    <td width="49%" class="col">
                                        <?= $row['email'] ?>
                                    </td>
                                    <td width="49%" class="col">
                                        <?= $row['name'] ?>
                                    </td>

                                    </td>
                                    <div class="<?= !$result ? "alert alert-secondary" : "none1" ?>">No matching records
                                        found
                                    </div>
                                </tr>
                                <?php
                                } ?>

                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script>
// delet items
$("#delet-email").click(function() {
    const element = $("input[name='s_check']:checked");
    const res = window.location.href.charAt(window.location.href.length - 1);
    console.log(res)
    let courentUrl
    if (res === "#") {
        courentUrl = window.location.href.slice(0, -13)
    } else {
        courentUrl = window.location.href.slice(0, -12)
    }
    for (let i = 0; i < element.length; i++) {
        window.location.replace(courentUrl + `Newsletter_Action/delet_email.php?id=${element[i].value}`)
    }

})
//Search filed 
$(document).ready(function() {
    const resultDropdown = $(".items_Search");
    const vv = resultDropdown.html()
    $('.search-input2').on("keyup input", function() {
        /* Get input value on change */
        const inputVal = $(this).val();

        // var resultDropdown = $(this).siblings(".items_searsh");
        if (inputVal.length > 0) {
            $.get("Newsletter_Action/email-search.php", {
                term: inputVal
            }).done(function(data) {
                // Display the returned data in browser
                resultDropdown.html(data);

            });
        } else {
            //resultDropdown.empty();
            resultDropdown.html(vv);
        }

    });

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</div>
<?php
include('includes/footer.php');