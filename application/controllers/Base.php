<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function Index()
	{
		// Carrega a view 'home.php'
		$this->load->view('home');
	}

	// Comprime o texto enviado pelo formulário
	public function ComprimirTexto(){

		$texto = $this->input->post('texto');

		// Adiciona o texto em um arquivo txt
		$this->zip->add_data('meu-texto.txt', $texto);

		// Cria o arquivo ZIP no servidor
		if($this->zip->archive('./files/zip/meu_texto.zip')){
			// Faz o download do arquivo comprimido
			$this->zip->download('meu_texto.zip');
		}else{
			// Define a mensagem de erro a ser exibida para o usuário
			$this->session->set_flashdata('error','Não foi possível gerar o arquivo comprimido.');
			//redireciona para a página principal (home.php)
			redirect();
		}
	}

	// Comprime os arquivos contidos no diretório file
	public function ComprimirArquivos(){

		// Faz a leitura do diretório a ser comprimido
		if($this->zip->read_dir('./files')){
			// Faz o download do arquivo comprimido
			$this->zip->download('meus_arquivos.zip');
		}else{
			// Define a mensagem de erro a ser exibida para o usuário
			$this->session->set_flashdata('error','Não foi possível gerar o arquivo comprimido.');
			//redireciona para a página principal (home.php)
			redirect();
		}
	}

}
