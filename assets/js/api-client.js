$(document).ready(async function (e) {
	// use this js synchronously

	let instagram = await loadInstagramApi()
	if (!instagram) return false;

	await instagram.forEach((element, index) => {
		let instagramHTML = $(`img.instafoto[data-loop=${index}]`)

		instagramHTML.attr('src', element.url)
		instagramHTML.attr('data-link', element.link)
		instagramHTML.attr('data-width', element.width)

	});

})

var url = $(".kotak").data('url')

const loadInstagramApi = () => {
	return new Promise(async (resolve, reject) => {
		try {
			let { data: { data: result } } = await axios.get(`https://api.instagram.com/v1/users/self/media/recent/?access_token=5519345197.72654b6.ef2159a15d30446088c7f9a8c0596a55&count=9`)
			if (!result) {
				console.log("Nothing data has been loaded")
				reject(false)
			}

			let instagramRawData = result.map((currResult, index) => {
				return {
					"url": currResult.images.standard_resolution.url,
					"width": currResult.images.standard_resolution.width,
					"link": currResult.link,
					"caption": currResult.caption
				}
			})

			resolve(instagramRawData);
		} catch (error) {
			console.log(error);
			reject(false)
		}
	})
}

const generatePdfPerorangan = (username, token, rawData) => {
	let data = jQuery.parseJSON(rawData)
	var doc = new jsPDF('p', 'mm', 'a4', true)

	let img = new Image()
	img.src = url + 'assets/img/pdf/perorangan.png'
	doc.addFileToVFS('../fonts/Arial.ttf', 'Arial');
	doc.addFont('Arial', 'arial', 'normal');
	doc.setFont('arial', 'normal')
	doc.setFontSize(12)
	doc.addImage(img, 'PNG', 0, 0, 210, 297, undefined, 'FAST')
	img.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://tcrb.ub.ac.id/absensi/orang/${token}`
	console.log("lewat")
	doc.addImage(img, 'PNG', 155.5, 44.5, 31.5, 31.5, undefined, 'FAST')
	doc.text(data['user']['nama_lengkap'], 72, 50.5)
	doc.text(data['user']['instansi'], 72, 57.5)
	doc.text(data['user']['no_telepon'], 72, 65.5)
	doc.text(data['status']['tanggal_bayar'], 72, 73.5)
	let pemain = []
	for (let index = 0; index < data['pemain'].length; index++) {
		let row = [index + 1, data['pemain'][index]['nama_pemain'], data['pemain'][index]['nama_kategori']]
		pemain.push(row);
	}

	doc.autoTable({
		theme: 'plain',
		headStyles: {
			fillColor: [100, 100, 100],
			lineWidth: 0.3,
			lineColor: 0,
			halign: 'center'
		},
		startY: 107,
		margin: 23,
		head: [['No', 'Nama Pemain', 'Kategori']],
		bodyStyles: {
			fillColor: [255, 255, 255],
			lineWidth: 0.3,
			lineColor: 0
		},
		tableWidth: 165,
		body: pemain
	})
	doc.save("Bukti-Pendaftaran-TCRB-" + username + ".pdf")

	$('.loading').html('<h3 class="text-center">PDF selesai dibuat</h3>');
	Swal.fire({
		type: 'success',
		title: 'Selesai',
		text: 'PDF telah selesai dibuat'
	})
}

const generatePdfBeregu = (username, token, rawData) => {
	let data = jQuery.parseJSON(rawData)
	var doc = new jsPDF('p', 'mm', 'a4', true)

	var img = new Image()
	img.src = url + 'assets/img/pdf/beregu.png'
	doc.addFileToVFS('../fonts/Arial.ttf', 'Arial');
	doc.addFont('Arial', 'arial', 'normal');
	doc.setFont('arial', 'normal')
	doc.setFontSize(12)
	doc.addImage(img, 'PNG', 0, 0, 210, 297, undefined, 'FAST')
	img.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://tcrb.ub.ac.id/absensi/regu/${token}`
	doc.addImage(img, 'PNG', 155.5, 44.5, 31.5, 31.5, undefined, 'FAST')
	doc.text(data['user']['nama_lengkap'], 72, 50.5)
	doc.text(data['user']['instansi'], 72, 57.5)
	doc.text(data['user']['no_telepon'], 72, 65.5)
	doc.text(data['regu'][0]['tanggal_bayar'], 72, 73.5)
	let regu = []
	for (let index = 0; index < data['regu'].length; index++) {
		let row = [index + 1, data['regu'][index]['nama'], data['regu'][index]['namaPaket']]
		regu.push(row);
	}

	doc.autoTable({
		theme: 'plain',
		headStyles: {
			fillColor: [100, 100, 100],
			lineWidth: 0.3,
			lineColor: 0
		},
		startY: 107,
		margin: 23,
		head: [['No', 'Nama Regu', 'Kategori']],
		bodyStyles: {
			fillColor: [255, 255, 255],
			lineWidth: 0.3,
			lineColor: 0
		},
		tableWidth: 165,
		body: regu
	})

	if(data['jumlahOfficial'].length > 0){
		let official = []
		for (let index = 0; index < data['official'].length; index++) {
			if(data['official'][index]['nama'] == null || data['official'][index]['nama'] === "" ){
				continue
			}
				let row = [index + 1, data['official'][index]['nama'], data['official'][index]['namaPaket']]
				official.push(row);
		}

		doc.autoTable({
			theme: 'plain',
			headStyles: {
				fillColor: [100, 100, 100],
				lineWidth: 0.3,
				lineColor: 0
			},
			startY: 221,
			margin: 23,
			head: [['No', 'Nama Official', 'Kategori']],
			bodyStyles: {
				fillColor: [255, 255, 255],
				lineWidth: 0.3,
				lineColor: 0
			},
			tableWidth: 165,
			body: official
		})
	}

	doc.save("Bukti-Pendaftaran-TCRB-" + username + ".pdf")

	$('.loading').html('<h3 class="text-center">PDF selesai dibuat</h3>');
	Swal.fire({
		type: 'success',
		title: 'Selesai',
		text: 'PDF telah selesai dibuat'
	})
}
