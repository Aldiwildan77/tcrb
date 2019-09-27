<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
		a.bar,
		a.bar:link,
		a.bar:visited,
		a.bar:hover,
		a.bar:focus,
		a.bar:active {
			color: blue;
		}
	</style>
</head>

<body style="text-align: center;background: #fafafa;font-family: 'lato', 'Helvetica Neue', Helvetica, Arial, sans-serif">
	<p style="text-align:center;font-size: 18px">Selamat! Pembayaran Anda atas nama <b><?= $user['nama_lengkap'] ?></b> dengan username <b><?=$user['username']?></b> kategori <b><?=$check?></b> telah kami validasi dan diterima</p>
	<p style="text-align:center;font-size: 15px">Klik link dibawah untuk mengunduh bukti pendaftaran TCRB yang akan digunakan pada saat registrasi ulang saat hari-H (Silahkan login terlebih dahulu ke dalam website TCRB)</p>
	<a style="text-align:center"class="bar" href="<?=$link?>"><?=$link?></a>
	<p style="color:#666666;text-align:center;font-size:14px;line-height:1.5;margin-top:60px">Copyright © TCRB 2019</p>
	<p style="color:#666666;text-align:center;font-size:14px;line-height:1.5">Gedung UKM Universitas Brawijaya Lt. 3.9</p>
	<p style="color:#666666;text-align:center;font-size:14px;line-height:1.5">Universitas Brawijaya</p>
</body>

</html>
