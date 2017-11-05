<template>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Storeys</th>
                <th>Garages</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="apartment in apartments">
                <td>{{ apartment.name }}</td>
                <td>{{ apartment.price }}</td>
                <td>{{ apartment.bedrooms }}</td>
                <td>{{ apartment.bathrooms }}</td>
                <td>{{ apartment.storeys }}</td>
                <td>{{ apartment.garages }}</td>
            </tr>
            <tr v-if="!apartments.length">
                <td colspan="6" class="text-center">No results were found.</td>
            </tr>
        </tbody>
    </table>
</template>
<script>
    import EventBus from './EventBus.vue';

    export default {
        data() {
            return {
                apartments: []
            };
        },
        created() {
            EventBus.$on('reload', (list) => {
                this.apartments = list;
            });
        },
    }
</script>
<style scoped lang="scss">
    table {
        margin-top: 30px;
    }
</style>