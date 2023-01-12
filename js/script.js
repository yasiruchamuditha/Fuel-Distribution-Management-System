const form = document.getElementById("generate-form");
const qr = document.getElementById("qrcode");

const onGenarateSubmit = (e) => {
  e.preventDefault();
  clearUI();
  const url = document.getElementById("url").value;
  /*const size = document.getElementById("size").value;*/

var size=300;
  if (url === "") {
    alert("Please enter a valid URL");
  } 
  else 
  {
    showSpinner();

    setTimeout(() => {
      hideSpinner();
      generateQRCode(url, size);
      setTimeout(() => {
        const saveUrl = qr.querySelector("img").src;
        createSaveBtn(saveUrl);
      }, 50);
    }, 1000);
  }


const generateQRCode = (url, size) => {
  const qrcode = new QRCode("qrcode", {
    text: url,
    width: size,
    height: size,
  });
};

const showSpinner = function () {
  document.getElementById("spinner").style.display = "block";
};

const hideSpinner = function () {
  document.getElementById("spinner").style.display = "none";
};

const clearUI = function () {
  qr.innerHTML = "";
  const saveBtn = document.getElementById("savelink");
  if (saveBtn) {
    saveBtn.remove();
  }
};

const createSaveBtn = function (saveUrl) {
  const link = document.createElement("a");
  link.id = "savelink";
  link.classList = "download-btn";
  link.href = saveUrl;
  link.download = "qrcode";
  link.innerHTML = "Save Image";
  document.getElementById("generated").appendChild(link);
};

hideSpinner();

form.addEventListener("submit", onGenarateSubmit);
