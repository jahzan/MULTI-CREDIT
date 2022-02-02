<template>
  <!-- used `style="height: 100vh;"` because without it in the Firefox 89 and Chrome 91 (June 2021) the `vue-pdf-app` is not rendering on the page, just empty space without any errors (since `vue-pdf-app` does not have height and it is the top tag in the generated markup ) -->
  <!-- or you can just wrap `vue-pdf-app` in <div> tag and set height for it via CSS (like in `Script tag (unpkg)` example below) -->
  <div>
      {{ info }}
      <br>
      <jet-button class="ml-2" @click.native="hola"> Verificar </jet-button>
  </div>
</template>

<script>
// import VuePdfApp from "vue-pdf-app";
// import this to use default icons for buttons
// import "vue-pdf-app/dist/icons/main.css";
import JetButton from '../Jetstream/Button.vue';

export default {
  components: {
    VuePdfApp,
    JetButton
  },
  data() {
    return {
      info: null,
    }
  },
  mounted () {
  },
  methods: {
    hola(){
    axios.get('https://api.coindesk.com/v1/bpi/currentprice.json').then(response => (this.info = response));

      // this.info = "hola";
    }
  },
};
</script>
