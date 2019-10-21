$(document).ready(async function () {
	// use this js synchronously

	const url = window.location.origin + '/tcrb/'

	loadQrCode("orang", "120ask0sa9021k").then((response) => {
		// console.log(response)
		console.log(response)
		let data = response.data
		let b64Response = btoa(data);
		console.log(b64Response)

		let image = new Image()
		image.src = `data:image/svg+xml;base64,${b64Response}`
		$(".qr-test").html(image)

	}).catch(error => {
		console.log(error)
	})

	let instagram = await loadInstagramApi()
	if (!instagram) return false;

	await instagram.forEach((element, index) => {
		let instagramHTML = $(`img.instafoto[data-loop=${index}]`)

		instagramHTML.attr('src', element.url)
		instagramHTML.attr('data-link', element.link)
		instagramHTML.attr('data-width', element.width)

	});
})

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
					// "heigh": currResult.images.standard_resolution.height,
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

const loadQrCode = (check, token) => {
	return axios.get("http://localhost/tcrb/generate-qr/", {
		check,
		token
	}, {
		headers: {
			'Content-Type': 'application/json'
		}
	})
}

const generatePdfPerorangan = (username, token, rawData) => {
	const url = window.location.origin + '/tcrb/'
	let data = jQuery.parseJSON(rawData)
	// console.log(data)
	// return
	// console.log(data['user']['nama_lengkap'])
	var doc = new jsPDF('p', 'mm', 'a4', true)

	var img = new Image()
	img.src = url + 'assets/img/pdf/perorangan.png'
	doc.addFont('Arial', 'Arial', 'normal');
	doc.setFont('Arial', 'Bold')
	doc.setFontSize(12)
	doc.addImage(img, 'PNG', 0, 0, 210, 297, undefined, 'FAST')
	doc.text(data['user']['nama_lengkap'], 71, 49.5)
	doc.text(data['user']['instansi'], 71, 56.5)
	// img.src = url + 'generate-qr'

	// doc.autoTable({
	// 	theme: 'plain',
	// 	headStyles: {
	// 		fillColor: [100, 100, 100],
	// 		lineWidth: 0.3,
	// 		lineColor: 0
	// 	},
	// 	startY: 50,
	// 	head: [['No', 'Nama', 'Alamat']],
	// 	bodyStyles: {
	// 		fillColor: [255, 255, 255],
	// 		lineWidth: 0.3,
	// 		lineColor: 0
	// 	},
	// 	body: [
	// 		['1', 'Fakhri', 'Malang'],
	// 		['2', 'Dia', 'Malang juga']
	// 	]
	// })
	// doc.save("Bukti-Pendaftaran-TCRB-" + username + ".pdf")
	var string = doc.output('datauristring')
	var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
	var x = window.open();
	x.document.open();
	x.document.write(embed);
	x.document.close();
}

// function generatePdf(username){
// 	console.log(username)
// }
