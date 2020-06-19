<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Add List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    </head>
    <body class="bg">
    <div class="container">
        <div class=" modal-dialog opac  " style="margin-top: 10%;">
            <form action="insert_homepage" method="post">
                <div class="modal-content bg-content">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Add List
                        </h4>
                    </div>
                    <div class="modal-body" id="modal-body">

                        <div class="form-group">
                            <label>Creat Work</label>
                            <input type="text" id="work" name="work" placeholder="Work" class="form-control bg-content"
                                   required="">
                        </div>
                        <div class="form-group">
                            <label>Share with</label>
                            <select class="form-control bg-content" name="Share">
                                @foreach($friends as $val)
                                    <option value="{{$val->friend}}">{{$val->friend}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary control">Add</button>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
    </body>
    </html>
</DOCTYPE>
