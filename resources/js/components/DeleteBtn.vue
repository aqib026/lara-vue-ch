<template>
        <button class="btn btn-danger" @click="deleteRow">Delete</button>
</template>

<script>
export default {
    props: {
        deleteUrl:String,
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
                        this.$emit('updateTable');
                    })
                    .catch(data => {
                        Swal.fire("Failed!", data.message, "warning");
                    });
                }
            });
    }
    },
    created:function(){

    }
}
</script>
