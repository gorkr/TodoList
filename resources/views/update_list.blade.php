<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Test2</title>
    </head>
    <body>
    <div style="width: 600px">
        <center><h3>修改list</h3></center>
        <form action="update_list_op?id={{$data->id}}" method="post">
            <div class="form-group">
                <label for="item" >item：</label>
                <input type="text" id="item" name="item" value="{{$data->item}}">
            </div>

            <div>
                <label for="status">Status：</label>
                <select name="status" id="status" class="form-control">
                    @if($data->status == 'Start')
                        <option value="Start" selected>Start</option>
                        <option value="End">End</option>
                    @endif
                    @if($data->status == 'End')
                        <option value="Start">Start</option>
                        <option value="End" selected>End</option>
                    @endif
                </select>
            </div>

            <div>
                <input type="submit" value="提交" style="margin-left: 250px">
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
    </body>
    </html>
</DOCTYPE>
