<html>
<head>
	<title></title>
	<style type="text/css" media="screen">
		#player{
      display: inline-block;
			margin: 0 auto;
			margin-top:100px;
      width: 500px;
		}
    .joined-list{
      display:inline-block;
      width: 400px;
      height: 100%;
    }
    .chat-box{
      display:inline-block;
      width: 300px;
    }
	</style>

</head>
<body>
  <div class='hide' id='sid'>
    {{$sid}}
  </div>
<div class='joined-list'>
		<ul>
      @foreach($users as $user)
			<li>{{$user['username']}}</li>
      @endforeach
		</ul>
</div>
<div id='player'>
	
</div>
<div class='chat-box'>
	<div class='chat-area'>
    <ul class='messages'>
      
    </ul>
  </div>
  <textarea id="input-text"></textarea>
  <button id='send'>Send</button>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
          data = JQuery.parseJSON(data);
          for(i=0;i<data.length;i++){
            username = data[i].user;
            message = data[i].message;
            $('.messages').append('<li>'+username+' : '+message+'</li>');
          }
        }
      });
    }
    setTimeout(update_chatbox,100);

    $('#send').click(function(){
      message = $('#input-text').val();
      sid = $('#sid').html();
      $.ajax({
        url:'/chat',
        type:'POST',
        data:{'sid':sid,'message':message}
      });
    });
  });
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: '{{$link}}',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
</body>
</html>