<template>
        <button class="btn btn-danger" @click="deleteRow" :ref="uniqueRef">Delete</button>
</template>

<script>
export default {
    props: {
        deleteUrl:String,
        row:Object
    },
    methods: {
        deleteRow() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                // Send request to the server
                if (result.value) {
                axios.delete(this.deleteUrl)
                    .then(() => {
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        this.$router.go();

                    })
                    .catch(data => {
                        Swal.fire("Failed!", data.message, "warning");
                    });
                }else{
                    console.log(this.$refs.parent);
                    //console.log(this.$refs);

                }
            });
    }
    },
    computed:{
        uniqueRef(){
            return 'delRow_'+this.row.type + '_' + this.row.id;
        },
    },
    created:function(){

    }
}
</script>
