$(document).ready(async function () {
	// use this js synchronously

	let instagram = await loadInstagramApi()
	if(!instagram) return false;

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
			let { data: { data : result }} = await axios.get(`https://api.instagram.com/v1/users/self/media/recent/?access_token=5519345197.72654b6.ef2159a15d30446088c7f9a8c0596a55&count=9`)
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
					"caption": currResult.caption.text
				}
			})

			resolve(instagramRawData);
		} catch (error) {
			console.log(error);
			reject(false)
		}
	})
}

const loadQrCode = ({}, params) => {

}

const generatePdf = ({},params) => {

}
