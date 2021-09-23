<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <OwnerInfo />
                <div class="card">
                    <div class="card-header">Owners</div>

                    <div class="card-body">
                        <owner-table-component></owner-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OwnerInfo from "./OwnerInfo";

export default {
    components:{
        OwnerInfo,
    }
}
</script>
