<?php 
/*
Template Name: home
*/
?>

<?php

include_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./assets/css/jquery.dataTables.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</head>
<body>

    <div class="container" style="margin-top:20px;">
        <div class="panel panel-primary">
            <div class="panel-heading">Wordpress Posts
                <a class="btn btn-success pull-right" style="margin-top: -6.5px;" data-toggle="modal" data-target="#createPost">+ Create New Post</a>
            </div>
            <div class="panel-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>This is test post</td>
                            <td>test-post</td>
                            <td>publish</td>
                            <td>
                                <a class="btn btn-info" href="javascript:void(0)" data-target="#postEdit" data-toggle="modal" data-target="#postEdit">Edit</a>
                                <a class="btn btn-danger" href="javascript:void(0)">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<!-- Modal -->
<div id="postEdit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Post</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="javascript:void(0)">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Post Title:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    </div>


    
    <!-- Modal -->
    <div id="createPost" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Post</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="javascript:void(0)">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Post Title:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    </div>

    <script src="./assets/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/rest.js"></script>
</body>
</html>