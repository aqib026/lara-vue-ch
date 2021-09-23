<template>
    <div>
        <button class="btn btn-primary" @click>View</button>
        <button class="btn btn-primary" @click>Edit</button>
        <DeleteBtn :deleteUrl="deleteUrl" :updateTable="this.$emit('updateTable')"/>
    </div>
</template>

<script>

import DeleteBtn from "./DeleteBtn";
export default {
    props: {
        row: {
            type: Object
        }
    },
    components: {
        DeleteBtn,
    },
    computed:{
        deleteUrl(){
            return '/'+this.row.type+"/"+this.row.id;
        },
    },
    created: function () {
        console.log(this.props);
    }
}
</script>
