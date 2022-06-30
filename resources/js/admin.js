require("./bootstrap");

window.boolpress = {
    currentForm: null,
    postId: null,
    openModal(e,id) {
        e.preventDefault();
        this.postId = id;
        this.currentForm = e.currentTarget.parentNode;
        $("#deleteModal-body").html(
            `Sei sicuro di voler eliminare l'elemento con id: ${this.postId}`
        );
        $("#deleteModal").modal("show");
    },

    previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src =
                oFREvent.target.result;
        };
    },
    submitForm() {
        this.currentForm.submit();
    }
};
