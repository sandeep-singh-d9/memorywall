<template>
    <div>
        <div class="modal-header">
            <h5 class="modal-title">Upload image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img v-if="userImage != ''" :src="userImage" alt="Red dot" style="height:100px;width:100px;" />
        </div>
        <div class="modal-footer">
            <input type="file" class="form-control"  name="image" @change="onImageChange" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            userImage :''
        }
    },
    methods:{
        onImageChange(e){
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.uploadImage(files[0]);
        },
        uploadImage(imageData){
            var reader = new FileReader()
            var vm = this

            reader.onload = (e) => {
                vm.userImage = e.target.result
            }
            reader.readAsDataURL(imageData)
        }
    },
}
</script>