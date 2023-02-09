var screenW = window.screen.availWidth;
var screenH = window.screen.availHeight;
var container = document.querySelectorAll(".container");
var header_H = screenW/100*6.8;
if (window.screen.availHeight*0.13 <= header_H){
   container.forEach(conta => {
      conta.style.top= "6.8vw";
      conta.style.height = (screenH-header_H)+"px";
      console.log (screenH);
   });
};

const inputs = document.querySelectorAll('.input');
var img_upload = document.getElementById("img-upload");
var image_uploaded = false;
var profile_pic_div = document.getElementById("profile-pic-div");
var img_upload_div_p = document.getElementById("img-upload-div-p");
var img_upload_div = document.getElementById('img-upload-div');

// upload recipe 
var food_img_upload = false;
var upload_pic = document.getElementById('upload-pic');
var upload_pic_div = document.getElementById("upload-pic-div");
var upload_pic_div_p = document.getElementById("upload-pic-div-p");

// Signup Password eyes
const password_open = document.querySelectorAll(".password_open");
const password_closed = document.querySelectorAll(".password_closed");

function highlight() {
    document.getElementById('menu').style.fontWeight = "bold";
}

function focusFunc(){
    let parent=this.parentNode.parentNode;
    parent.classList.add('focus');
}
function blurFunc(){
    let parent=this.parentNode.parentNode;
    if (this.value == ""){
        parent.classList.remove('focus');
    }
}
inputs.forEach(input=> {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});

/* Took https://levelup.gitconnected.com/preview-an-image-before-uploading-using-javascript-953557f54154 as a reference */
const previewImage = (event) => {
    /* Get the selected files. */
    const imageFiles = event.target.files;
    /* Count the number of files selected. */
    const imageFilesLength = imageFiles.length;
    /* If at least one image is selected, then proceed to display the preview. */
    if (imageFilesLength > 0) {
        /* Get the image path. */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /* Select the image preview element. */
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        /* Assign the path to the image preview element. */
        imagePreviewElement.src = imageSrc;
        /* Show the element by changing the display value to "block". */
        imagePreviewElement.style.display = "block";
        img_upload_div.style.visibility = "hidden";
        img_upload_div_p.innerHTML = "CHANGE IMAGE(JPG or PNG)";
        image_uploaded = true;
    }
};

if (image_uploaded) {
    profile_pic_div.addEventListener("mouseover", ()=> {
        img_upload_div.style.visibility = "visible";
    });
    profile_pic_div.addEventListener("mouseout", ()=> {
        img_upload_div.style.visibility = "hidden";
    });
}

// Food Recipe 
const foodPreviewImage = (event) => {
    /* Get the selected files. */
    const imageFiles = event.target.files;
    /* Count the number of files selected. */
    const imageFilesLength = imageFiles.length;
    /* If at least one image is selected, then proceed to display the preview. */
    if (imageFilesLength > 0) {
        /* Get the image path. */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /* Select the image preview element. */
        const imagePreviewElement = document.querySelector("#food-preview-selected-image");
        /* Assign the path to the image preview element. */
        imagePreviewElement.src = imageSrc;
        /* Show the element by changing the display value to "block". */
        imagePreviewElement.style.display = "block";
        upload_pic.style.border = "none";
        upload_pic_div.style.visibility = "hidden";
        upload_pic_div_p.innerHTML = "CHANGE IMAGE(JPG or PNG)";
        food_img_upload = true;
    }
};

// 
if (food_img_upload) {
    upload_pic.addEventListener("mouseover", ()=> {
        upload_pic_div.style.visibility = "visible";
    });
    upload_pic.addEventListener("mouseout", ()=> {
        upload_pic_div.style.visibility = "hidden";
    });
}

// For the search function, Used https://stackoverflow.com/questions/29943/how-to-submit-a-form-when-the-return-key-is-pressed as reference
function checkSubmit(e) {
    if(e && e.keyCode == 13) {
       document.forms[0].submit();
    }
 }

// Signup Password eyes
password_open.forEach(password => password.addEventListener("click", ()=> {
    password.classList.remove('focus');
    password.parentNode.lastElementChild.classList.add("focus");
    password.parentNode.children[1].type = "text";
}));

password_closed.forEach(password => password.addEventListener("click", ()=> {
    password.classList.remove('focus');
    password.parentNode.children[2].classList.add("focus");
    password.parentNode.children[1].type = "password";
}));

// Interval Reloading
function reloading() {
    location.reload();
}
