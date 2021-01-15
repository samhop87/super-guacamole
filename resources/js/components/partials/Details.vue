<template>
    <div>
        <div>
            <h1>Stability</h1>
            <value-bar :value="stability" :colour="stabilityVariant"></value-bar>
        </div>
        <div>
            <h1>Popularity</h1>
            <value-bar :value="popularity" :colour="popularityVariant"></value-bar>
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
            stability: {
                type: Number,
                default: 50
            },
            popularity: {
                type: Number,
                default: 50
            }
        },
        computed: {
            stabilityVariant() {
                switch (true) {
                    case this.stability < 10:
                        return 'dark';
                    case this.stability > 10 && this.stability < 35:
                        return 'danger'
                    case this.stability > 35 && this.stability < 55:
                        return 'warning'
                    case this.stability > 55:
                        return 'success'
                    default:
                        return 'dark'
                }
            },
            popularityVariant() {
                switch (true) {
                    case this.popularity < 10:
                        return 'dark'
                    case this.popularity > 10 && this.popularity < 35:
                        return 'danger'
                    case this.popularity > 35 && this.popularity < 55:
                        return 'warning'
                    case this.popularity > 55:
                        return 'success'
                    default:
                        return 'dark'
                }
            }
        }
    }
</script>
