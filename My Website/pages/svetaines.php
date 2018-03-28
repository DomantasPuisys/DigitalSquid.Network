<!DOCTYPE html>
<html lang="en">

<head>

    <title>Svetaines</title>

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
                        $pavadinimas = $_POST['pavadinimas'];
                        $linkas = $_POST['linkas'];
                        $aprasymas = $_POST['aprasymas'];

                        $querys = "INSERT INTO svetaines (pavadinimas, linkas, aprasymas)
                        VALUES ('$pavadinimas', '$linkas', '$aprasymas')";
                        mysqli_query($connect, $querys);
                    }

            if (isset($_POST['edit'])) {
                $id = $_POST['id'];
                $query = "SELECT * FROM svetaines WHERE id = '$id'";
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
                                            <label>Naujas linkas</label>
                                            <input type="text" name="linkas" class="form-control" value="',$rows["linkas"],'">
                                        </div>
                                        <div class="form-group">
                                            <label>Naujas aprasymas</label>
                                            <input type="text" name="aprasymas" class="form-control" value="',$rows["aprasymas"],'">
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
                $linkas = $_POST['linkas'];
                $aprasymas = $_POST['aprasymas'];
                $id = $_POST['id'];

                $query = "UPDATE svetaines SET pavadinimas = '$pavadinimas', linkas = '$linkas', aprasymas = '$aprasymas' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

            if (isset($_POST['remove'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM svetaines WHERE id = '$id'";
                mysqli_query($connect,$query);
            }
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                           <h1 style="display: inline;">Svetainės</h1>
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#naujaSvetaine">Pridėti svetainę</button> 
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="naujaSvetaine" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pridėti svetainę</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Pavadinimas</label>
                                        <input type="text" name="pavadinimas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Linkas</label>
                                        <input type="text" name="linkas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Aprašymas</label>
                                        <input type="text" name="aprasymas" class="form-control">
                                    </div>
                                    <button class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Talpinti</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Svetainės
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-3">Linkas</th>
                                                <th class="col-md-8">Aprašymas</th>
                                                <th class="col-md-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "SELECT * FROM svetaines";
                                                $result = mysqli_query($connect,$query);
                                                while ($rows = mysqli_fetch_assoc($result)) { 
                                                    echo '
                                                        <tr>
                                                            <td class="col-md-3"><a href="',$rows["linkas"],'">',$rows["pavadinimas"],'</a></td>
                                                            <td class="col-md-8">',$rows["aprasymas"],'</td>
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
