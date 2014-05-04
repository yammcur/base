<?php
	$con=mysqli_connect("localhost","root","tester11","yammcur");
	$qry = "SELECT budget, users.yammer_email, users.id_yammer from trip INNER JOIN `trip_users` ON trip.id = trip_users.id_trip INNER JOIN users ON trip_users.id_user = users.id_yammer where `id_trip` = 1";
	$res = mysqli_query($con, $qry);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ymr+Cncr hack</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" data-app-id="pWvjc6mXlrGLDOYEWO4g" src="https://assets.yammer.com/assets/platform_js_sdk.js"></script>
  </head>
  <body>
    <div class="container">
        <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div id="add_trip_heading" class="panel-heading">
                    Add a trip
                </div>
                <div id="add_trip_body" class="panel-body">
                    <form method="post" action="dbsave.php">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Trip budget(per team member)</h3>
                                <div class="input-group">
                                  <span class="input-group-addon">$</span>
                                  <input name="budget" type="text" class="form-control">
                                  <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Select participants</h3>
                            </div>
                            <div id="ymr_users" class="col-lg-6">
                                
                            </div>
                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary margin-top20">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default margin-top20">
                        <div class="panel-heading">Business trips</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>E-mail</th>
                                            <th>Expenses</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0; ?>
                                    <?php $min  = 2700;  ?>
                                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <?php $budget  = $row['budget'];  ?>
                                    
                                        <tr>
                                            <td><?= ++$count ?></td>
                                            <td><?= $row['yammer_email']; ?></td>
                                            <td><?=($min - 1900)*$count?> / <?=$budget?></td>
                                            <td>
                                               <?php if($count == 1) : ?>
                                                    <button class="btn btn-primary" onclick="yammerHelper.praiseUser('<?= $row['id_yammer']; ?>','This guy saved $<?= ($budget - ( $min - 100)) ?> during his business trip and he is awarded with this amount. Add a question for some expert advice.')">Award</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
         </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="yammercore.js"></script>
    <script>
        $(function(){
            yammerHelper.checkLoginStatus(
                function(){
                    yammerHelper.getUsersInNetwork();
                }
            );
            $("#add_trip_heading").on("click", function(){
                $("#add_trip_body").slideToggle();
            });
        });
    </script>
  </body>
</html>