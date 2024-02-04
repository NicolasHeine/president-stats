<nav class="adminMenu">
    <ul class="adminMenu__list">
        <li class="adminMenu__item">
            <details @if(str_starts_with(Request::url(), route('admin.users'))) open @endif >
                <summary>
                    <span>Utilisateur</span>
                    @include('_icons.dropdown')
                </summary>
                <ul class="adminMenu__sublist">
                    <li class="adminMenu__subitem">
                        <a href="{{ route('admin.users') }}" @class(['--active' => (Request::url() == route('admin.users'))])>Voir tous les utilisateurs</a>
                    </li>
                    <li class="adminMenu__subitem">
                        <a href="{{ route('admin.users.create') }}" @class(['--active' => (Request::url() == route('admin.users.create'))])>Ajouter un utilisateurs</a>
                    </li>
                </ul>
            </details>
        </li>
        <li class="adminMenu__item">
            <details @if(str_starts_with(Request::url(), route('admin.players'))) open @endif >
                <summary>
                    <span>Joueurs</span>
                    @include('_icons.dropdown')
                </summary>
                <ul class="adminMenu__sublist">
                    <li class="adminMenu__subitem">
                        <a href="{{ route('admin.players') }}" @class(['--active' => (Request::url() == route('admin.players'))])>Voir tous les joueurs</a>
                    </li>
                    <li class="adminMenu__subitem">
                        <a href="{{ route('admin.players.create') }}" @class(['--active' => (Request::url() == route('admin.players.create'))])>Ajouter un joueur</a>
                    </li>
                </ul>
            </details>
        </li>
        <li class="adminMenu__item">
            <details @if(str_starts_with(Request::url(), route('admin.games'))) open @endif >
                <summary>
                    <span>Parties</span>
                    @include('_icons.dropdown')
                </summary>
                <ul class="adminMenu__sublist">
                    <li class="adminMenu__subitem">
                        <a href="{{ route('admin.games') }}" @class(['--active' => (Request::url() == route('admin.games'))])>Voir toutes les parties</a>
                    </li>
                    <li class="adminMenu__subitem">
                        <a href="{{ route('admin.games.create') }}" @class(['--active' => (Request::url() == route('admin.games.create'))])>Ajouter une partie</a>
                    </li>
                </ul>
            </details>
        </li>
    </ul>
</nav>
