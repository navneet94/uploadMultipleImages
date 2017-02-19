<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <form action="upload" id="upload" enctype="multipart/form-data">
            <input type="file" name="file[]" multiple>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br/>
            <input type="submit">
        </form>
        <div id="message"></div>
    </body>
</html>
<script>
    var form=document.getElementById('upload');
    var request=new XMLHttpRequest();

    form.addEventListener('submit',function(e){
        e.preventDefault();
        var formdata=new FormData(form);
        request.open('post','upload');        
        request.addEventListener("load",transferComplete);
        request.send(formdata);
    });
    function transferComplete(data){
        response=JSON.parse(data.currentTarget.response);
        if(response.success){
            document.getElementById('message').innerHTML="Images Uploaded Successfully";
        }
    }
</script>
