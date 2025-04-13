<header class="header">
    <div class="header-left">
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Rechercher...">
        </div>
        <button class="btn btn-primary">search</button>
    </div>
    <div class="header-actions">
        <button class="theme-toggle" id="themeToggle">
            <i class="fas fa-moon"></i>
        </button>
        <div class="notifications">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </div>
        <div class="user-menu">
            <img src="{{ Auth::user()->getProfileLive() }}" style="width: 70px;height:70px;object-fit:cover;border-radius:50%;" alt="{{ Auth::user()->name }}">
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
    </div>
</header>