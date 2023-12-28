<?php
session_start();
include('config.php');
include("includes/header.php");
include('includes/topbar.php');
include('includes/sidebar.php');
include './Newsletter_Action/addEmail.php';
$mail = new emils();

if (isset($_POST['addEmail'])) {
    $mm = $mail->saveEmail($_POST, $_SESSION['email']);
    if ($mm) {
?>
<script>
//alert("Email added successfully")
</script>
<?php
    }
}
?>

<div class="content-wrapper">

    <div class="main">
        <div class="container">
            <h2 class="text-center">New E-Mails</h2>
            <div class="container" style="width: 80%;">
                <div class="row mb-5">
                    <div class="col invoice-buttons">
                        <button class="btn btn-danger delete " id="removeRows" type="button"><i
                                class="fa-sharp fa-solid fa-trash"></i> Delete</button>
                        <button class="btn btn-success " id="addRows" type="button"><i
                                class="fa-sharp fa-solid fa-square-plus"></i> Add More</button>

                        <div></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-5">
                        <div class="<?= $mm ? "alert alert-success" : "none1" ?>"> Email added successfully
                        </div>
                        <form method="POST">
                            <table class="table table-bordered table-hover" id="EmailItem">
                                <tr>
                                    <td><input class="itemRow" type="checkbox"></td>
                                    <td><input type="email" name="email[]" id="email_1" required class="form-control"
                                            required autocomplete="off" placeholder="email">
                                    </td>
                                    <td><input type="text" name="name[]" id="name_1" required placeholder="name"
                                            class="form-control" autocomplete="off">
                                    </td>
                                </tr>
                            </table>
                            <button style="float:right" class="btn btn-primary " id="addRows" name="addEmail"
                                data-loading-text="Saving email..." type="submit">save</button>
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <script>
    let count = $(".itemRow").length;
    $(document).ready(function() {
        $(document).on('click', '#checkAll', function() {
            $(".itemRow").prop("checked", this.checked);
        });
        $(document).on('click', '.itemRow', function() {
            if ($('.itemRow:checked').length == $('.itemRow').length) {
                $('#checkAll').prop('checked', true);
            } else {
                $('#checkAll').prop('checked', false);
            }
        });

        $('#addRows').on('click', function() {
            count++;
            let htmlRows = '';
            htmlRows += '<tr>';
            htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
            htmlRows +=
                '<td><input type="email" placeholder="email" required name="email[]" id="email_' +
                count +
                '" class="form-control" autocomplete="off"></td>';
            htmlRows +=
                '<td><input type="text" placeholder="name" required name="name[]" id="name_' +
                count + '" class="form-control" autocomplete="off"></td>';
            htmlRows += '</tr>';
            $('#EmailItem').append(htmlRows);
        });
        $(document).on('click', '#removeRows', function() {
            $(".itemRow:checked").each(function() {
                $(this).closest('tr').remove();
            });
            $('#checkAll').prop('checked', false);
            calculateTotal();
        });
    })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</div>
<?php
include('includes/footer.php');