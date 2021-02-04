<template>
    <div class="flex flex-row">
        <div class="m-3 w-2/5">
            <h1 class="font-mobile sm:font-readable my-2">Health</h1>
            <value-bar :value="health" :colour="healthVariant"></value-bar>
        </div>
        <div class="m-3 w-2/5">
            <h1 class="font-mobile sm:font-readable my-2">Luck</h1>
            <value-bar :value="luck" :colour="luckVariant"></value-bar>
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
            luckVariant() {
                switch (true) {
                    case this.luck < 10:
                        return 'dark'
                    case this.luck > 10 && this.luck < 35:
                        return 'danger'
                    case this.luck > 35 && this.luck < 55:
                        return 'warning'
                    case this.luck > 55:
                        return 'success'
                    default:
                        return 'dark'
                }
            }
        }
    }
</script>
