<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr v-for="(data,index) in Info" :key="index">
                        <td>{{ index }}</td>
                        <td>{{ data }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            Info: Object,
        }
    },
    methods: {
        getDetail(){
            axios.get('/'+this.$route.params.type+'/'+this.$route.params.id).then(function (res) {
                this.Info = res.data;
            }.bind(this));
        },
    },
    created:function(){
        this.getDetail();
    }
}
</script>
