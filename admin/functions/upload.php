<?php
require_once(SRC . 'functions/config.php');

function uploadFile($arrayFile) {
    $fotoFile = $arrayFile;
    $tamanhoOriginal = (int) 0;
    $tamanhoKB  = (int) 0;
    $extensao = (string) null;
    $tipoArquivo  = (string) null;
    $nomeArquivo  = (string) null;
    $nomeArquivoCript  = (string) null;
    $arquivoTEMP  = (string) null;
    $foto  = (string) null;
    
    if($fotoFile['size'] > 0 && $fotoFile['type'] != "") {
        

        $tamanhoOriginal = $fotoFile['size'];
        
        $tamanhoKB = $tamanhoKB / 1024;
        
        $tipoArquivo = $fotoFile['type'];
        
        $nomeArquivo = $fotoFile['name'];
        

        if($tamanhoKB <= TAMANHO_FILE) {
            if(in_array($tipoArquivo, EXTENSOES_PERMITIDAS)) {
                

                $nomeArquivo = pathinfo($fotoFile['name'], PATHINFO_FILENAME);
                
                $nomeArquivoCript = md5($nomeArquivo.uniqid(time()));
                $extensao = pathinfo($fotoFile['name'], PATHINFO_EXTENSION);
                $foto = $nomeArquivoCript.".".$extensao;
                
                $arquivoTEMP = $fotoFile['tmp_name'];

                if(move_uploaded_file($arquivoTEMP, SRC.NOME_DIRETORIO_FILE.$foto)) {
                    return $foto;

                    echo('Erro no upload do arquivo');
                }
                
                
            }
            else {
                echo('Erro no Tipo de arquivo');
            }
        }
        else {
            echo('Erro no tamanho do arquivo');
        }
        
        die;
    }
}

?>