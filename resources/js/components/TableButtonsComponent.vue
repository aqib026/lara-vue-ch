<template>
    <div>
        <router-link class="btn btn-primary" :to="editUrl">edit</router-link>
        <router-link class="btn btn-primary" :to="viewUrl">view</router-link>
        <DeleteBtn :deleteUrl="deleteUrl" :row="row" />
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
        },
        editUrl(){
            return '/edit/'+this.row.type+"/"+this.row.id;
        }
    },
    created: function () {
    }
}
</script>
