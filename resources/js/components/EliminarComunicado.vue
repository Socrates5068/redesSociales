<template>
    <input 
        type="submit" 
        class="btn btn-danger d-block w-100 mb-2" 
        value="Eliminar x" 
        v-on:click="eliminarComunicado"
        />
</template>

<script>
export default {
    props: ['comunicadoId'],
    methods: {
        eliminarComunicado(){
            this.$swal({
                title: '¿Desea eliminar este comunicado?',
                text: "Una ves eliminada, no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result)=>{
                if (result.value){
                    const params = {
                        id: this.comunicadoId
                    }

                    //Enviar la petición al servidor para eliminar el comunucado
                    axios.post(`/comunicados/${this.comunicadoId}`, {params, _method: 'delete'})
                        .then(respuesta => {
                            this.$swal({
                            title: 'Comunicado Eliminado',
                            text: 'Se eliminó el comunicado',
                            icon: 'success'
                            })

                            //Eliminar del DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error =>{
                            console.log(eror)
                        })

                    
                }
            })
        }
    }
}
</script>
