<aside class="side-panel">
    <header class="header">
        <x-logo />
    </header>
    <div class="content">
        <nav class="navigation">
            <a class="navigation-item" href="/admin" title="Dashboard">
                <x-icon.home />
                <span>Dashboard</span>
            </a>
            <a class="navigation-item" href="/admin/biography" title="Biography">
                <x-icon.feather />
                <span>Biography</span>
            </a>
            <a class="navigation-item" href="/admin/portfolio" title="Portfolio">
                <x-icon.briefcase />
                <span>Portfolio</span>
            </a>
            <a class="navigation-item" href="/admin/media" title="Media">
                <x-icon.image />
                <span>Media</span>
            </a>
        </nav>
    </div>
    <footer class="footer">
        <div class="user">
            <figure class="avatar">
                <img src="#" alt="Profile image" />
            </figure>
            <p class="name">{{ $user->getName() }}</p>
        </div>
        <div class="button-round">
            <x-icon.log-out />
            <a href="/admin/logout" title="Log out"></a>
        </div>
    </footer>
</aside>
