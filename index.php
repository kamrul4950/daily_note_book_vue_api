<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Note Book Vue With Api</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="app" class="container">
        <h2>Note Book</h2>
        <div class="section_bg p-3">
            <div class="card">   
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
                            <p class="text-success">Note Title</p>
                            <input type="text" class="form-control" v-model="title" placeholder="Enter new note title" >
                        </div>
                        <div class="col-md-6">
                            <p class="text-success">Note Description</p>
                            <textarea class="form-control" v-model="description" cols="30" rows="5" placeholder="Enter new note description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-success btn-block mt-2" v-on:click="addNote">Add Note</button>
                    </div>
                </div>
            </div>
            <div class="search-form mt-2 clearfix">
                <input type="text" v-model="search" class="form-control w-25 float-right" placeholder="Search here.." v-on:input="searchWork">
            </div>
            
            <table class="table table-bordered mt-3">
                <thead>
                    <tr class="table-head">
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(note ,index) in notes.data">
                        <td>{{index+1}}</td>
                        <td>{{note.title}}</td>
                        <td>{{note.description}}</td>
                        <td>
                            <button type="button" class="btn btn-danger" v-on:click="noteDelete(note.id)">Delete</button>
                            <button type="button" class="btn btn-warning" v-on:click="noteEdit(note.id)">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
