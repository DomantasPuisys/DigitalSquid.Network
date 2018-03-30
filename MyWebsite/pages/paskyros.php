<!DOCTYPE html>
<html lang="en">

<head>

    <title>Paskyros</title>

    <?php
        include 'header-detail.php';
        include 'mysql.php';
        
        if (isset($_POST['submitPas'])) {
        $kategorija = $_POST['kategorija'];
        $slapyvardis = $_POST['slapyvardis'];
        $slaptazodis = $_POST['slaptazodis'];

        $query = "INSERT INTO paskyros (slapyvardis, slaptazodis, kategorija)
        VALUES ('$slapyvardis', '$slaptazodis', '$kategorija')";
        mysqli_query($connect,$query);
        }

        if (isset($_POST['remove'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM paskyros WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

        if (isset($_POST['keisti'])) {
                $slapyvardis = $_POST['slapyvardis'];
                $slaptazodis = $_POST['slaptazodis'];
                $id = $_POST['id'];

                $query = "UPDATE paskyros SET slapyvardis = '$slapyvardis', slaptazodis = '$slaptazodis' WHERE id = '$id'";
                mysqli_query($connect,$query);
            }

        if (isset($_POST['edit'])) {
            $id = $_POST['id'];
                $query = "SELECT * FROM paskyros WHERE id = '$id'";
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
                                    <h4 class="modal-title">Paskyros Redagavimas</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Redaguoti slapyvardi</label>
                                            <input type="text" name="slapyvardis" class="form-control" value="',$rows["slapyvardis"],'">
                                        </div>
                                        <div class="form-group">
                                            <label>Redaguoti slaptazodi</label>
                                            <input type="text" name="slaptazodis" class="form-control" value="',$rows["slaptazodis"],'">
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
                        <h1 class="page-header">Paskyros</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div id="naujasEle" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Patalpinti paskyrą</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Paskyros kategorija</label>
                                            <select class="form-control" name="kategorija">
                                              <option value="gm">Gmail</option>
                                              <option value="ma">Mail</option>
                                              <option value="re">Rediffmail</option>
                                            </select>
                                        </div>
                                    <div class="form-group">
                                        <label>Slapyvardis</label>
                                        <input type="text" name="slapyvardis" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slaptažodis</label>
                                        <input type="text" name="slaptazodis" class="form-control">
                                    </div>
                                    <button class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                    <button type="submit" name="submitPas" class="btn btn-primary">Talpinti</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;"><b>Elektroniniai paštai</b></h5>
                                <button class="btn btn-primary btn-circle pull-right" data-toggle="modal" data-target="#naujasEle"><i class="fa fa-pencil fa-fw"></i></button>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#gmail" data-toggle="tab">Gmail</a>
                                    </li>
                                    <li><a href="#mail" data-toggle="tab">Mail</a>
                                    </li>
                                    <li><a href="#rediffmail" data-toggle="tab">Rediffmail</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="gmail">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">Slapyvardis</th>
                                                        <th class="col-md-2">Slaptažodis</th>
                                                        <th class="col-md-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = "SELECT * FROM paskyros WHERE kategorija ='gm'";
                                                        $result = mysqli_query($connect,$query);
                                                        $count = mysqli_num_rows($result);
                                                        while($row =  mysqli_fetch_assoc($result)){
                                                            echo '
                                                                <tr>
                                                                    <td class="col-md-2">',$row['slapyvardis'],'</td>
                                                                    <td class="col-md-2">',$row['slaptazodis'],'</td>
                                                                    <td class="col-md-2">
                                                                        <form method="post">
                                                                        <input type="hidden" value="',$row["id"],'" name="id"></input>
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
                                    <div class="tab-pane fade" id="mail">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">Slapyvardis</th>
                                                        <th class="col-md-2">Slaptažodis</th>
                                                        <th class="col-md-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = "SELECT * FROM paskyros WHERE kategorija ='ma'";
                                                        $result = mysqli_query($connect,$query);
                                                        $count = mysqli_num_rows($result);
                                                        while($row =  mysqli_fetch_assoc($result)){
                                                            echo '
                                                                <tr>
                                                                    <td class="col-md-2">',$row['slapyvardis'],'</td>
                                                                    <td class="col-md-2">',$row['slaptazodis'],'</td>
                                                                    <td class="col-md-2">
                                                                        <form method="post">
                                                                        <input type="hidden" value="',$row["id"],'" name="id"></input>
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
                                    <div class="tab-pane fade" id="rediffmail">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">Slapyvardis</th>
                                                        <th class="col-md-2">Slaptažodis</th>
                                                        <th class="col-md-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = "SELECT * FROM paskyros WHERE kategorija ='re'";
                                                        $result = mysqli_query($connect,$query);
                                                        $count = mysqli_num_rows($result);
                                                        while($row =  mysqli_fetch_assoc($result)){
                                                            echo '
                                                                <tr>
                                                                    <td class="col-md-2">',$row['slapyvardis'],'</td>
                                                                    <td class="col-md-2">',$row['slaptazodis'],'</td>
                                                                    <td class="col-md-2">
                                                                        <form method="post">
                                                                        <input type="hidden" value="',$row["id"],'" name="id"></input>
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
                                    <!-- End of tables -->
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <div id="naujasSoc" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Patalpinti paskyrą</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Paskyros kategorija</label>
                                            <select class="form-control" name="kategorija">
                                              <option value="in">Instagram</option>
                                              <option value="tw">Twitter</option>
                                            </select>
                                        </div>
                                    <div class="form-group">
                                        <label>Slapyvardis</label>
                                        <input type="text" name="slapyvardis" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slaptažodis</label>
                                        <input type="text" name="slaptazodis" class="form-control">
                                    </div>
                                    <button class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                    <button type="submit" name="submitPas" class="btn btn-primary">Talpinti</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="display: inline-block;"><b>Socialiniai tinklai</b></h5>
                                <button class="btn btn-primary btn-circle pull-right" data-toggle="modal" data-target="#naujasSoc"><i class="fa fa-pencil fa-fw"></i></button>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#instagram" data-toggle="tab">Instagram</a>
                                    </li>
                                    <li><a href="#twitter" data-toggle="tab">Twitter</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="instagram">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">Slapyvardis</th>
                                                        <th class="col-md-2">Slaptažodis</th>
                                                        <th class="col-md-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = "SELECT * FROM paskyros WHERE kategorija ='in'";
                                                        $result = mysqli_query($connect,$query);
                                                        $count = mysqli_num_rows($result);
                                                        while($row =  mysqli_fetch_assoc($result)){
                                                            echo '
                                                                <tr>
                                                                    <td class="col-md-2">',$row['slapyvardis'],'</td>
                                                                    <td class="col-md-2">',$row['slaptazodis'],'</td>
                                                                    <td class="col-md-2">
                                                                        <form method="post">
                                                                        <input type="hidden" value="',$row["id"],'" name="id"></input>
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
                                    <div class="tab-pane fade" id="twitter">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2">Slapyvardis</th>
                                                        <th class="col-md-2">Slaptažodis</th>
                                                        <th class="col-md-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = "SELECT * FROM paskyros WHERE kategorija ='tw'";
                                                        $result = mysqli_query($connect,$query);
                                                        $count = mysqli_num_rows($result);
                                                        while($row =  mysqli_fetch_assoc($result)){
                                                            echo '
                                                                <tr>
                                                                    <td class="col-md-2">',$row['slapyvardis'],'</td>
                                                                    <td class="col-md-2">',$row['slaptazodis'],'</td>
                                                                    <td class="col-md-2">
                                                                        <form method="post">
                                                                        <input type="hidden" value="',$row["id"],'" name="id"></input>
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
                            <!-- /.panel-body -->
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
