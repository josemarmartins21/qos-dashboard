 <footer>
    <div class="informacoes">
        
        <div class="infor">
            <div class="logo-foot">
                <img 
                    src="{{ asset('images/company_images/' . $companyInfos['logotipo']->value) }}" alt="logo da qos_tel"
                >
            </div>

            <a href="{{ route('home') }}" class="zona-restrita">Zona Restrita</a>
        </div>
        <div class="infor">
            <h3>Contactos</h3>
            <p class="barra"></p>
            <p>Em caso de dúvidas ou sugestões, <br>contacte-nos.</p>
            <p>Endereço e Telefones</p>
        </div>
        <div class="infor">
            <h3>Mapa do Site</h3>
            <p class="barra"></p>
            
            <ul>
                <li><a href="#background" class="link-mapa">Inicio</a></li>
                <li><a href="#perguntas" class="link-mapa">Perguntas Frequentes</a></li>
                <li><a href="#sobre" class="link-mapa">Quem Somos</a></li>
                <li><a href="#diferenciais" class="link-mapa">Diferenciais da Empresa</a></li>
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
        </div>
    </div>
    <div class="foot">
        <p>&copy;QoS Tel - {{ date('Y') }} Todos os direitos reservados</p>
    </div>
</footer>