<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Note Book Vue With Api</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="card">
                <div class="card card-head">
                    <h2>Note Book</h2>
                </div>
                <div>
                    <div class="alert alert-danger" v-if="errorText.length > 0">
                        {{errorText}}
                    </div>
                    <div class="alert alert-success" v-if="successText.length >0">
                        {{successText}}
                    </div>
                </div>
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Note Title</p>
                            <input type="text" class="form-control" v-model="title">
                        </div>
                        <div class="col-md-6">
                            <p>Note Description</p>
                            <textarea class="form-control" v-model="description" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-success btn-block mt-2" v-on:click="addNote">Add Note</button>
                    </div>
                </div>
                <div class="card card-body mt-3" v-for="(note ,index) in notes.data">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{note.title}}</h4>
                            <p>{{note.description}}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-danger" v-on:click="noteDelete(note.id)">Delete</button>
                            <button type="button" class="btn btn-warning" v-on:click="noteEdit(note.id)">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Model Start here-->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Update {{title}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-success">Note Title</p>
                                <input type="text" class="form-control" v-model="title">
                            </div>
                            <div class="col-md-12">
                                <p class="text-success">Note Description</p>
                                <textarea class="form-control" v-model="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-success btn-block mt-2" v-on:click="updateNote">Update Note</button>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>
            <!--Model end here-->

        </div>
    </div>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/main.js"></script>
</body>
</html>