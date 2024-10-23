@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
    <div id="admin">
        <main class="main">
            <h1>Dashboard</h1>
        </main>
        <aside class="side-panel">
            <header class="header"></header>
            <div class="content">
                <nav class="navigation">
                    <a class="navigation-item" href="/angie-gray/public/admin" title="Dashboard">Dashboard</a>
                    <a class="navigation-item" href="/angie-gray/public/biography" title="Biography">Biography</a>
                    <a class="navigation-item" href="/angie-gray/public/portfolio" title="Portfolio">Portfolio</a>
                    <a class="navigation-item" href="/angie-gray/public/media" title="Media">Media</a>
                </nav>
            </div>
            <footer class="footer">
                <div class="user">
                    <figure class="avatar">
                        <img src="#" alt="Profile image" />
                    </figure>
                    <p class="name">{{ $user->getName() }}</p>
                </div>
                <div class="button">
                    <x-icon.log-out />
                    <a href="/angie-gray/public/admin/logout" title="Log out"></a>
                </div>
            </footer>
        </aside>
    </div>
@endsection
