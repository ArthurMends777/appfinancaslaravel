<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="nav position-relative">
            <div class=" top-0 right-0">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            WebMoneyManager
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/transacoes">Transações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Histórico de transações</a>
                    </li>
                </ul>
            </div>
            <div class="top-0 right-0">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div :class="{'collapse': !open}" class="navbar-collapse">
        <ul class="navbar-nav">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Menu') }}
            </x-responsive-nav-link>
        </ul>
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="font-weight-medium text-base text-primary">{{ Auth::user()->name }}</div>
                <div class="font-weight-medium text-sm text-secondary">{{ Auth::user()->email }}</div>
            </li>

            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </ul>
    </div>
</nav>
