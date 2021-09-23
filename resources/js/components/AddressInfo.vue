<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    Average Number of Cars Per Address 
                    <h2>{{ AddressInfo.avg }}</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            AddressInfo: Object,
        }
    },
    props: {
        deleteUrl:String,
    },
    methods: {
        showAddressInfo: function () {
            axios.get('/address-info').then(function (res) {
                this.AddressInfo = res.data;
            }.bind(this));
        }
    },
    created:function(){
        this.showAddressInfo();
    }
}
</script>
