<!DOCTYPE html>
<html lang="en">

<head>

    <title>Puslapiai</title>

    <?php
        include 'header-detail.php';

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
                        <h1 class="page-header">Visi Puslapiai</h1>
                    </div>
                    <div class="col-lg-6">
                        <h4 style="text-align: center;">Sistemos Puslapiai</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pavadinimas</th>
                                    <th>Linkas</th>
                                    <th>Pozicija</th>
                                    <th>Valdymas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM systemos_puslapiai";
                                    $result = mysqli_query($connect,$query);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        echo '
                                            <tr>
                                                <td>',$rows["pavadinimas"],'</td>
                                                <td><a href="',$rows["linkas"],'">Linkas</a></td>
                                                <td>',$rows["pozicija"],'</td>
                                                <td></td>
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h4 style="text-align: center;">Vartotojo Puslapiai</h4>
                        <hr>
                        <form role="form" method="post">
                        
                        </form>
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
