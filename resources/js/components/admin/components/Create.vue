<template>
    <div class="container">
        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <input class="w-full" type="text" placeholder="event name" v-model="event_details.name">
        </div>

        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <label>Keyword for image</label>
            <input class="w-full" type="text" placeholder="keyword" v-model="event_details.keyword_for_image">
        </div>

        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <label>Severity: 1 is worst</label>
            <input class="w-full" type="number" placeholder="severity" min="1" max="5" v-model="event_details.severity">
        </div>

        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <multiselect v-model="event_details.type"
                         :options="event_types"
                         :loading="loading.event_types"
                         class="cursor-pointer"
            >
            </multiselect>
        </div>
        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <label>Event details:</label>
            <textarea v-model="event_details.detail" class="w-full"></textarea>
        </div>

        <div class="container border-4 rounded border-green-400 my-2">
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice positive:</label>
                <textarea v-model="event_details.decision.positive.choice" class="w-full"></textarea>
            </div>
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice positive outcome:</label>
                <textarea v-model="event_details.decision.positive.outcome.text" class="w-full"></textarea>
                <div>
                    <label>Health effect:</label>
                    <input type="number" placeholder="health effect" v-model="event_details.decision.positive.outcome.health_effect">
                </div>
                <div>
                    <label>Luck effect:</label>
                    <input type="number" placeholder="luck effect" v-model="event_details.decision.positive.outcome.luck_effect">
                </div>
            </div>
        </div>

        <div class="container border-4 rounded border-black my-2">
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice neutral:</label>
                <textarea v-model="event_details.decision.neutral.choice" class="w-full"></textarea>
            </div>
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice neutral outcome:</label>
                <textarea v-model="event_details.decision.neutral.outcome.text" class="w-full"></textarea>
                <div>
                    <label>Health effect:</label>
                    <input type="number" placeholder="health effect" v-model="event_details.decision.neutral.outcome.health_effect">
                </div>
                <div>
                    <label>Luck effect:</label>
                    <input type="number" placeholder="luck effect" v-model="event_details.decision.neutral.outcome.luck_effect">
                </div>
            </div>
        </div>

        <div class="container border-4 rounded border-red-400 my-2">
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice negative:</label>
                <textarea v-model="event_details.decision.negative.choice" class="w-full"></textarea>
            </div>
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice negative outcome:</label>
                <textarea v-model="event_details.decision.negative.outcome.text" class="w-full"></textarea>
                <div>
                    <label>Health effect:</label>
                    <input type="number" placeholder="health effect" v-model="event_details.decision.negative.outcome.health_effect">
                </div>
                <div>
                    <label>luck effect:</label>
                    <input type="number" placeholder="luck effect" v-model="event_details.decision.negative.outcome.luck_effect">
                </div>
            </div>
        </div>

        <div>
            <button type="button" class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200" @click="submit">
                Submit event
            </button>
        </div>
        <p class="text-yellow-400">{{ this.postResponse }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                postResponse: null,
                loading: {
                    event_types: false
                },
                event_details: {
                    name: null,
                    keyword_for_image: null,
                    type: null,
                    detail: null,
                    severity: 0,
                    decision: {
                        positive: {
                            choice: null,
                            outcome: {
                                text: null,
                                health_effect: 0,
                                luck_effect: 0
                            }
                        },
                        neutral: {
                            choice: null,
                            outcome: {
                                text: null,
                                health_effect: 0,
                                luck_effect: 0
                            }
                        },
                        negative: {
                            choice: null,
                            outcome: {
                                text: null,
                                health_effect: 0,
                                luck_effect: 0
                            }
                        }
                    },
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
                axios.get('api/event-types').then(({data}) => {
                    this.event_types = data
                }).then(() => {
                    this.loading.event_types = false
                }).catch(({response}) => {
                    console.log(response)
                })
            },
            submit() {
                axios.post('/api/store-event', this.event_details).then(({data}) => {
                    this.$emit('submitted', data.message)
                }).catch(({ response }) => {
                    this.postResponse = response.statusText
                })
            }
        }
    }
</script>
