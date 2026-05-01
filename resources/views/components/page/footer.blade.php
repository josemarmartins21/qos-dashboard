 <footer>
    <div class="informacoes">
        
        <div class="infor">
            @isset($companyInfos['logotipo']?->value)
                <div class="logo-foot">
                    <img 
                        src="{{ asset('images/company_images/' . $companyInfos['logotipo']?->value)  }}" alt="logo da qos_tel"
                    >
                </div>
            @endisset

            <a href="{{ route('home') }}" class="zona-restrita">
                <i class="bi bi-lock-fill"></i> Zona Restrita
            </a>
        </div>
        <div class="infor">
            <h3>Contactos</h3>
            <p class="barra"></p>
            <p>Em caso de dúvidas ou sugestões, <br>contacte-nos.</p>
            <p>Endereço e Telefones</p>

            <ul>
                <li><strong>Email:</strong> {{ $companyInfos['email']?->value ?? '' }}</li>
                <li><strong>Telefone:</strong> {{ $companyInfos['phone']?->value ?? '924 910 904' }}</li>
            </ul>
        </div>
        <div class="infor">
            <h3>Mapa do Site</h3>
            <p class="barra"></p>
            
            <ul>
                <li><a href="#background" class="link-mapa">Inicio</a></li>
                <li><a href="#perguntas" class="link-mapa">Perguntas Frequentes</a></li>
                <li><a href="#sobre" class="link-mapa">Quem Somos</a></li>
                <li><a href="#diferenciais" class="link-mapa">Diferenciais da Empresa</a></li>
                <li><a href="{{ route('visitors.create') }}" class="link-mapa">Contacta-nos</a></li>
            </ul>
        </div>
        <div class="infor">
            <h3>Redes Sociais</h3>
            <p class="barra"></p>
            <p>
                Para facilitar o contacto e disseminação das informações, a QoS Tel dispõe de redes sociais
            </p>

            <p>
                Siga nossas redes sociais e mantenha-se informado(a)
            </p>
            
            <div id="redes-container">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="rede-social-card">
                        <i class="bi bi-facebook"></i>
                    </a>


                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="rede-social-card" class="rede-social-card">
                        <i class="bi bi-instagram"></i>
                    </a>
            </div>

            <p class="dev">
                <strong>Desenvolvido por</strong> 
                <a href="https://josemarmartins21.github.io/portifolio" target="_blank">Josimar Martins</a>
            </p>
        </div>
    </div>
    <div class="foot">
        <p>&copy;QoS Tel - {{ date('Y') }} Todos os direitos reservados</p>
    </div>
</footer>