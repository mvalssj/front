<?php 

//Classe para gerar front end em HTML e bootstrap
class Front {
    //Atributos
    public $titulo;
    public $conteudo;
    public $estilo;
 
    //Métodos
    public function __construct($titulo, $conteudo, $estilo) {
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
        $this->estilo = $estilo;
    }
 
    public function gerarHtml() {
        //Inicia a tag html
        $html = '<html>';
 
        //Inicia a tag head
        $html .= '<head>';
 
        //Insere o título
        $html .= '<title>' . $this->titulo . '</title>';        
 
        //Insere o estilo
        $html .= '<style>' . $this->estilo . '</style>';
 
        //Fecha a tag head
        $html .= '</head>';
 
        //Inicia a tag body
        $html .= '<body>';
 
        //Insere o conteúdo
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="col-12">';
        $html .= $this->conteudo;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
 
        //Fecha a tag body
        $html .= '</body>';
 
        //Fecha a tag html
        $html .= '</html>';
 
        //Retorna o código HTML
        return $html;
    }

    public function gerarTitulo($conteudo, $parametro) {
        //Inicia titilo
        $html .= '<h'.$parametro.' class="text-center text-success">';
 
        //Insere o conteúdo
        $html .= $conteudo;
 
        //Fecha a Titulo
        $html .= '</h'.$parametro.'>';
 
        //Retorna o código HTML
        return $html;
    }
 
    public function gerarTabela($dados) {
        //Inicia a tabela
        $html = '<table class="table table-striped">';
 
        //Cabeçalho
        $html .= '<thead>';
        $html .= '<tr>';
        foreach ($dados[0] as $chave => $valor) {
            $html .= '<th>' . $chave . '</th>';
        }
        $html .= '</tr>';
        $html .= '</thead>';
 
        //Corpo
        $html .= '<tbody>';
        foreach ($dados as $registro) {
            $html .= '<tr>';
            foreach ($registro as $chave => $valor) {
                $html .= '<td>' . $valor . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
 
        //Fecha a tabela
        $html .= '</table>';
 
        //Retorna o código HTML
        return $html;
    }
 
    public function gerarFormulario($campos, $action, $method, $submit_nome, $submit_cor, $display) {
        $html = '<form action="'.$action.'" method="'.$method.'"><div class="row justify-content-center">';
        
        foreach ($campos as $campo) {
            if ($campo['type'] == 'text') {
                $html .= '<div class="col-6">';
                $html .= '<strong><label class="form-label">' . $campo['label'] . '</label></strong>' ;
                $html .= '<input type="text" class="form-control" name="' . $campo['name'].'" value="'.$campo['value'].'" style="display: '.$campo['display'].'">';
                $html .= '</div>';
            } elseif ($campo['type'] == 'date') {
                $html .= '<div class="col-6">';
                $html .= '<strong><label class="form-label">' . $campo['label'] . '</label></strong>';
                $html .= '<input type="date" class="form-control" name="' . $campo['name'].'" value="'.$campo['value'].'">';
                $html .= '</div>';
            } elseif ($campo['type'] == 'textarea') {
                $html .= '<div class="col-6">';
                $html .= '<strong><label class="form-label">' . $campo['label'] . '</label></strong>';
                $html .= '<textarea class="form-control" name="' . $campo['name'].'" value="'.$campo['value'].'"></textarea>';
                $html .= '</div>';
            }
        }
        
        $html .= '</div><p></p><center><button type="submit" class="btn btn-'.$submit_cor.' btn-lg">'. $submit_nome .'</button></center></form>';
    
        return $html;
    }
 
    public function gerarNavbar($itens) {
        //Inicia a navbar
        $html = '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
 
        //Botão de toggle
        $html .= '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
        $html .= '<span class="navbar-toggler-icon"></span>';
        $html .= '</button>';
 
        //Itens da navbar
        $html .= '<div class="collapse navbar-collapse" id="navbarNav">';
        $html .= '<ul class="navbar-nav">';
        foreach ($itens as $item) {
            $html .= '<li class="nav-item">';
            $html .= '<a class="nav-link" href="' . $item['url'] . '">' . $item['label'] . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
 
        //Fecha a navbar
        $html .= '</nav>';
 
        //Retorna o código HTML
        return $html;
    }
  
    public function gerarModal($id, $titulo, $conteudo, $footer) {
        // Iniciando a variável $html com o início da estrutura do modal
        $html = '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="'.$id.'Label" aria-hidden="true">';
        
        // Adicionando a div com a classe "modal-dialog" para dar formato ao modal
        $html .= '<div class="modal-dialog" role="document">';
        
        // Adicionando a div com a classe "modal-content" para dar estilo ao conteúdo do modal
        $html .= '<div class="modal-content">';
        
        // Adicionando o cabeçalho do modal com título e botão de fechamento
        $html .= '<div class="modal-header">';
        $html .= '<h5 class="modal-title" id="'.$id.'Label">'.$titulo.'</h5>';
        $html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        $html .= '<span aria-hidden="true">&times;</span>';
        $html .= '</button>';
        $html .= '</div>';
        
        // Adicionando o corpo do modal com o conteúdo passado como parâmetro
        $html .= '<div class="modal-body">';
        $html .= $conteudo;
        $html .= '</div>';
        
        // Adicionando o rodapé do modal com o conteúdo passado como parâmetro
        $html .= '<div class="modal-footer">';
        $html .= $footer;
        $html .= '</div>';
        
        // Fechando as divs do conteúdo e do formato do modal
        $html .= '</div>';
        $html .= '</div>';
        
        // Fechando a div principal do modal
        $html .= '</div>';
        
        // Retornando o código HTML gerado
        return $html;
    }
       
   
    public function gerarDiv($conteudo, $parametros) {
        //Inicia a div
        $html = '<div class="'.$parametros.'">';
 
        //Insere o conteúdo
        $html .= $conteudo;
 
        //Fecha a div
        $html .= '</div>';
 
        //Retorna o código HTML
        return $html;
    }
 
    public function gerarRodape($conteudo) {
        //Inicia o rodapé
        $html = '<footer class="footer bg-light">';
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="col-12">';
 
        //Insere o conteúdo
        $html .= $conteudo;
 
        //Fecha o rodapé
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</footer>';
 
        //Retorna o código HTML
        return $html;
    }

    public function enviarEmail($para, $copia, $assunto, $corpo){
        include "PHPMailer-5.2.14/PHPMailerAutoload.php";
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->Host = "outlook.office365.com";
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = '';
        $mail->Port = 587;
        $mail->Username = 'sisos@intermaritima.com.br'; 
        $mail->Password = 'Inter2022'; 
        $mail->From = 'sisos@intermaritima.com.br'; 
        $mail->FromName = "SISOS - Relatório de Notas"; 
        $mail->AddAddress($para); 
        $mail->AddCC($copia); 
        $mail->IsHTML(true); 
        $mail->CharSet = 'UTF-8'; 
        $mail->Subject = $assunto; 
        $mail->Body = $corpo; 
        $enviado = $mail->Send(); 
        if ($enviado) 
        { 
            echo "Seu email foi enviado com sucesso!"; 
        } else { 
            echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
        } 
    }

    // Exemplo de envio
    // $para = 'emival.silva@intermaritima.com.br';
    // $copia = '';
    // $assunto = 'Teste de envio';
    // $corpo = 'Corpo do email';
    // enviarEmail($para, $copia, $assunto, $corpo);
 
}

?>