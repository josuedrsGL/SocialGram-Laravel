import "./bootstrap";
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload your image here",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Delete file",
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on("sending", (file, xhr, formData) => {
    console.log(file);
});

dropzone.on("success", function (file, response) {
    console.log(response);
});

dropzone.on("error", function (file, message) {
    console.log(message);
});

dropzone.on("removedfile", function (file, message) {
    console.log("File removed");
});
