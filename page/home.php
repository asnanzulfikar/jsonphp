<?php 
    $username = "root";
    $password = "";
    $hostname = "localhost"; 

    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password) 
    or die("Unable to connect to MySQL");
    //echo "Connected to MySQL<br>";

    //select a database to work with
    $selected = mysql_select_db("db_telegram",$dbhandle) 
    or die("Could not select examples");

    //execute the SQL query and return records
    $result = mysql_query("SELECT `json` FROM `json_data` WHERE 1");

    //fetch tha data from the database 
    while ($row = mysql_fetch_array($result)) {
        //echo "'[";
        //echo $row{'json'};
        //echo "]'";
        $json_data = $row{'json'};
        //echo "'[".$json_data."]'";
        $json_data = "[".$row{'json'}."]";
        //echo $jsondatapetik;
        //var_dump(json_decode($jsondatapetik,true));

        $decoded = json_decode($json_data,true);
        $waktudantanggal = $decoded[0]['result']['date'] + 18000;
        $date = date_create();

        date_timestamp_set($date, $waktudantanggal);
        //echo date_format($date, 'U = Y-m-d H:i:s'). "\n";

        $id_pesan   = $decoded[0]['result']['message_id'];
        $first_name = $decoded[0]['result']['from']['first_name'];
        $username   = $decoded[0]['result']['from']['username'];
        $chat_id    = $decoded[0]['result']['chat']['id'];
        $waktu      = date_format($date, 'H:i:s');
        $tanggal    = date_format($date, 'd-m-Y');
        $isi_pesan  = $decoded[0]['result']['text'];
    }
    //close the connection
    mysql_close($dbhandle);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BOT TELEGRAM</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="panel-body">
        <div class="row" align="center">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <!-- <h1 class="page-header"><img src="../images/logo.png"> BOT TELEGRAM</h1> -->
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p align="left"><i class="fa fa-check"></i><strong> Pesan Terkirim.</strong></p>
                </div> 
                <div class="panel panel-primary" align="left">
                    <div class="panel-heading" align="right">
                        <strong>ID Pesan : <?php echo $id_pesan; ?></strong>
                    </div>
                    <div class="panel-body">
                        <p><strong>Isi Pesan:</strong>
                            <blockquote><?php echo $isi_pesan; ?></blockquote>
                        </p>
                    </div>
                    <div class="panel-footer" align="justify">
                        <p><strong>Dari :</strong></p>
                        <table>
                        <tr>
                            <td>First Name </td>
                            <td> : </td>
                            <td><strong><?php echo $first_name; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td> : </td>
                            <td><strong><?php echo $username; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Chat ID</td>
                            <td> : </td>
                            <td><strong> <?php echo $chat_id; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Jam Terkirim </td>
                            <td> : </td>
                            <td><strong> <?php echo $waktu; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Tanggal Terkirim </td>
                            <td> : </td>
                            <td><strong> <?php echo $tanggal; ?></strong></td>
                        </tr>

                        </table>

                        <!--<div class="navbar-default sidebar" role="navigation">
                            <div class="sidebar-nav navbar-collapse">
                                <ul class="nav" id="side-menu">
                                     <li>
                                        <a href="#"><i class="fa fa-sign-in"></i> Dari :<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li><a href="">First Name</a></li>
                                            <li><a href="">Username</a></li>
                                            <li><a href="">Chat ID</a></li>
                                            <li><a href="">Jam Terkirim </a></li>
                                            <li><a href="">Jam Terkirim</a></li>
                                            <li><a href="">Tanggal Terkirim </a></li>
                                        </ul>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
