function previewImage() {
  const image = document.querySelector("#image");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}
