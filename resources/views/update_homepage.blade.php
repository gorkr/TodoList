<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Add TodoList</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="{{ asset('css/global.css') }}" rel="stylesheet">


    </head>


    <body class="bg">
    <div class="container">
        <div class="modal-dialog opac " style=" margin-top: 10%">

            <form action="insert_homepage" method="post">
                @csrf
                <div  class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center "> Add TodoList </h4>
                    </div>

                    <div class="modal-body" id="model-body">
                        <div class="form-group">

                            <input type="text"  id="work" name="work" placeholder="Work">
                        </div>

                    </div>

                </div>



                <div >
                    <label for="status">Status：</label>
                    <input type="text" name="status" id="status" >
                </div>

                <div >
                    <label for="share" >Share：</label>
                    <input type="text"  id="share" name="share" placeholder="Share">
                </div>

                <div >
                    <input type="submit" value="提交" style="margin-left: 250px">
                </div>

                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>

    </div>

    </body>
    </html>
</DOCTYPE>
