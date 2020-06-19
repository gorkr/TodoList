<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    </head>
    <body class="bg">
    <div class="container " style="margin-top: 5%;">
        <div class=" modal-dialog opac w-75 ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thing List</h4>
                </div>
                <div class="modal-body">
                    <table  class="table table-hover table-striped ">
                        <thead>
                        <tr>
                            <th>list</th>
                            <th>status</th>
                            <th>creator</th>
                            <th>share</th>
                            <th>operate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $val)
                            <tr onclick="view()">
                                <td>{{$val->work}}</td>
                                <td>{{$val->status}}</td>
                                <th>{{$val->name}}</th>
                                @if(Session::get('name') == $val->name)
                                    <td>{{$val->share}}</td>
                                    <td>

                                        <a href="update_homepage?id={{$val->id}}">Edit</a>
                                        <a href="delete_homepage?id={{$val->id}}">Delete</a>
                                    </td>
                                @endif
                                @if(Session::get('name') != $val->name)
                                    <td>{{$val->share}}</td>
                                    <td>
                                        <a href="accept?id={{$val->id}} " >Agree</a>
                                        <a href="un_accept?id={{$val->id}}">Disag</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button onclick="insert();"  class="btn btn-primary ">Add</button>
                    <button onclick="out();" class="btn btn-default " >Logout</button>
                </div>
            </div>
        </div>


    </div>


    </body>
    <script>
        function out() {
            location.href = "{{'out'}}";
        };
        function insert() {
            location.href = "{{'insert'}}";
        };

        function view() {
            location.href = "todo?id={{$val->id}}";

        }
    </script>
    </html>
</DOCTYPE>
