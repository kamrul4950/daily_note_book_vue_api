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
                <div class="card card-body mt-3" v-for="(note ,index) in notes">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{note.title}}</h4>
                            <p>{{note.description}}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-danger" v-on:click="noteDelete(index)">Delete</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/main.js"></script>
</body>
</html>