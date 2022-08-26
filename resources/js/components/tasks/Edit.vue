<template>
    <div class="container-fluid w-50">

        <h1 class="text-center">Edit Task {{id}}</h1>
    <!--para que no recargue la pagina el v:on....-->
        <form v-on:submit.prevent="saveTask()" method="POST" class="d-flex justify-content-center flex-column">
        <!--Se le asigna el campo task-->
            <input type="text" v-model="task.todo" name="todo" placeholder="Nueva Task">
            <input type="submit" class="btn btn-success w-25 mt-3" value="Guardar">
        </form>
        
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                id: this.$route.params.id,
                task: []
            }
        },
        created(){
            axios.get('/tasks/'+this.id+'/edit').then(response=> this.task = response.data).catch(error=>console.log(error));
        },
        methods:{
            
            saveTask(){
                axios.put('/tasks/'+this.id, {todo:this.task.todo}).then(response => {console.log(response)}).catch(error => {console.log(error)})
                this.task.todo = '';
                this.$router.push('/');
            }
        }
    }
</script>
