<!DOCTYPE html>
<html>
<head>
    <title>Add product</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style-add-product.css" />
</head>
<body>
<div class="main">
    <form enctype="multipart/form-data" action="insert-value.php" method="post" id="form-1">
        <div class="form-group-0">
            <div class="back">
                <i id="back-icon" class="far fa-2x fa-arrow-alt-circle-left"></i>
            </div>
            <div class="header">
                <h1>Add product</h1>
            </div>
        </div>
        <div class="line-0"></div>
        <div class="form-group-5"; style="margin-bottom: 10px">
            <div class="type-pro">

                <div id="add-type">
                    <label for="pro-cate" style="font-size: 17px">Type: </label>
                    <input type="text" name="drop-type" id="drop-type" class="input"
                           style="width: 150px;" value="" onclick="myToggle()" />
                    <i id="plus" class="fas fa-plus" style="position: relative; left: 10px; top: 5px; cursor: pointer"></i>
                    <style>
                        #plus {
                            display: none;
                        }
                        #plus:hover {
                            color: #7f7fec;
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="form-group-1">
            <div class="fullname">
                <label for="pro-name" style="font-size: 17px;">Name: </label>
                <input type="text" name="pro-name" id="pro-name" class="input" value="" />
            </div>
            <div class="link">
                <label for="pro-link" style="font-size: 17px;">Link: </label>
                <input type="text" name="pro-link" id="pro-link" class="input" value="" />
            </div>
        </div>
        <div class="line-1"></div>
        <div class="form-group-2">
            <div class="image">
                <div class="ima">
                    <label for="pro-image">Image: </label>
                    <input type="file" name="pro-image" id="pro-image"
                           accept="image/*" onchange="previewImage()"/>
                </div>
                <div class="con-image">
                    <img id="preview" />
                </div>
            </div>
            <div class="descrip">
                <label>Description: </label>
                <div class="desc">
                    <textarea name="pro-desc" style="width: 348px; height: 128px; border: 0px; resize: none; padding: 5px; outline: none"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group-3">
            <div class="price">
                <label for="pro-price">Price: </label>
                <input type="text" name="pro-price" id="pro-price" class="input" value="" />
            </div>
            <div class="company">
                <label for="pro-company">Company: </label>
                <input type="text" name="pro-company" id="pro-company" class="input" value="" />
            </div>
        </div>
        <div class="form-group-4">
            <button type="button" id="btn-delete">Delete</button>
            <button type="submit" id="btn-sv">Save</button>
        </div>
    </form>
</div>
</body>
<script>
    function previewImage() {
        var file = document.getElementById('pro-image').files;
        if (file.length > 0) {
            var fileReader = new FileReader();

            fileReader.onload = function (event) {
                document.getElementById('preview').setAttribute('src', event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    }
    document.getElementById('btn-delete').addEventListener('click', () => {
        window.location.href="remove-product.php";
    });
</script>
<script>
function display() {
    return true;
}
</script>
<script src="showinputtype.js"></script>
</html>