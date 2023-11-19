<template>
    <CreateComponent></CreateComponent>
    <div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Марка машины</th>
                        <th>Гос номер</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="driver in drivers" :key = "driver.id">
                        <td>{{ driver.full_name }}</td>
                        <td>{{ driver.stamp }}</td>
                        <td>{{ driver.state_number }}</td>
                        <td>
                            <router-link :to="{name: 'editIndex', params: {id: driver.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteDriver(driver.id, index)">
                               Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent.vue";
//Vue.component('drivers')
export default {
    name: "DriverIndex",
    data() {
        return {
            drivers:[]
        }
    },
    mounted() {
        this.getDrivers()
    },
    methods: {
        getDrivers(){
            axios.get('/users'
                .then( res => {
                    this.drivers = res.data
                }))
        },
        editDrivers: function (){

        },
        deleteDrivers : function (){

        },
        createDrivers : function (){

        }
    },
    components:{
        CreateComponent
    }
}
</script>

<style scoped>

</style>
