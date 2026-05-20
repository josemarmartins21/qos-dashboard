<?php

namespace App\helpers;

/**
 * Função para obter o caminho do diretório de imagens, 
 * dependendo do ambiente (produção ou  
 * desenvolvimento).
 * 
 * @return string O caminho do diretório de imagens.
 */
function getEnviromentFilePath(?string $folder = ''): string 
{
    if (! IS_PRODUCTION) {
        return 'C:\Users\josimarmartins21\Documents\GitHub\qostel\assets\images' . 
        DIRECTORY_SEPARATOR .$folder;
    }

    return '/home/qostelco/public_html/assets/images' . DIRECTORY_SEPARATOR . $folder;
}