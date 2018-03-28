<!DOCTYPE html>
<html lang="en">

<head>

    <title>Islaidos</title>

    <?php
        include 'header-detail.php';
        include 'mysql.php';
    ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include 'navbar.php';

            if (isset($_POST['submit'])) {
                $suma = $_POST['suma'];
                $prekes = $_POST['prekes'];
                $data = date("Y-m-d");

                $query = "INSERT INTO islaidos (suma, prekes, data) VALUES ('$suma','$prekes','$data')";
                mysqli_query($connect,$query);

            }

            if (isset($_POST['remove'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM islaidos WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['keisti'])) {
                $suma = $_POST['suma'];
                $prekes = $_POST['prekes'];
                $id = $_POST['id'];

                $query = "UPDATE islaidos SET suma = '$suma', prekes = '$prekes' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['edit'])) {
                $id = $_POST['id'];
                $query = "SELECT * FROM islaidos WHERE id = '$id'";
                $result = mysqli_query($connect,$query) or die(mysql_error());
                $rows = mysqli_fetch_array($result);
                echo '
                    <script>
                        $(window).on("load",function(){
                        $("#keistiPlana").modal("show");
                        });
                    </script>
                    <div id="keistiPlana" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Islaidos Redagavimas</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Redaguoti Suma</label>
                                            <input type="number" name="suma" class="form-control" value="',$rows["suma"],'">
                                        </div>
                                        <div class="form-group">
                                            <label>Redaguoti Prekes</label>
                                            <textarea class="form-control" rows="3" name="prekes">',$rows["prekes"],'</textarea>
                                        </div>
                                        <input type="hidden" value="',$rows["id"],'" name="id"></input>
                                        <button class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                        <button type="submit" name="keisti" class="btn btn-primary">Talpinti</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Islaidos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div id="Islaidos" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Prideti isleidima</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Suma</label>
                                        <input type="number" name="suma" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Prekes</label>
                                        <textarea class="form-control" rows="3" name="prekes"></textarea>
                                    </div>
                                    <button class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Talpinti</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;"><b>Siandienos Islaidos</b></h5>
                                <button class="btn btn-primary btn-circle pull-right" data-toggle="modal" data-target="#Islaidos"><i class="fa fa-plus fa-fw"></i></button>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">Suma</th>
                                                <th class="col-md-4">Prekes</th>
                                                <th class="col-md-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $data = date("Y-m-d");
                                                $query = "SELECT * FROM islaidos WHERE data = '$data'";
                                                $result = mysqli_query($connect,$query);
                                                while ($rows = mysqli_fetch_assoc($result)) { 
                                                    echo '
                                                        <tr>
                                                            <td class="col-md-1">',$rows["suma"],'</a></td>
                                                            <td class="col-md-4">',$rows["prekes"],'</td>
                                                            <td class="col-md-1">
                                                                <form method="post">
                                                                <input type="hidden" value="',$rows["id"],'" name="id"></input>
                                                                <button class="btn btn-primary btn-circle" type="submit" name="edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-circle" type="submit" name="remove">
                                                                    <i class="fa fa-close"></i>
                                                                </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;"><b>Vakar Dienos Islaidos</b></h5>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">Suma</th>
                                                <th class="col-md-4">Prekes</th>
                                                <th class="col-md-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $time = strtotime("-1 day", time());
                                                $data = date("Y-m-d", $time);
                                                $query = "SELECT * FROM islaidos WHERE data = '$data'";
                                                $result = mysqli_query($connect,$query);
                                                while ($rows = mysqli_fetch_assoc($result)) {
                                                    echo '
                                                        <tr>
                                                            <td class="col-md-1">',$rows["suma"],'</a></td>
                                                            <td class="col-md-4">',$rows["prekes"],'</td>
                                                            <td class="col-md-1">
                                                                <form method="post">
                                                                <input type="hidden" value="',$rows["id"],'" name="id"></input>
                                                                <button class="btn btn-primary btn-circle" type="submit" name="edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-circle" type="submit" name="remove">
                                                                    <i class="fa fa-close"></i>
                                                                </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
