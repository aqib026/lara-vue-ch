<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <AddressInfo />
                <div class="card">
                    <div class="card-header">Addresses</div>

                    <div class="card-body">
                        <address-table-component></address-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AddressInfo from "./AddressInfo";
export default {
    components:{
        AddressInfo,
    }    
}
</script>
