
<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/login_register.css') }}" rel="stylesheet">
    <title>login</title>
</head>
<body class="bg">
<div class="container">
    <div class=" modal-dialog opac  " style="margin-top: 10%;" >
        <form action="loginCheck"  >
            @csrf
            <div class="modal-content">

                <div class="modal-header">

                    <img src="../images/logo.png" class="img-responsive m-auto" width="100xp">
                </div>

                <div class="modal-body" id = "model-body">
                    <div class="form-group">

                        <input type="text" name="name" placeholder="Username" required="" class="form-control" autofocus="autofocus" id="inputText">
                    </div>

                    <div class="form-group">
                        <input  class="form-control" type="password" name="password" placeholder="Password" required="" id="inputPassword">
                    </div>

                    {{--                    <div class="form-group">--}}
                    {{--                        <input   class="form-control" type="email" name="email" placeholder="Email" required="" id="inputEmail">--}}
                    {{--                    </div>--}}

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary control" method="post">login</button>
                    </div>
                    <div class="form-group">
                        <button  type="button" onclick="logon();" class="btn  form-control">logon</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>






<script>
    function logon() {
        location.href = "{{'logon'}}";
    };
</script>
</body>
</html>











