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
        <title>Profile</title>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
        <style type="text/css" media="screen">
            a,a:visited,a:hover,a:active{
                text-decoration:none;
                color:white;
            }
        </style>
    </head>
    <body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                	<li>
                		<span class="glyphicon glyphicon-user badge-custom-large-glyph"></span>
                	</li>
                    <li class="sidebar-brand">
                        <a href="#">{{ $user['username'] }}</a>
                    </li>
                    
                    <li>
                        <a href="logout">Logout</a>
                    </li>
                   
                </ul>
            </div>

            <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row dashboard-topbar">
                    <div class="col-xs-12 pull-left">
                        
                        <a href="find"><div class="btn btn-custom">Search for People</div></a>
                    </div>
                    <!--<div class="col-xs-12">
                        
                        <div class="btn btn-custom">Search for Movies</div>
                    </div>-->

                    <a href="" class="btn btn-danger pull-right" data-toggle="modal" data-target="#create-modal" >
                        Create Show
                    </a>
                </div>
                <div class="row">
                    <div class="col-xs-12 tab-area">
                        <div role="tabpanel">

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home badge-custom-small-glyph"></span>Shows</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user badge-custom-small-glyph"></span>Friend Requests<span class="badge badge-custom-small">0</span></a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-comment badge-custom-small-glyph"></span>Friends</a></li>                         
                            
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                            	@foreach($shows as $show)
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            {{$show['name']}}
                                           <span class='btn btn-success pull-right'><a href="/show/{{$show['id']}}">Join</a></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="friends">
                            	@foreach($friends['pending'] as $friend)
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            {{$friend['username']}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages">
                            	@foreach($friends['confirmed'] as $friend)
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            {{$friend['username']}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="create-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Create Show</h4>
                    </div>
                    <div class="modal-body">
                        <form action="shows" method="post">
                            <input type="hidden" name="create" value="1">
                            <div class="form-group">
                              <label class="control-label" for="name">Movie Name</label>
                              <input class="form-control" id="name" name="name" type="text" placeholder="Enter Movie Name">
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="sname">Show Name</label>
                              <input class="form-control" id="sname" name="sname" type="text" placeholder="Enter Show Name">
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="link">Movie Youtube Link</label>
                              <input class="form-control" id="link" name="link" type="text" placeholder="Enter Movie Link">
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="usernames">Invite People</label>
                              <input class="form-control" id="usernames" name="usernames" type="text" placeholder="Enter usernames separated by ,">
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>  
            </div>
        </div>  
        </div>
        
        <script src="{{URL::asset('js/vendor/jquery-2.1.1.min.js')}}"></script>
        <script src="{{URL::asset('js/plugins.js')}}"></script>
        <script src="{{URL::asset('js/main.js')}}"></script>

    </body>
</html>
