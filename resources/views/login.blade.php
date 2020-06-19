<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <title>login</title>
</head>
<body class="bg">
<div class="container ">
    <div class=" modal-dialog opac  " style="margin-top: 10%;" >
        <form action="loginCheck"  >
            @csrf
            <div class="modal-content bg-content">

                <div class="modal-header">

                        <img src="../images/logo.png" class="img-responsive m-auto" width="100xp">

                </div>

                <div class="modal-body" id = "modal-body">
                    <div class="m-2" >
                        <h4 class="modal-title text-center "> Welcome to TodoList! </h4>
                    </div>

                    <div class="form-group">
                        <input class="form-control bg-content" type="text" name="name" placeholder="Username or Email" required=""  autofocus="autofocus" id="inputText">
                    </div>

                    <div class="form-group">
                        <input  class="form-control bg-content " type="password" name="password" placeholder="Password" required="" id="inputPassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary control" method="post">login</button>
                    </div>
                    <div class="form-group">
                        <button  type="button" onclick="logon();" class="btn  form-control bg-content">logon</button>
                    </div>
                    <div id="response" value="true"></div>

                </div>
            </div>
        </form>
    </div>
</div>





<script>
    function logon() {
        location.href = "{{'logon'}}";
    }
</script>
</body>
</html>











