<!doctype html>
<head>
    <title>Test BE NusanTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Test BE NusanTech">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <style type="text/css">
    .maze-container {
        margin: 20px 0;
    }
    #please-wait {
        display: none;
    }
    .form-alert {
        color: red;
        display: none;
    }
    pre {
        display: inline-block;
        margin: 0;
        line-height: 1;
    }
    footer {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0);
        padding: 10px 0;
        background: white;
        width: 100%;
        text-align: center; 
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    #result {
        margin-bottom: 40px;
    }
    .maze-row {
        display: block;
        line-height: 1;
    }
</style>
</head>

<body>
    <div id="right-panel" class="right-panel">
        <div class="content">
            @yield('content')
        </div>
        <div class="clearfix"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#form-input').submit(function(e){
            e.preventDefault();
            var inputan = $('#btn-input');
            inputan.hide();
            var bilangan = $('#bilangan').val();

            $.ajax({
                url: "{{ route('bikinPola') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    bilangan: bilangan
                },
                success: function(res) {
                    inputan.show();
                    $('#hasil').append(res.maze);
                }
            });
        });
    });
</script>
</body>
</html>
