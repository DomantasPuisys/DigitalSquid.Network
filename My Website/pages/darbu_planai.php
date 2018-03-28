<!DOCTYPE html>
<html lang="en">

<head>

    <title>Darbu planai</title>

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

            if (isset($_POST['submit'])){
            $pavadinimas = $_POST['pavadinimas'];
            $uzrasas = $_POST['uzrasas'];
            $statusas = $_POST['statusas'];
            
            $query = "INSERT into `darbu_planai` (pavadinimas, uzrasas, statusas)
            VALUES ('$pavadinimas', '$uzrasas', '$statusas')";
            mysqli_query($connect,$query);
            }

            if (isset($_POST['success'])) {
                $id = $_POST['id'];
                $query = "UPDATE darbu_planai SET statusas='finish' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['progress'])) {
                $id = $_POST['id'];
                $query = "UPDATE darbu_planai SET statusas='progress' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['remove'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM darbu_planai WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['keisti'])) {
                $pavadinimas = $_POST['pavadinimas'];
                $uzrasas = $_POST['uzrasas'];
                $id = $_POST['id'];

                $query = "UPDATE darbu_planai SET pavadinimas = '$pavadinimas', uzrasas = '$uzrasas' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['edit'])) {
                $id = $_POST['id'];
                $query = "SELECT * FROM darbu_planai WHERE id = '$id'";
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
                                    <h4 class="modal-title">Plano Keitimas</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Naujas pavadinimas</label>
                                            <input type="text" name="pavadinimas" class="form-control" value="',$rows["pavadinimas"],'">
                                        </div>
                                        <div class="form-group">
                                            <label>Naujas užrašas</label>
                                            <textarea class="form-control" rows="3" name="uzrasas">',$rows["uzrasas"],'</textarea>
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
                        <div class="page-header">
                            <h1 style="display: inline;">Darbu Planai</h1>
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#naujasPlanas">Naujas Planas</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;">Naujas Planas <kbd>V2</kbd></button>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- Plano keitimo modal -->
                
                <!-- Plano keitimo modal pabaiga -->
                <!-- Plano modal -->
                <div id="naujasPlanas" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Naujas Planas</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Pavadinimas</label>
                                        <input type="text" name="pavadinimas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Plano statusas</label>
                                        <select class="form-control" name="statusas">
                                            <option value="default">Nepradėtas</option>
                                            <option value="progress">Pradėtas</option>
                                            <option value="finish">Užbaigtas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Užrašas</label>
                                        <textarea class="form-control" rows="3" name="uzrasas"></textarea>
                                    </div>
                                    <button class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Talpinti</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Plano modal pabaiga -->
                <div class="row">
                    <?php
                        $query = "SELECT * FROM `darbu_planai`";
                        $result = mysqli_query($connect,$query) or die(mysql_error());
                        while ($rows = mysqli_fetch_assoc($result)) { 
                            if ($rows["statusas"] == "progress") {
                                $statusas = "panel-yellow";
                            }elseif ($rows["statusas"] == "finish") {
                                $statusas = "panel-green";
                            }else{
                                $statusas = "panel-default";
                            }
                            echo '
                            <div class="col-lg-4">
                                <div class="panel ',$statusas,'">
                                    <div class="panel-heading">
                                        ',$rows["pavadinimas"],'
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            ',$rows["uzrasas"],'
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <form method="post">
                                        <input type="hidden" value="',$rows["id"],'" name="id"></input>
                                        <button class="btn btn-success btn-circle" type="submit" name="success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-warning btn-circle" type="submit" name="progress">
                                            <i class="fa fa-play"></i>
                                        </button>
                                        <button class="btn btn-primary btn-circle" type="submit" name="edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-circle" type="submit" name="remove">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>        
                            ';
                        }
                    ?>
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
