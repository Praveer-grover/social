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

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="row">
                <div class="col-xs-8 center-block">
                    <div class="panel panel-default page-content">
                        <div class="panel-body">
                            <h3>Search for People</h3>
                            <form action="find" method="post">
                                <p>
                                    <input type="text" name="username" placeholder="Type a name">
                                </p>
                                <p>
                                    <button class="btn btn-success">Search</button>
                                </p>
                            </form>
                            <div class="panel panel-default">
                                @foreach($people as $u)
                                <form action="add-friend" method="post" >
                                <div class="panel-body clearfix">
                                    <input type="hidden" name="uid2" value="{{$u['id']}}">
                                    <div class="person-name pull-left">{{$u['username']}}</div>
                                    <button class="btn btn-primary pull-right">Add Friend</button>
                                </div>
                                </form>
                                @endforeach
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
