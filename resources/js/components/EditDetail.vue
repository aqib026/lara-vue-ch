<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <form v-on:submit.prevent="submit">
                <table class="table table-striped">
                    <template v-for="(data,index) in Info">
                    <tr  :key="index">
                        <td><label>{{ index.replace('_',' ') }}</label></td>
                        <td>
                            <input type="text" class="form-control" :name="index" :label="index" v-model="Info[index]" />
                        </td>
                    </tr>
                    </template>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="btn btn-success" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
</template>
<style scoped>
    td{
        text-transform: capitalize;
    }
</style>
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
                delete this.Info.id;
                delete this.Info.created_at;
                delete this.Info.updated_at;
            }.bind(this));
        },
        submit(){
            axios.put('/'+this.$route.params.type+'/'+this.$route.params.id,this.Info).then(function (res) {
                if(this.$route.params.type == 'address')
                    this.$router.push('/addresses');
                else    
                    this.$router.push('/'+this.$route.params.type+'s');
            }.bind(this));
        }
    },
    created:function(){
        this.getDetail();
    }
}
</script>
