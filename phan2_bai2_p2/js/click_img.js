function enlargeImage(image) {
    image.style.width = "100%";
    image.style.height = "auto";
    image.style.cursor = "zoom-out";
  }
  
  function restoreImage(image) {
    image.style.width = "";
    image.style.height = "";
    image.style.cursor = "default";
  }