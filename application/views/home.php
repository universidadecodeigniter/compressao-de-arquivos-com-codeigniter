<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1>Compressão de arquivos com CodeIgniter</h1>
	</div>

	<div class="col-md-12">
		<p class="lead">
			Digite no campo abaixo um texto para adicionar em um arquivo comprimido (ZIP).
		</p>

		<form method="POST" action="<?=base_url('comprimir-texto')?>">
			<div class="form-group">
				<textarea name="texto" class="form-control" rows="10" required></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Comprimir" class="btn btn-success" />
			</div>
		</form>
	</div>
	<div class="col-md-12">
		<p class="lead">
			Para comprimir os arquivos do diretório <em>files</em>, clique <a href="<?=base_url('comprimir-arquivos')?>">aqui</a>.
		</p>

		<?php if ($this->session->flashdata('error') == TRUE): ?>
			<div class="alert alert-error"><?= $this->session->flashdata('error'); ?></div>
		<?php endif; ?>
	</div>

</div>

<?php $this->load->view('commons/rodape'); ?>
