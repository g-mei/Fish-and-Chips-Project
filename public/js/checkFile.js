var maxsize = 33554432;

var addFoodImgSize = document.getElementById("add_food_image");
addFoodImgSize.onchange = function() {
    if(this.files[0].size > maxsize){
       alert("Image is too large. Maximum file size is 32MB");
       this.value = "";
    };
};

var editFoodImgSize = document.getElementById("edit_food_image");
editFoodImgSize.onchange = function() {
    if(this.files[0].size > maxsize){
       alert("Image is too large. Maximum file size is 32MB");
       this.value = "";
    };
};

var addPackImgSize = document.getElementById("add_pack_image");
addPackImgSize.onchange = function() {
    if(this.files[0].size > maxsize){
       alert("Image is too large. Maximum file size is 32MB");
       this.value = "";
    };
};

var addPackImgSize = document.getElementById("edit_pack_image");
addPackImgSize.onchange = function() {
    if(this.files[0].size > maxsize){
       alert("Image is too large. Maximum file size is 32MB");
       this.value = "";
    };
};