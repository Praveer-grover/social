<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    </head>
    <body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 left-block">
                    <!--Write your content here-->
                    
                    <h3>MoviesWatch</h3>
                    
                    <!--<button class="btn btn-success">CLICK ME</button>-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mycontainer">
                <div class="col-xs-6 center-block">
                    <!--Write your content here-->
                    <h1>MoviesWatch</h1>
                    <h2>Social Network for Moviesters</h2>
                    <p>Join, Connect, Watch, Enjoy</p>
                    <!--<button class="btn btn-success">CLICK ME</button>-->
                </div>
                <div class="col-xs-6 mac-image">
                    <img src="{{URL::asset('images/mac.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-xs-4 center-block">
                <div class="panel panel-default">
                <div class="panel-body panel-login">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home badge-custom-small-glyph"></span>Login</a></li>
                        <li role="presentation"><a href="#signup" class="last" aria-controls="signup" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user badge-custom-small-glyph"></span>Signup</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">
                            <form action="login" method="post">
                            <div class="form-group">
                              <label class="control-label" for="username">Username</label>
                              <input class="form-control" id="username" name="username" type="text" placeholder="Username">
                            </div>

                            <div class="form-group">
                              <label class="control-label" for="password">Password</label>
                              <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                            </div>

                            <input type="submit" class="btn btn-primary">
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="signup">
                            <form action="signup" method="post">
                            <div class="form-group">
                              <label class="control-label" for="email">Email ID</label>
                              <input type="text" class="form-control" id="email" name="email" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="username">Username</label>
                              <input class="form-control" id="username" name="username" type="text" placeholder="Username">
                            </div>

                            <div class="form-group">
                              <label class="control-label" for="password">Password</label>
                              <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                            </div>
                                <input type="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </div>
            
        
        <script src="js/vendor/jquery-2.1.1.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
