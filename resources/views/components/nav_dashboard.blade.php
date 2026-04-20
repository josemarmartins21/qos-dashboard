<ul>
    {{-- HOME --}}
    <x-link_menu :active_link="request()->routeIs('home')"  href="{{ route('home') }}" :name="'Home'" :icon="'fa-solid fa-house'"></x-link_menu>

    {{-- DEPOIMENTOS --}}
    <x-link_menu :active_link="request()->routeIs('testimonies.index')" :name="'Depoimentos'" :icon="'fa-brands fa-stack-exchange'" href="{{ route('testimonies.index') }}"></x-link_menu>

    {{-- PERGUNTAS FREQUENTES --}}
    <x-link_menu 
    :active_link="request()->routeIs('questions.index')" 
    href="{{ route('questions.index') }}" 
    :name="'Perguntas Frequentes'"
    :icon="'fa-solid fa-file-circle-question'"
    ></x-link_menu>

    {{-- CLIENTES RENOMADOS --}}
    <x-link_menu :active_link="request()->routeIs('client_prove_socials.index')" href="{{ route('client_prove_socials.index') }}" :name="'Clientes renomados'" :icon="'fa-solid fa-people-roof'">
    </x-link_menu>

    {{-- MENSAGENS DE VISITANTES --}}
    <x-link_menu :active_link="request()->routeIs('visitors.index')" href="{{ route('visitors.index') }}" :name="'Mensagens de Visitantes'" :icon="'fa-solid fa-paper-plane'"></x-link_menu>

    {{-- INFORMAÇÕES DA EMPRESA --}}
    <x-link_menu :active_link="request()->routeIs('company_infos.index')" href="{{ route('company_infos.index') }}" :name="'Informações da Empresa'" :icon="'fa-solid fa-building'"></x-link_menu>
    
    {{-- GERIR USUÁRIOS --}}
    @can('access-admin-area')
        <x-link_menu :active_link="request()->routeIs('users.index')" href="{{ route('users.index') }}" :name="'Gerir Usuários'" :icon="'fa-solid fa-users'"></x-link_menu>
    @endcan
    {{-- TERMINAR SESSÃO --}}
    <li>
        <form action="{{ route('logout') }}" method="post">
            
            @csrf
            
            <div id="btn-logout-container">
                <button type="submit" onclick="return confirm('Tem cereteza que pretende terminar a sessão?')">
                    <i class="fa-solid fa-right-from-bracket"></i> Sair
                </button>
            </div>
        </form>
    </li>
</ul>