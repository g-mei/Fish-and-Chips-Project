const maxsize = 33554432;
const addFoodImgSize = document.getElementById("add_food_image");
const addPackImgSize = document.getElementById("add_pack_image");

if(addFoodImgSize){
    addFoodImgSize.addEventListener('change', function(){
        if(this.files[0].size > maxsize){
           alert("Image is too large. Maximum file size is 32MB");
           this.value = "";
        };
    });
}

if(addPackImgSize) {
    addPackImgSize.addEventListener('change', function(){
        if(this.files[0].size > maxsize){
            alert("Image is too large. Maximum file size is 32MB");
            this.value = "";
         };
    })
}
