# ⚙️ Guia de Instalação: QoS Tel CMS

Esta secção descreve como configurar o ambiente de desenvolvimento e colocar a aplicação a funcionar localmente.

*** 

## Pré requisitos

Antes de iniciares, garante que tens os seguintes componentes instalados:
- Runtime/Linguagem: **node.js**, **PHP**.
- Base de dados: **MySQL** 
- Gestor de Pacotes: **composer**

## Passo a Passo

1. Clonar o Repositório

    Começa por descarregar o código para a tua máquina local:

    ```
    git clone https://github.com/josemarmartins21/qos-dashboard.git
    ```

2. Configurar Variáveis de Ambiente
    
    A aplicação utiliza um ficheiro .env para gerir chaves de API e acessos à base de dados.

    - Duplica o ficheiro de exemplo:
       ```
       cp .env.example .env
       ```
    - Abre o ficheiro .env e preenche as credenciais conforme o teu ambiente local.

3. Instalar Dependências

    
        // Dependências do node.js
        npm install

        // Dependências do Laravel
        composer install
     
4. Preparar a Base de Dados
    
    Garante que o serviço da base de dados está ativo e executa os comandos para criar as tabelas:
    ```
    php artisan migrate
    ```

## 🚀 Executar a Aplicação            
Com tudo configurado, podes iniciar o servidor de desenvolvimento:
```
// Node.Js
npm run dev

// Laravel
php artisan serve
```
