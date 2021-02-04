<template>
    <div>
        <div class="text-center d-flex justify-content-between">
            <b-spinner
                style="width: 3rem; height: 3rem;"
                :variant="borderColour"
                type="grow"
            ></b-spinner>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
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
