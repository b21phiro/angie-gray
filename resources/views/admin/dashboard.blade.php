@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
    <div id="admin">
        <main class="main">
            <h1 class="main-title">Welcome {{ $user->getName() }}</h1>
        </main>
        <x-admin-sidepanel
            :user="$user"
        />
    </div>
@endsection
