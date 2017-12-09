<html>
<head>
    <title>Chat system with libSSE</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
    <style>
        blockquote {
            margin-bottom: 2px;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script>
        $(function(){
            var data = new EventSource("{{url('send')}}");
            $('#start').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{url('recv')}}",
                    type:'POST',
                    data:{
                        user: $('#user').val()
                    },
                    success:function(){
                        $('#welcome').fadeOut(500);
                        $('#chat').fadeIn(500);
                    }
                });
            });
            $('#message').submit(function(e){
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{url('recv')}}",
                    type:'POST',
                    data:{
                        message: $('#msg').val(),
                        user: $('#user').val()
                    },
                    success:$.noop
                });
            });
            data.addEventListener('user', function(e){
                $('#latest').html('Current User: '+e.data);
            },false);
            data.addEventListener('message', function(e){
                var data = $.parseJSON(e.data);
                $('#lines').prepend($('<blockquote>', {text:data.msg})
                    .append($('<small>', {text: 'By ' + data.user})));
            },false);
        });
    </script>
</head>
<body>
<div class="container">
    <div id="welcome">
        <h1>Welcome to the chat system!</h1>
        <p>Please enter your name first:</p>
        <input type="text" id="user"/>
        <button id="start" class="btn">Proceed</button>
    </div>
    <div id="chat" style="display: none;">
        <h1>Chat System</h1>
        <p>This chat system is built using <a href="http://www.w3.org/TR/2009/WD-eventsource-20090423/">Server-Sent Event</a> and <a href="https://github.com/licson0729/libSSE-php">libSSE</a>.</p>
        <form id="message" class="form-inline">
            <textarea class="input-block-level" id="msg"></textarea>
            <input type="submit" value="Send" class="btn"/>
        </form>
        <div id="lines" class="well"></div>
        <div class="well" id="latest"></div>
    </div>
</div>
</body>
</html>