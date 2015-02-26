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

        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
        <style>
        .hide{
            display: none;
        }
        .movie{
            padding-top: 50px;
        }
        .chat-sidebar{
            border-left: 2px solid #ebebeb;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            width: 300px;

        }
        .chats-container{
            padding: 20px;
            background-color: #ebebeb;
            position: absolute;
            top: 0;
            width: 100%;
            bottom: 300px;
        }
        .send-chat-container{
            position: absolute;
            position: absolute;
            bottom: 0;
            height: 300px;
            padding: 20px;
        }
        .send-chat-container .form-control{
            height: 150px;
            max-width: 100%;
            max-height: 150px;
            overflow-y: scroll;
        }
        .sidebar-nav li{
            color:white;
        }
        </style>
    </head>
    <body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class='hide' id='sid'>
            {{$sid}}
        </div>
        <div class='hide' id='lastid'>1</div>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">MoviesWatch</a>
                    </li>
                    @foreach($users as $user)
                    <li class="sidebar-brand">
                        {{$user['username']}}
                    </li>
                    @endforeach                    
                </ul>
            </div>

            <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
                        <h2>{{$name}}</h2>
                        <div class="movie">
                        <iframe width="100%" height="450px" src="{{$link}}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>    
                        </div>
                    </div>
                    <div class="chat-sidebar">
                        <div class="chats-container"></div>
                        <div class="send-chat-container">
                            <div class="form-group">
                                <textarea class="form-control send-chat" name="" id="input-text" cols="30" rows="10"></textarea>
                            </div>
                            <button class="btn btn-primary" id="send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <script src="{{URL::asset('js/vendor/jquery-2.1.1.min.js')}}"></script>
        <script src="{{URL::asset('js/plugins.js')}}"></script>
        <script src="{{URL::asset('js/main.js')}}"></script>
    <script>
         $(document).ready(function(){

            function update_chatbox(){
                sid = $('#sid').html();

                $.ajax({
                    url:'/getchat',
                    type:'POST',
                    data:{'sid':sid},
                    success:function(data){
                        //alert(data);
                        data = jQuery.parseJSON(data);
                        for(i=0;i<data.length;i++){
                            username = data[i].user;
                            message = data[i].message;
                            id = data[i].id;
                            id1 = $('#lastid').html();
                            if(id>id1 || id1==null)
                            {$('.chats-container').append('<div>'+username+' : '+message+'</div>');
                                $('#lastid').html(id);
                            }
                        }
                    }
                });
            }
        setInterval(update_chatbox,1000);

        $('#send').click(function(){
            message = $('#input-text').val();
            sid = $('#sid').html();
            sid = $.trim(sid);
            //alert(sid);
            $.ajax({
                url:'/chat',
                type:'POST',
                data:{'sid':sid,'message':message},
                success:function(data){
                    update_chatbox();
                    $('#input-text').val("");
                }
            });

        });
  });
         </script>
    </body>
</html>
