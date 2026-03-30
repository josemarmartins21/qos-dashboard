<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/estilos/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/svg">
    <script src="https://kit.fontawesome.com/8e770ce0b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="logo-container">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('imagens/qos-logo-sem-fundo.png')); ?>" alt="Logo da QoS Tel">
            </a>
        </div>


        <div id="menu-hamburguer">
            <i class="fa-solid fa-bars"></i>
        </div>

        <nav id="menu">
            <ul>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="ficha">
            <img src="<?php echo e(asset('imagens/guanabara-perfil.jpeg')); ?>" alt="Josemar Martins" class="foto">
            <h1>Josemar Martins</h1>
            <div id="social">
               <ul>
                    <li>
                        <a href="<?php echo e(route('home')); ?>">Home <i class="fa-solid fa-house"></i></a>
                    </li>
                    <li>
                        <a href="#">Dashboard <i class="fa-solid fa-grip"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('testimonies.index')); ?>">Depoimentos <i class="fa-brands fa-stack-exchange"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('questions.index')); ?>">Perguntas Frequentes <i class="fa-solid fa-file-circle-question"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('client_prove_socials.index')); ?>">Clientes renomados <h3><i class="fa-solid fa-people-roof"></i> </h3></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('visitors.index')); ?>">Mensagens <i class="fa-solid fa-message"></i></a>
                    </li>
                </ul>
            </div>
        </section>
        <?php echo $__env->yieldContent('content'); ?>
    </main> 
    <script src="/scripts/script.js"></script>
</body>
</html><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/layouts/app.blade.php ENDPATH**/ ?>