<?php
function outputError($errorKey){
    if(isset($_GET[$errorKey])){
        return "<p><span class='label label-danger' >{$_GET[$errorKey]}</span></p>";
    }

    return  "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Php Contact Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <div class="container">
            <div class="col-md-8 col-md-push-2">
                <h2>Php Contact Form</h2>
                <form class="" action="process.php" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="">
                    </div>
                    <?php echo outputError('first_name'); ?>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="">
                    </div>
                    <?php echo outputError('last_name'); ?>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="">
                    </div>
                    <?php echo outputError('email'); ?>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" value="">
                    </div>
                    <?php echo outputError('subject'); ?>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea type="text" class="form-control" name="body" id="body" value="">
                        </textarea>
                    </div>
                    <?php echo outputError('body'); ?>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
