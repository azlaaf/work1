const uploadedImageDiv = document.getElementById("uploadedImage");
const fileUpload = document.getElementById("fileUpload");
fileUpload.addEventListener("change", getImage, false);

function getImage() 
{
	console.log("image", this.files[0]);
	const iamgeToProcess = this.files[0];

	let newImg = new Image(iamgeToProcess.width, iamgeToProcess.height);
	newImg.src = URL.createObjectURL(iamgeToProcess);
	uploadedImageDiv.style.border = "4px solid #DCB514";
	newImg.style.height = "3cm";
	uploadedImageDiv.appendChild(newImg);

	processImage();

}
function prcessImage()
{

}