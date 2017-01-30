<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Laravel PHP Framework</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">
        <form name="addimagetoalbum" method="POST"action="{{}}"enctype="multipart/form-data">
            <input type="hidden" name="album_id"value="" />
            <fieldset>
                <legend>Add an Image to </legend>
                <div class="form-group">
                    <label for="description">Image Description</label>
                    <textarea name="description" type="text"class="form-control" placeholder="Imagedescription"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Select an Image</label>
                    {{Form::file('image')}}
                </div>
                <button type="submit" class="btnbtn-default">Add Image!</button>
            </fieldset>
        </form>
    </div>
</div> <!-- /container -->
</body>
</html>