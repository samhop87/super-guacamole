<template>
    <div>
        <div class="text-center d-flex justify-content-between">
            <pulse-loader :loading="loading" :color="borderColour"></pulse-loader>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            loading: {
                type: Boolean,
                default: false
            },
          borderColour: {
              type: String,
              default: 'indigo'
          }
        },
        data() {
            return {
                variants: ['primary', 'secondary', 'danger', 'warning', 'success', 'info', 'light', 'dark']
            }
        }
    }
</script>
