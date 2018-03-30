<!DOCTYPE html>
<html lang="en">

<head>

    <title>Užrašai</title>

    <?php
        include 'header-detail.php';
        include 'mysql.php';

        if (isset($_POST['submit'])){
            $pavadinimas = $_POST['pavadinimas'];
            $uzrasas = $_POST['uzrasas'];
            $blog_date = date("Y-m-d");
            
            $query = "INSERT into `uzrasai` (Pavadinimas, Uzrasas, Data)
            VALUES ('$pavadinimas', '$uzrasas', '$blog_date')";
            mysqli_query($connect,$query);
        }

        if (isset($_POST['edit'])) {
                $id = $_POST['id'];
                $query = "SELECT * FROM uzrasai WHERE id = '$id'";
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
                                            <input type="text" name="pavadinimas" class="form-control" value="',$rows["Pavadinimas"],'">
                                        </div>
                                        <div class="form-group">
                                            <label>Naujas užrašas</label>
                                            <textarea class="form-control" rows="3" name="uzrasas">',$rows["Uzrasas"],'</textarea>
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
        if (isset($_POST['keisti'])) {
                $pavadinimas = $_POST['pavadinimas'];
                $uzrasas = $_POST['uzrasas'];
                $id = $_POST['id'];

                $query = "UPDATE uzrasai SET Pavadinimas = '$pavadinimas', Uzrasas = '$uzrasas' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }
        if (isset($_POST['remove'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM uzrasai WHERE id = '$id'";
                mysqli_query($connect,$query);
            }
    ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include 'navbar.php';
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 style="display: inline;">Užrašai</h1>
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#naujasUzrasas">Naujas Užrašas</button>
                        </div>
                    </div>
                </div>
                <div id="naujasUzrasas" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Naujas Užrašas</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Pavadinimas</label>
                                        <input type="text" name="pavadinimas" class="form-control">
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
                <div class="row">
                    <?php
                        $query = "SELECT * FROM `uzrasai`";
                        $result = mysqli_query($connect,$query) or die(mysql_error());
                        //',$rows["pavadinimas"],'
                         while ($rows = mysqli_fetch_assoc($result)) { 
                            echo '
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        ',$rows["Pavadinimas"],'
                                        <p class="pull-right">
                                        ',$rows["Data"],'
                                        </p>
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            ',$rows["Uzrasas"],'
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <form method="post">
                                        <input type="hidden" value="',$rows["id"],'" name="id"></input>
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
