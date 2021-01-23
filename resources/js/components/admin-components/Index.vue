<template>
    <div>
        <div v-if="formSubmitted">
            <p class="text-white font-display text-lg">{{ messageReturned }}</p>
        </div>
        <div v-if="!formSubmitted" class="font-display">
            <create @submitted="refresh"></create>
        </div>
    </div>
</template>

<script>
    import Create from "./components/Create";
    import Spinner from "../partials/Spinner";

    export default {
        data() {
            return {
                formSubmitted: false,
                message: null
            }
        },
        components: {
            Create,
            Spinner
        },
        computed: {
            messageReturned() {
                return this.message ? this.message + ' - ' + "Please refresh form" : null
            }
        },
        methods: {
            refresh(e) {
                this.formSubmitted = true
                this.message = e
            }
        }
    }
</script>
