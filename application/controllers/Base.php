<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function Index()
	{
		$this->load->view('home');
	}

	public function ComprimirTexto(){

		$texto = $this->input->post('texto');

		// Adiciona o texto em um arquivo txt
		$this->zip->add_data('meu-texto.txt', $texto);

		// Cria o arquivo ZIP no servidor
		if($this->zip->archive('./files/zip/meu_texto.zip')){
			// Faz o download do arquivo comprimido
			$this->zip->download('meu_texto.zip');
		}else{
			$this->session->set_flashdata('error','Não foi possível gerar o arquivo comprimido.');
			redirect();
		}
	}

	public function ComprimirArquivos(){

		// Faz a leitura do diretório a ser comprimido
		if($this->zip->read_dir('./files')){
			// Faz o download do arquivo comprimido
			$this->zip->download('meus_arquivos.zip');
		}else{
			$this->session->set_flashdata('error','Não foi possível gerar o arquivo comprimido.');
			redirect();
		}
	}

}
