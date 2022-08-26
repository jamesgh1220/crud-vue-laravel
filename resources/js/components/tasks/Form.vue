<template>
    <div class="container-fluid w-50">

        <h1 class="text-center">Create Tasks</h1>
    <!--para que no recargue la pagina el v:on....-->
        <form v-on:submit.prevent="saveTask()" method="POST" class="d-flex justify-content-center flex-column">
        <!--Se le asigna el campo task-->
            <input type="text" v-model="task" name="todo" placeholder="Nueva Task">
            <input type="submit" class="btn btn-success w-25 mt-3" value="Guardar">
        </form>
        
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                task: ''
            }
        },
        methods:{
            saveTask(){
                axios.post('/tasks', {todo:this.task}).then(response => {console.log(response)}).catch(error => {console.log(error)})
                this.task = '';
            }
        }
    }
</script>
