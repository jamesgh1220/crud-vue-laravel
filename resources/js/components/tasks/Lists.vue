<template>
    <div class="container-fluid w-75">

        <h1 class="text-center">Tasks List</h1>
        <div v-for="task in tasks" :key="task.id" class="d-flex justify-content-evenly align-items-center">
            <input type="checkbox" :checked="checkCompleted(task.completed)" @click="completeTask(task)">
            <p class="mt-2">{{task.todo}}</p>
            <div class="ml-auto d-flex">
                <router-link :to="'/edit/'+task.id" class="btn btn-primary">Editar</router-link>
            </div>
            
            <form v-on:submit.prevent="deleteTask(task.id)">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tasks: []
            }
        },
        methods:{
            getTasks(){
                axios.get('/tasks')
                .then(response=> this.tasks = response.data)
                .catch(error=>console.log(error));
            },
            deleteTask(id){
                axios.delete('/tasks/'+id).then(response => {console.log(response)}).catch(error => {console.log(error)});
                this.getTasks();
            },
            completeTask(task){
                if(task.completed === 0){
                    var complete = 1;
                }else{
                    var complete = 0;
                }
                axios.put('/tasks/'+task.id,{
                    task: task.todo,
                    completed: complete
                }).then(response => {console.log(response)}).catch(error => {console.log(error)});
            },
            checkCompleted(param){
                if(param === 1){
                    return true;
                }else{
                    return false;
                }
            }
        },
        created(){
            axios.get('/tasks')
                .then(response=> this.tasks = response.data)
                .catch(error=>console.log(error));
        }
        
    }
</script>
