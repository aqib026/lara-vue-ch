<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    Average Number of Cars Per User 
                    <h2>{{ OwnerInfo.avg }}</h2>
                </div>
            </div>
            <div class="col">
                <div class="alert alert-info">
                    Average Number of Adresses Per User 
                    <h2>{{ OwnerInfo.aDavg }}</h2>                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            OwnerInfo: Object,
        }
    },
    props: {
        deleteUrl:String,
    },
    methods: {
        showOwnerInfo: function () {
            axios.get('/owner-info').then(function (res) {
                this.OwnerInfo = res.data;
            }.bind(this));
        }
    },
    created:function(){
        this.showOwnerInfo();
    }
}
</script>
