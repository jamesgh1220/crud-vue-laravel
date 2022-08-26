@extends("layouts.app")

@section("content")
    <nav class="navbar navbar-dark bg-dark ">
        <ul class="nav">
            <li class="nav-item">
                <router-link to="/form" class="nav-link text-white">Formulario</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/" class="nav-link text-white">Tasks List</router-link>
            </li>
        </ul>
    </nav>
<div class="d-flex justify-content-center flex-column mt-5">
    <router-view></router-view>
</div>

@endsection