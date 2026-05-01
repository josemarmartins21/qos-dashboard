@extends('web_page.layouts.app')

@section('content')
        <!-- Hero -->
            <div id="background" style="background-image: url({{ asset('images/company_images/' . $companyInfos['HeroImage']?->value) }})">
                <div class="fundo-preto">
                <header>
                    <div id="logo">
                        @isset($companyInfos['logotipo']->value)
                            <a href="index.html">
                                <img src="{{ asset('images/company_images/' . $companyInfos['logotipo']?->value) }}" alt="logo da qos_tel">
                            </a>
                        @endisset
                    </div>
                    
                    <div class="hamburguer-container">
                        <i class="fa-solid fa-bars hamburguer" id="menu-hamburguer"></i>
                    </div>
                    
                    <menu id="menu-container">
                        <ul class="lista-links">
                            <li class="link-target">
                                <a href="#background" class="link">Home</a>
                            </li>
                            <li class="link-target">
                                <a href="#sobre" class="link">Quem Somos</a>
                            </li>
                            <li class="link-target">
                                <a href="#diferenciais" class="link">Serviços</a>
                            </li>
                            <li class="link-target">
                                <a href="#prova-social-container" class="link">Clientes</a>
                            </li>
                            <li class="link-target">
                                <a href="{{ route('visitors.create') }}" class="link">Contato</a>
                            </li>
                            <li class="link-target">
                                <a href="#perguntas" class="link">Perguntas Frequentes</a>
                            </li>
                        </ul>
                    </menu>

                </header>
                
                    <section id="hero">
                        <h1>Internet ultra rápida para a sua casa</h1>
                        <h3>
                            Internet sem fios, sem limites e sem interrupções. Velocidade máxima para tudo o que você precisa, com planos ilimitados que cabem no seu bolso
                        </h3>
                        <a href="#diferenciais">Ver Serviços</a>
                    </section>
                    <a href="https://wa.me/244{{ $companyInfos['whatsapp']?->value }}?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20planos%20de%20internet." class="float-btn">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
        <!-- Secção da empresa -->
        <section id="sobre">
            <h2>Quem Somos?</h2>
            
            <article>
                <p>
                    {{ $companyInfos['sobre']?->value }}

                </p>
            </article>
        </section>
        <!-- Secção de diferenciais da qos -->
        <section id="diferenciais">
            <h2>Diferenciais da QoS Tel para outras ISP</h2>

            <article>
                    <aside class="difereciais-card">
                        <i class="bi bi-wifi"></i>
                        <span>Rede ilimitada</span>

                        <p>
                            <strong>Internet 100% ilimitada</strong>, navegue sem preocupações com consumo de dados
                        </p>
                    </aside>

                    <aside class="difereciais-card">
                        <i class="bi bi-tools"></i>
                        <span>Cobertura Geográfica</span>

                        <p>
                            Cobertura em toda <strong>Luanda</strong> e em algumas zonas do <strong>Ícolo e Bengo</strong>
                        </p>
                    </aside>

                    <aside class="difereciais-card">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Instalação rápida</span>      
                        
                        <p>
                            <strong>Instalação rápida e simples</strong>, para você começar a navegar em pouco tempo.
                        </p>
                    </aside>
            </article>
        </section>
                <!-- Prova social -->
        <section id="prova-social-container">
            @include('components.page.clientes_renomados')
        </section>
                <!-- Secção de depoimentos -->
        <section id="depoimento-de-clientes">
            @include('components.page.testimonies')
        </section>

                <!--  secção de perguntas e respostas -->
        <section id="perguntas">
            @include('components.page.questions')
        </section>

        <!-- Secção de localização -->
        <section id="localizacao">
            <h2>Nossa Localização</h2>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.5568792840413!2d13.294256675142293!3d-8.920721091598455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f75ff2dc8bad%3A0xd6c0cc35f95e9775!2sQoS%20Tel%2C%20Qualidade%20de%20Servi%C3%A7os%20em%20Telecomunica%C3%A7%C3%B5es!5e0!3m2!1spt-PT!2sao!4v1764606706134!5m2!1spt-PT!2sao" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section id="suporte">
            <p>Para entrar em contato conosco, envie uma mensagem para o nosso Whatsapp</p>
            
        <a href="https://wa.me/244{{ $companyInfos['whatsapp']?->value ?? '' }}?text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20planos%20de%20internet." target="_blank" class="whatsapp-link">
            <i class="bi bi-whatsapp"></i> Fale conosco pelo WhatsApp
        </a>
        </section>
@endsection