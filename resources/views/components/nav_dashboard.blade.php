<ul>
    <x-link_menu :borda="route('home') === 'http://127.0.0.1:8000'" :name="'Home'" href="{{ route('home') }}" >
        
    </x-link_menu>
    
    <x-link_menu :borda="route('home') === '#'" href="#" :name="'Dashboard'">
        
    </x-link_menu>
    
    <x-link_menu :borda="route('testimonies.index') === 'http://127.0.0.1:8000'" href="{{ route('testimonies.index') }}" :name="'Depoimentos'">
        
    </x-link_menu>
    
    <x-link_menu :borda="route('questions.index') === 'http://127.0.0.1:8000'" href="{{ route('questions.index') }}" :name="'Perguntas Frequentes'">
        
    </x-link_menu>
  
    <x-link_menu :borda="route('questions.index') === 'http://127.0.0.1:8000'" href="{{ route('questions.index') }}" :name="'Clientes renomados'">
        
    </x-link_menu>

    <x-link_menu :borda="route('visitors.index') === 'http://127.0.0.1:8000'" href="{{ route('visitors.index') }}" :name="'Visitantes'">
        
    </x-link_menu>

    <x-link_menu :borda="route('company_infos.index') === 'http://127.0.0.1:8000'" href="{{ route('company_infos.index') }}" :name="'Informações da Empresa'">
        
    </x-link_menu>


   {{--  <li>
        <a >Depoimentos <i class="fa-brands fa-stack-exchange"></i></a>
    </li> --}}
  {{--   <li>
        <a href="{{ route('questions.index') }}"> <i class="fa-solid fa-file-circle-question"></i></a>
    </li> --}}
  {{--   <li>
        <a >Clientes renomados <h3><i class="fa-solid fa-people-roof"></i> </h3></a>
    </li> --}}
{{--     <li>
        <a href="{{ route('visitors.index') }}">Mensagens <i class="fa-solid fa-message"></i></a>
    </li> --}}
{{--     <li>
        <a href="{{ route('company_infos.index') }}">Informações da Empresa <i class="fa-solid fa-building"></i></a>
    </li> --}}
    @can('adm')
        <x-link_menu :borda="route('users.index') === 'http://127.0.0.1:8000'" href="{{ route('users.index') }}" :name="'Gerir Usuários'">
        
        </x-link_menu>
        {{-- <li>
            <a href="{{ route('users.index') }}">Usuários <i class="fa-solid fa-user-group"></i></a>
        </li> --}}
    @endcan
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