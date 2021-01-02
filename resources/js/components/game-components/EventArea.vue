<template>
    <div class="h-1/3 w-full container border-8" :class="borderColour">
        <event :event="event" @triggerEvent="nextEvent"></event>
    </div>
</template>

<script>
    import Event from "../partials/Event.vue"

    export default {
        components: {
          Event
        },
        props: {},
        data() {
          return {
              event: null,
          }
        },
        computed: {
            borderColour() {
                return 'border-red-600'
                // border-gray-400
                // border-green-500
                // border-blue-400
                // border-pink-400
            }
        },
        mounted() {
            // This will not be in mounted later
            // The eventarea component manages the flow of the game, makes the api calls.
            // It provides the details to the event component, which is just a vehicle to show the data.
          this.nextEvent()
        },
        methods: {
          nextEvent() {
              axios.get('api/next-event').then(({data}) => {
                  this.event = data.data
              }).then(() => {
                  console.log('then')
              }).catch(({response}) => {
                  console.log(response)
              })
          }
        },
    }
</script>
