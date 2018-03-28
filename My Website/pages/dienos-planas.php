<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dienos Planas</title>

    <?php
        include 'header-detail.php';
        include 'mysql.php';

        if(isset($_POST['submit'])) {

                            mysqli_query($connect,'TRUNCATE TABLE dienos_planas');
                            
                            $nuo = $_POST['nuo'];
                            $iki = $_POST['iki'];

                            while ($nuo <= $iki) {
                              $dabartinis = "laikas" . $nuo;
                              $tekstas = $_POST["$dabartinis"];
                              $query = "INSERT INTO dienos_planas ( Tekstas, Statusas, laikas) 
                              VALUES ('$tekstas', 'default', '$nuo')";
                              mysqli_query($connect,$query);
                              $nuo++;
                            }
                         }
        if (isset($_POST['success'])) {
          $id = $_POST['id'];
          $query = "UPDATE dienos_planas SET Statusas='finish' WHERE id = '$id'";
          mysqli_query($connect,$query);
        }
        if (isset($_POST['remove'])) {
          $id = $_POST['id'];
          $query = "UPDATE dienos_planas SET Statusas='remove' WHERE id = '$id'";
          mysqli_query($connect,$query);
        }
        if (isset($_POST['edit'])) {
                $id = $_POST['id'];
                $query = "SELECT * FROM dienos_planas WHERE id = '$id'";
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
                                    <h4 class="modal-title">Uzduoties Redagavimas</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Redaguoti Uzduoti</label>
                                            <input type="text" name="pavadinimas" class="form-control" value="',$rows["Tekstas"],'">
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
                $id = $_POST['id'];

                $query = "UPDATE dienos_planas SET Tekstas = '$pavadinimas' WHERE id = '$id'";
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
            <div id="naujasPlanas" class="modal fade" role="dialog">
                <script type="text/javascript">
                  
                </script>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Naujas Planas</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                              <span class="input-group-addon">Nuo</span>
                              <input type="number" name="nuo" class="form-control" id="nuo">
                              <span class="input-group-addon">-</span>
                              <input type="number" name="iki" class="form-control" id="iki">
                              <span class="input-group-addon">Iki</span>
                            </div><br>
                            <button type="submit" onclick="sudelioti()" name="sudelioti" class="btn btn-primary">Sudelioti</button>
                            <hr>
                            
                            <form role="form" method="post" id="insertHere">

                                <script type="text/javascript">
                                function sudelioti(){
                                  var nuo = parseInt(document.getElementById('nuo').value);
                                  var iki = document.getElementById('iki').value;
                                  var el = document.getElementById('insertHere');
                                  el.innerHTML = '<input type="hidden" value="' + nuo + '" name="nuo"></input><input type="hidden" value="' + iki + '" name="iki"></input>';
                                  while(nuo <= iki){
                                  el.innerHTML += '<div class="form-group input-group"><span class="input-group-addon">' + nuo + ':00</span><input type="text" class="form-control" name="laikas' + nuo + '"></div>';
                                  nuo++;
                                  };
                                  el.innerHTML += '<button class="btn btn-default" data-dismiss="modal">Uždaryti</button><button type="submit" name="submit" class="btn btn-primary">Talpinti</button>';
                                }
                                </script>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 style="display: inline;">Dienos Planas</h1>
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#naujasPlanas">Naujas Planas</button>
                        </div>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Šiandienos Planas
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                       <thead>
                                           <tr>
                                               <th class="col-md-1">Laikas</th>
                                               <th class="col-md-9">Užduotis</th>
                                               <th class="col-md-2"></th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                              <?php
                                                $query = "SELECT * FROM `dienos_planas`";
                                                $result = mysqli_query($connect,$query) or die(mysql_error());
                                                while ($rows = mysqli_fetch_assoc($result)) {
                                                  if ($rows["Statusas"] == "remove") {
                                                      $statusas = "danger";
                                                  }elseif ($rows["Statusas"] == "finish") {
                                                      $statusas = "success";
                                                  }else{
                                                      $statusas = "";
                                                  } 
                                                  echo '
                                                  <tr class=',$statusas,'>
                                                    <td class="col-md-1">',$rows["laikas"],':00</td>
                                                    <td class="col-md-9">',$rows["Tekstas"],'.</td>
                                                    <td class="col-md-2">
                                                      <form method="post">
                                                      <input type="hidden" value="',$rows["id"],'" name="id"></input>
                                                      <button class="btn btn-success btn-xs" type="submit" name="success">
                                                        <i class="fa fa-check-circle-o fa-fw"></i>
                                                      </button>
                                                      <button class="btn btn-primary btn-xs" type="submit" name="edit">
                                                        <i class="fa fa-edit fa-fw"></i>
                                                      </button>
                                                      <button class="btn btn-danger btn-xs" type="submit" name="remove">
                                                        <i class="fa fa-remove fa-fw"></i>
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
                <!-- /.row -->
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
