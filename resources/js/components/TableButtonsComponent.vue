<template>
    <div>
        <button class="btn btn-primary" @click>edit</button>
        <router-link class="btn btn-primary" :to="viewUrl">view</router-link>
        <DeleteBtn :deleteUrl="deleteUrl" @deleted="deletedRow"/>
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
    methods:{
    },
    computed:{
        deleteUrl(){
            return '/'+this.row.type+"/"+this.row.id;
        },
        viewUrl(){
            return '/detail/'+this.row.type+"/"+this.row.id;
        }
    },
    created: function () {
        console.log(this.props);
    }
}
</script>
