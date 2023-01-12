/*const inputValue = document.querySelector('.text-field')*/
const inputValue = document.querySelector('.text-field')
const generateBtn = document.querySelector('.gen')
const mode = document.querySelectorAll('.mode li')
const checkBox = document.querySelector('.checkbox')
const uplaod = document.querySelector('.upload')
const fileSelector = document.querySelector('.file-selector')
const qrContainer = document.querySelector('.qr-container')
var download = document.querySelectorAll('.download li')

// default properties for QR Code
var properties = {
        width: 250,
        height: 250,
        type: "svg",
        margin: 10,
        data: '',
        image: '',
        backgroundOptions: {
            color: "white",
        },
        dotsOptions: {
            color: "#505ADC",
            type: "extra-rounded"
        },
        cornersSquareOptions:{
            type: "extra-rounded"
        },
        cornersDotOptions:{
            type: "dot"
        },
        imageOptions: {
            margin: 0,
            imageSize: 0.9
        }
}

// On click generate button
generateBtn.onclick = () => {
    generateQr()
}


// also generate QR Code on changing mode
mode[0].onclick = () => {
    properties.dotsOptions.color = 'black'
    properties.dotsOptions.type = 'square'
    properties.cornersSquareOptions.type = 'square'
    properties.cornersDotOptions.type = 'square'
    generateQr(0)
}

mode[1].onclick = () => {
    properties.dotsOptions.color = '#505ADC'
    properties.dotsOptions.type = 'extra-rounded'
    properties.cornersSquareOptions.type = 'extra-rounded'
    properties.cornersDotOptions.type = 'dot'
    generateQr(1)
}

mode[2].onclick = () => {
    properties.dotsOptions.color = '#505ADC'
    properties.dotsOptions.type = 'dots'
    properties.cornersSquareOptions.type = 'dot'
    properties.cornersDotOptions.type = 'dot'
    generateQr(2)
}

// this will set the mode button on which button is clicked
function resetModeButton(v){
    for(var i = 0; i < 3; i++){
        if(v == i){
            mode[i].classList.add('active')
        }else{
            mode[i].classList.remove('active')
        }
    }
}

// also generate QR Code on click checkbox
checkBox.onclick = () => {
    generateQr()
}

// also generate QR Code file select
uplaod.onclick = () => fileSelector.click()

fileSelector.onchange = () => {
    generateQr()
}

function generateQr(v) {
    if(inputValue.value){
        // if input field is not empty
        if(checkBox.checked){
            // if checkbox is checked
            if(fileSelector.value !== ''){
                // if user uploaded logo is available
                var imageBlob = new Blob([fileSelector.files[0]], { type: fileSelector.files[0].type });
                var imageUrl = window.URL.createObjectURL(imageBlob);
                properties.image = imageUrl
            }else{
                // if user uploaded logo is not available
                if(properties.dotsOptions.color == 'black'){
                    // for black theme
                    properties.image = 'default-black-logo.svg'
                }else{
                    // for blue theme
                    properties.image = 'default-blue-logo.svg'
                }
            }
        }else{
            // if checkbox is unchecked
            properties.image = ''
        }
        qrContainer.innerHTML = ''
        properties.data = inputValue.value
        const qr = new QRCodeStyling(properties)
        qr.append(qrContainer);
        // change button
        if(v || v == 0){ resetModeButton(v) }
        // download
        download[0].onclick = () => qr.download({ name: "qr-code", extension: "png" });
        download[1].onclick = () => qr.download({ name: "qr-code", extension: "jpg" });
    }
}