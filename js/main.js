let app =new Vue({
    el:'#app',
    data:{
        title:'',
        description:'',
        notes:[],
        successText:'',
        errorText:''
    },
    mounted(){
        this.notes.push(
            {
                'title':'First Title',
                'description':'First note demo text'
            },
            {
                'title':'Second Title',
                'description':'Second note description demo text'
            }
        )   
    },
    methods:{
        addNote(){
            let title= this.title;
            let description = this.description;
            if(title.length > 0 && description.length >0){
                let singleNote = {
                    'title':title,
                    'description':description
                }
                this.notes.push(singleNote);
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
           this.notes.splice(noteIndex,1);
           this.successText="Note Delete Successed.."
        }
    }

});