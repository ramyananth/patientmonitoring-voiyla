<?php
include('dbconn.php');
$name = $_GET['id'];
$number = "";
$pno = "";
$sql = "select * from nurse where number = '$name'";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $name=$row['name'];
        $number=$row['number'];
        $dept1 =$row['dept1'];
        $dept2 =$row['dept2'];
        $id="nurse";
        $id.=$name;

    }
}
else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nurse| Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Catamaran:100|Exo:100|Lato" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand bg-success"><b>Patient Monitoring System</b></a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#myModal_profile" data-toggle="modal">Profile</a></li>
                <li><a href="#"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#myModal_signout" data-toggle="modal">Nurse</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">

        <div class="col-sm-offset-3 col-md-6">
            <div class="color-palette-set">
                <div class="bg-gray-active color-palette">
                    <div class="box-header with-border"><p><h2 style="color: white;">Nurse Dashboard</h2></p></div></div>
            </div></div>

    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-md-6">

        </div>
        <br>
        <div class="row">
            <div class="col-sm-offset-2 col-md-8">
                <div class="box box-primary box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Patients</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Number</th>
                                        <th>Medicine 1</th>
                                        <th>Medicine 2</th>
                                        <th>Diagnosis</th>
                                        <th>Patient Status</th>
                                        <th>Nurse Status</th>
                                        <th>Doctor Status</th>
                                        <th>Approve?</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "select * from Patient";
                                    $result=$conn->query($sql);
                                    $modalid="";
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $med1=$row['med1'];
                                            $med2=$row['med2'];
                                            $name1 = $row['name'];
                                            $number=$row['number'];
                                            $diag=$row['diagnosis'];
                                            $modalid="#";
                                            $modalid.=$name1;
                                            $modalid.=$number;
                                            $docStatus = $row['doctorStatus'];
                                            $nurseStatus = $row['nurseStatus'];
                                            $patientStatus = $row['patientStatus'];
                                            echo "<tr><td>$name1</td><td>$number</td><td>$med1</td><td>$med2</td><td>$diag</td><td>$patientStatus</td><td>$nurseStatus</td><td>$docStatus</td><td><input type='button' class='btn btn-success' data-toggle=\"modal\" data-target='$modalid' value='change?'></td></tr>";
                                        }
                                    }
                                    else {
                                        echo "0 results";
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Number</th>
                                        <th>Medicine 1</th>
                                        <th>Medicine 2</th>
                                        <th>Diagnosis</th>
                                        <th>Patient Status</th>
                                        <th>Nurse Status</th>
                                        <th>Doctor Status</th>
                                        <th>Approve?</th>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
</div>




</div>
<?php
$sql = "select * from Patient";
$result=$conn->query($sql);
$modalid="";
if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $name1 = $row['name'];
        $number=$row['number'];
        $modalid = "";
        $modalid .= $name1;
        $modalid .= $number;
        echo "<div id='$modalid' class=\"modal fade\" role=\"dialog\">
    <div class=\"modal-dialog modal-success\">

        <!-- Modal content-->
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                <h4 class=\"modal-title\">Authorize?</h4>
            </div>
            <div class=\"modal-body\">
                <p> <form action=\"updateNurse.php\" method=\"post\" name=\"signup\" ><!-- specify the servelet file name in the action -->
                        <div class=\"box box-success\">
                            <div class=\"box-header with-border\">
                            </div>
                            <div class=\"box-body\">
                                <input class=\"form-control input-lg\" type=\"text\" id=\"id\" name=\"id\" value=\"$name1\" readonly>
                                <br>                                
                                <input class=\"form-control input-lg\" id=\"med1\" name=\"med1\" type=\"text\" value=$med1 style=\"font-family: Baloo Bhaina;\" readonly >
                                <br>
                                <input class=\"form-control input-lg\" type=\"text\" id=\"med2\" name=\"med2\" value=$med2  placeholder=\"Password\" readonly style=\"font-family: Baloo Bhaina; \">
                                <br>
                                <input class=\"form-control input-lg\" type=\"text\" id='diagnosis' name=\"diagnosis\" value='$diag' placeholder=\"Number\" readonly style=\"font-family: Baloo Bhaina; \">
                                <br>
                                <input class=\"form-control input-lg\" type=\"text\" id='status' name=\"status\" value='$docStatus' placeholder=\"Number\" readonly style=\"font-family: Baloo Bhaina; \">
                                <br>
                                <input type=\"submit\" value=\"Accept?\" class=\"btn btn-lg btn-success\" style=\"font-family: Baloo Bhaina; \">

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </form></p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
            </div>
        </div></div></div>  ";
    }
}
?>

<div id="myModal_signout" class="modal fade" role="dialog">
    <div class="modal-dialog modal-danger">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure to sign out?</h4>
            </div>
            <div class="modal-body">
                <p>form</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="myModal_profile" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nurse Profile</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"><?php echo $name?></h3>
                            <h5 class="widget-user-desc"><?php echo $dept1,$dept2;?></h5>
                            <h5 class="widget-user-desc">Contact No: <?php echo $number?></h5>
                        </div>
                        <div class="widget-user-image">
                            <!--<img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">-->
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"><?php echo $id ?></h5>
                                        <span class="description-text">ID</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"></h5>
                                        <span class="description-text">Nurse</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">A100</h5>
                                        <span class="description-text">Room</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <div class="box box-success bg-green-gradient">
                                            <h3> IN <i class="fa fa-check"></i> </h3>
                                        </div>
                                    </div>

                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
            <br>
            <br>
            <br><br><br><br><br><br><br><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- ./wrapper -->

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
