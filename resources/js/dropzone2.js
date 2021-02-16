import Axios from "axios";

document.addEventListener('DOMContentLoaded', () => {


    if(document.querySelector('#dropzone2')) {
        Dropzone.autoDiscover = false;


        const dropzone = new Dropzone('div#dropzone2', {
            url: '/archivo/store',
            dictDefaultMessage: 'Sube hasta 10 archivos',
            maxFiles: 10,
            required: true,
            acceptedFiles: ".pdf,.doc,.docx,.xls,.xlsx",
            addRemoveLinks: true,
            dictRemoveFile: "Eliminar Archivo",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            init: function() {
                const galeria1 = document.querySelectorAll('.galeria1');

                if(galeria1.length > 0 ) {
                    galeria1.forEach(archivo => {
                        const archivoPublicado = {};
                        archivoPublicado.size = archivo.size;
                        archivoPublicado.name = archivo.value;
                        archivoPublicado.nombreServidor = archivo.value;

                        this.options.addedfile.call(this, archivoPublicado);
                        this.options.thumbnail.call(this, archivoPublicado, `/storage/archivos/documentos.jpg`);

                        archivoPublicado.previewElement.classList.add('dz-success');
                        archivoPublicado.previewElement.classList.add('dz-complete');


                    })
                }
            },
            success: function(file, respuesta) {
                // console.log(file);
                console.log(respuesta);
                file.nombreServidor = respuesta.archivo;
            },
            sending: function(file, xhr, formData) {
                formData.append('uuid', document.querySelector('#uuid').value )
                // console.log('enviando');
            },
            removedfile: function(file, respuesta) {
                console.log(file);

                const params = {
                    archivo: file.nombreServidor,
                    uuid: document.querySelector('#uuid').value
                }

                axios.post('/archivo/destroy', params )
                    .then( respuesta => {
                        console.log(respuesta)

                        // Eliminar del DOM
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    })
            }
        });
    }
})
