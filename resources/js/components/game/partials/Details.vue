<template>
    <div class="flex flex-row justify-around font-mobile sm:font-readable text-center">
        <div class="m-3 w-2/5">
            <h1 class="my-2">Health:</h1>
            <h1 class="my-2 text-2xl">{{ health }}/100</h1>
        </div>
        <div class="m-3 w-2/5">
            <h1 class="my-2">Luck Assessment:</h1>
            <h1 class="my-2">{{ luckMessage }}</h1>
        </div>
    </div>
</template>

<script>
    import ValueBar from "./ValueBar";

    export default {
        components: {
            ValueBar
        },
        props: {
            health: {
                type: Number,
                default: 50
            },
            luck: {
                type: Number,
                default: 50
            }
        },
        computed: {
            healthVariant() {
                switch (true) {
                    case this.health < 10:
                        return 'dark';
                    case this.health > 10 && this.health < 35:
                        return 'danger'
                    case this.health > 35 && this.health < 55:
                        return 'warning'
                    case this.health > 55:
                        return 'success'
                    default:
                        return 'dark'
                }
            },
            luckMessage() {
                switch (true) {
                    case this.luck < 10:
                        return 'You are terribly unlucky.'
                    case this.luck > 10 && this.luck < 35:
                        return 'Your luck is pretty bad.'
                    case this.luck > 35 && this.luck < 55:
                        return 'Let\'s just say you could be luckier.'
                    case this.luck > 55 && this.luck < 70:
                        return 'You have better than average luck.'
                    case this.luck > 70:
                        return 'Did you eat a rabbit\'s foot? Your luck is amazing.'
                    default:
                        return 'No luck.'
                }
            }
        }
    }
</script>
