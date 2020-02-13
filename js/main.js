let app =new Vue({
    el:'#app',
    data:{
        title:'',
        description:'',
        notes:[],
        successText:'',
        errorText:'',
        noteIdCarry:''
    },
    mounted(){
       
        //fetch data from database with api
        let vm=this;
        axios.get('http://localhost/daily_note_book_vue_api/api/notes.php')
        .then(function(response){
            vm.notes = response.data;
        })
        .catch(function(response){
            console.log(response);
        })

          
    },
    methods:{
        addNote(){
            let title= this.title;
            let description = this.description;
            let vm = this;
            if(title.length > 0 && description.length >0){
                // let singleNote = {
                //     title:'title',
                //     description:'description',
                //     athur_id: 1
                // }

                const singleNote = new URLSearchParams();
                singleNote.append('title',title);
                singleNote.append('description',description);
                singleNote.append('athur_id',1);
                
                axios.post('http://localhost/daily_note_book_vue_api/api/add_note.php',singleNote)
                .then(function(response){
                    console.log(response);
                })
                .catch(function(error){
                    console.log(error);
                })

                vm.fetchNoteAllData();
                this.title='',
                this.description='',
                this.successText='Note Added..',
                this.errorText=''
            }else{
                this.successText='',
                this.errorText='Please fill must be field..'
                return;
            }
        },
        noteDelete(noteIndex){
           let vm= this;
           const singleNote = new URLSearchParams();
           singleNote.append('id',noteIndex);
           axios.post('http://localhost/daily_note_book_vue_api/api/delete_note.php',singleNote)
           .then(function(response){
                console.log(response);
           })
            .catch(function(error){
                console.log(error);
            })
            vm.fetchNoteAllData();
           this.successText="Note Delete Successed.."
        },
        noteEdit(noteIndex){
            $('#myModal').modal('show');
             this.noteIdCarry = noteIndex;
            let vm=this;
            axios.get('http://localhost/daily_note_book_vue_api/api/show_note.php?id='+noteIndex)
            .then(function(response){
                vm.title=response.data.data.title;
                vm.description=response.data.data.description;
            })
            .catch(function(error){
                console.log(error);
            })
        },
        updateNote(){
            let vm = this;
            const singleNote = new URLSearchParams();
            singleNote.append('title',vm.title);
            singleNote.append('description',vm.description);
            singleNote.append('athur_id',1);
            singleNote.append('id',vm.noteIdCarry);

            axios.post('http://localhost/daily_note_book_vue_api/api/edit_note.php',singleNote)
            .then(function(response){
                vm.fetchNoteAllData();
                
            })
            .catch(function(error){
                console.log(error);
            })
                this.title="";
                this.description="";
                this.successText="Successfuly Note Update..";
                this.errorText="";
                $('#myModal').modal('hide');
        },

        fetchNoteAllData(){
            let vm=this;
            axios.get('http://localhost/daily_note_book_vue_api/api/notes.php')
            .then(function(response){
                vm.notes = response.data;
            })
            .catch(function(response){
                console.log(response);
            })
        }
    }

});