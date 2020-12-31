<template>
    <div>
    <div>
        <input type="text" placeholder="event name" v-model="event_details.name">
    </div>
    <div>
        <div>
            <multiselect v-model="event_details.type" :options="event_types"></multiselect>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: {
                  event_types: false
                },
                event_details: {
                    name: null,
                    type: null,
                    detail: null,
                },
                event_types: []
            }
        },
        mounted() {
            this.getTypes()
        },
        methods: {
            getTypes() {
                this.loading.event_types = true
                axios.get('/event-types').then(({ data }) => {
                    this.event_types = data
                }).catch(({ response }) => {
                    console.log(response)
                })
            },
            submit() {
                alert(JSON.stringify(this.event_details))
            }
        }
    }
</script>
