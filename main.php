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
                                        <tr>
                                            <td>1</td>
                                            <td>goran@devlabs.bg</td>
                                            <td>200 / 600</td>
                                            <td>
                                                <button class="btn btn-primary" onclick="yammerHelper.praiseUser('1517466377','This guy saved $3000 during his business trip and he is awarded with this amount. Add a question for some expert advice.')">Award</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>silvi@devlabs.bg</td>
                                            <td>300 / 600</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>jordan@devlabs.bg</td>
                                            <td>500 / 600</td>
                                            <td></td>
                                        </tr>
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