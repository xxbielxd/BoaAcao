<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imagens
 *
 * @author Gabriel
 */
class Imagens{
	
	private $img;
	private $nome;
	public function setImagem($img){
		$this->img = $img;
	}
	public function saveImage(){
		
		$_UP['pasta'] = 'img/';
	
		$_UP['tamanho'] = 1024 * 1024 * 10; // 10Mb
	// Array com as extensÃµes permitidas
		$_UP['extensoes'] = array('jpg', 'png', 'gif');
	// Renomeia o arquivo? (Se true, o arquivo serÃ¡ salvo como .jpg e um nome Ãºnico)
		$_UP['renomeia'] = true;
	// Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		$_UP['erros'][5] = 'Por favor, envie arquivos com as seguintes extenções: jpg, png ou gif.';
		$_UP['erros'][6] = 'O arquivo enviado é muito grande, envie arquivos de atÃ© 2Mb.';
		$_UP['erros'][7] = 'Não foi possível enviar o arquivo, Tente novamente';
		$_UP['erros'][8] = 'Cadastrado Com sucesso!';
		$_UP['erros'][9] = 'Erro no Cadastro!';
	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
		if ($this->img['error'] != 0) {
			$erro = $_UP['erros'][$this->img['error']];
			Error::setError($erro);
                        return FALSE;
		}
	// Caso script chegue a esse ponto, nÃ£o houve erro com o upload e o PHP pode continuar
	// Faz a verificaÃ§Ã£o da extensÃ£o do arquivo
		@$extensao = strtolower(end(explode('.', $this->img['name'])));
		if (array_search($extensao, $_UP['extensoes']) === false) {
			Error::setError($_UP['erros'][5]);
			return FALSE;			
                        
		}
	// Faz a verificaÃ§Ã£o do tamanho do arquivo
		if ($_UP['tamanho'] < $this->img['size']) {
			Error::setError($_UP['erros'][6]);
			return FALSE;			
		}
	// O arquivo passou em todas as verificaÃ§Ãµes, hora de tentar movÃª-lo para a pasta
	// Primeiro verifica se deve trocar o nome do arquivo

		if (move_uploaded_file($this->img['tmp_name'], $_UP['pasta'] . $this->nome)) {
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			return TRUE;
		
		
		} else {
		// NÃ£o foi possÃ­vel fazer o upload, provavelmente a pasta estÃ¡ incorreta
			Error::setError($_UP['erros'][7]);
			return FALSE;
		}		
	}	
	
	public function getNome(){
		if($this->nome == NULL){
			$this->setNome();
		}		
		return $this -> nome;
	}
	public function setNome(){		
			
			$this->nome = md5(time()).'.jpg';
			
	}
        public function cancel(){
            if (!unlink("img/".$this ->getNome()))
            {                
                return FALSE;
            }           
            return TRUE;
            
        }
}


