<template>
    <form @submit.prevent="search">
        <div class="form-group">
            <label for="inputName">Name:</label>
            <input type="text" class="form-control" id="inputName" v-model="form.name" :disabled="sending">
            <span class="help-block" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <label for="inputPriceFrom">Price (from / to):</label>
                </div>
                <div class="col-xs-6">
                    <input type="number" class="form-control" id="inputPriceFrom" v-model="form.price_from" :disabled="sending">
                </div>
                <div class="col-xs-6">
                    <input type="number" class="form-control" id="inputPriceTo" v-model="form.price_to" :disabled="sending">
                </div>
                <div class="col-xs-12">
                    <span class="help-block" v-if="errors.price">{{ errors.price[0] }}</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputBedrooms">Bedrooms:</label>
            <input type="number" class="form-control" id="inputBedrooms" v-model="form.bedrooms" :disabled="sending">
            <span class="help-block" v-if="errors.bedrooms">{{ errors.bedrooms[0] }}</span>
        </div>
        <div class="form-group">
            <label for="inputBathrooms">Bathrooms:</label>
            <input type="number" class="form-control" id="inputBathrooms" v-model="form.bathrooms" :disabled="sending">
            <span class="help-block" v-if="errors.bathrooms">{{ errors.bathrooms[0] }}</span>
        </div>
        <div class="form-group">
            <label for="inputStoreys">Storeys:</label>
            <input type="number" class="form-control" id="inputStoreys" v-model="form.storeys" :disabled="sending">
            <span class="help-block" v-if="errors.storeys">{{ errors.storeys[0] }}</span>
        </div>
        <div class="form-group">
            <label for="inputGarages">Garages:</label>
            <input type="number" class="form-control" id="inputGarages" v-model="form.garages" :disabled="sending">
            <span class="help-block" v-if="errors.garages">{{ errors.garages[0] }}</span>
        </div>
        <button type="button" class="btn btn-default" :disabled="sending" @click="reset">Reset Filters</button>
        <button type="submit" class="btn btn-primary" :disabled="sending">Search</button>
    </form>
</template>
<script>
    import axios from 'axios';
    import EventBus from './EventBus.vue';

    export default {
        data() {
            return {
                form: {
                    name: '',
                    price_from: '',
                    price_to: '',
                    bedrooms: '',
                    bathrooms: '',
                    storeys: '',
                    garages: ''
                },
                sending: false,
                errors: {}
            };
        },
        mounted() {
            this.search();
        },
        methods: {
            search() {
                this.sending = true;

                axios({
                    url: '/api/search',
                    data: this.form,
                    method: 'POST'
                })
                        .then(response => {
                            EventBus.$emit('reload', response.data);

                            this.errors = {};
                            this.sending = false;
                        })
                        .catch(e => {
                            if (e.response.status === 422) {
                                this.errors = e.response.data.errors;
                            }

                            this.sending = false;
                        });
            },
            reset() {
                this.form.name = '';
                this.form.price_from = '';
                this.form.price_to = '';
                this.form.bedrooms = '';
                this.form.bathrooms = '';
                this.form.storeys = '';
                this.form.garages = '';

                this.search();
            }
        }
    }
</script>
<style scoped lang="scss">
    @import '../../sass/variables';

    .help-block {
        color: $brand-danger;
    }
</style>