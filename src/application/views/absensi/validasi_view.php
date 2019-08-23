<?php if ($this->session->flashdata('validate')) : ?>
<script type="text/javascript">
	let check = "<?= $status ?>" === 'success' ? 'Berhasil' : 'Gagal'
	let kategori = "<?= $kategori; ?>"

	Swal.fire({
		type: "<?= $status ?>",
		title: "<h5 class='font-weight-bold' style='font-size: 20px'><?= $this->session->flashdata('validate'); ?></h5>",
		text: `Registrasi Ulang ${kategori} ${check.trim()}`
	}).then(res => {
		window.location.href = "<?= base_url(); ?>"
	})
</script>
<?php endif; ?>

<div class="bg-white halaman-user" style="height: calc(100vh - 100px)">

</div>
