<?php
    include 'cat_action.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View | Category</title>

</head>

 <!--active inactive script-->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.status_checks', function() {
            var status = ($(this).hasClass("btn-primary")) ? '0' : '1';
            var msg = (status == '0') ? 'Deactivate' : 'Activate';
            if (confirm("Are you sure to " + msg)) {
                var current_element = $(this);
                url = "cat_action.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: $(current_element).attr('data'),
                        status: status
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
    </script>
    <?php include 'header.php'; ?>

                <div class="container-fluid">
                    <div class="col-md-12 mt-5">

                     <?php    if(isset($_SESSION['response'])){     ?>
                        <div class="alert text-center alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= $_SESSION['response']; ?>
                        </div>
                        <?php } unset($_SESSION['response']);  ?>
                    </div>

                    <?php 
                    include 'config.php';
                    if (isset($_GET['details'])) {
                    $id = $_GET['details'];
                    $query="SELECT * FROM category where parent_id='".$id."'";
                    $result = mysqli_query($conn, $query);
                    }else{
                    $query="SELECT * FROM category where parent_id=0";
                    $result = mysqli_query($conn, $query);
                    }
                    ?>
                    <div class="d-flex mb-2">
                    <?php if (isset($_GET['details'])) { ?>
                    <h3 class="text-center text-info">Subcategory Details</h3>
                    <?php }else{ ?>
                    <h3 class="text-center text-info">Category Details</h3>
                    <button class="btn-primary ml-auto"><a class="text-decoration-none text-white" href="add.php">Add Category</a></button>
                    <?php }?>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <?php if (isset($_GET['details'])) { ?>
                                <th>Id</th>
                                <th>Parent Id</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <?php }else{ ?>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Subcategory</th>
                            <?php } ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <?php if (isset($_GET['details'])) { ?>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['parent_id'] ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['description'] ?></td>
                                
                                <!--<a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |-->
                                <td><i data="<?= $row['id'];?>" class="status_checks btn btn-sm <?= ($row['status'])? 'btn-primary' : 'btn-danger'?>"><?= ($row['status'])? 'Active' : 'Inactive'?></i></td>
                                <td><a href="add.php?edit=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                </td>

                                <?php }else{ ?>

                                <td><?= $row['id'] ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['description'] ?></td>
                                
                                <!--<a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |-->
                                <td><i data="<?= $row['id'];?>" class="status_checks btn btn-sm <?= ($row['status'])? 'btn-primary' : 'btn-danger'?>"><?= ($row['status'])? 'Active' : 'Inactive'?></i></td>
                                <td><a href="add.php?edit=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td><div class ="d-inline-flex"><a href="subcategory.php?add=<?= $row['id']; ?>" class="btn btn-info btn-sm mr-2">Add</a>
                                    <a href="view.php?details=<?= $row['id']; ?>"
                                    class="btn btn-sm btn-secondary" >View</a></div>
                                </td>
                                 <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
<?php include 'footer.php'; ?>