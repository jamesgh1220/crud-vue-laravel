<template>
    <div class="container-fluid">

        <h1 class="text-center">Tasks List</h1>
        <div v-for="task in tasks" :key="task.id" class="d-flex justify-content-evenly align-items-center">
            <input type="checkbox">
            <p class="mt-2">{{task.todo}}</p>
            <div class="ml-auto d-flex">
                <router-link to="/" class="btn btn-primary">Editar</router-link>
            </div>
            <form action="">
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
        created(){
            axios.get('/tasks').then(response=> this.tasks = response.data).catch(error=>console.log(error))
        }
        
    }
</script>
