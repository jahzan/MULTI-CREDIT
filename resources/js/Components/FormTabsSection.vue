<template>
  <!-- div contenedor de el compnente se hace por que lo pide el framework al pasarle el prop tbs el crea la cantidad
  de tabs o ventanas y la cantidad respectiva para los formularios-->
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <!-- titulo y description que se ubica al laterar izquierdo -->
    <jet-section-title>
      <template #title><slot name="title"></slot></template>
      <template #description><slot name="description"></slot></template>
    </jet-section-title>
    <!-- div que contiene el formulario el cual esta ubicado en la parte derecha -->
    <div class="mt-5 md:mt-0 md:col-span-2">
      <!-- contenedor o cabecera de formulario que contendra los tab o ventanas que permiten navegar entre formularios -->
      <ul class="flex flex-row flex-wrap pt-3 mb-0 list-none border-b">
        <!--items al selecionar el tab o ventanas le permite navegar entre formularios.... estos elementos son dinamicos
        esto quiere decir que uno le ingresa el numero de elementos o ventasnas que quieren llevar y el crea un slot para
        que se pueda ser llenado por <template #tabTitle[n] -->
        <li
          v-for="n in tbs"
          :key="n"
          class="flex-auto text-center cursor-pointer"
          v-on:click="toggleTabs(n)"
          :class="{ [active]: openTab == n, [inactive]: openTab != n }"
        >
          <slot :name="'tabTitle' + n"></slot>
        </li>
      </ul>
      <!-- div que se encarga de contener el formulario y se le da estilo para que esten en columna y sea moldeable -->
      <div
        class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white border border-solid rounded-b-lg shadow-lg"
      >
        <div class="flex-auto px-4 py-5">
          <div class="tab-content tab-space">
            <!-- div o formulario a mostrar cuando se sleccione el tab dependiente de cada vista  el es dinamico lo que quiere
            decir con el numero de tbs ingresado como props se crearan uno para cada pestaña o tabs o ventanas el cual su contenido
            es dinamico con un slot  que se pueda ser llenado por <template #formContent[n] -->
            <div
              v-for="n in tbs"
              :key="n"
              v-bind:class="{ hidden: openTab !== n, block: openTab === n }"
            >
              <slot :name="'formContent' + n"></slot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//se importaa la clases necesarias para el componnete
import JetSectionTitle from "@/Jetstream/SectionTitle";

//datos del componente
export default {
  //se cargan los compnentes que se importaron clases
  components: {
    JetSectionTitle,
  },
  //props o datos de entrada del componente
  props: { tbs: Number },


//propiedades calculadas
  computed: {
    hasActions() {
      return !!this.$slots.actions;
    },
  },
  //datos variables del componente
  data() {
    return {
      //ubucacion de la ventana por defecto es 1
      openTab: 1,
      //valor fijo para el estilo si cumple una condicion de activo
      active:
        "border-solid border border-b-0 border-blue-500 rounded-t-lg py-2 px-6 bg-white text-blue-700",
      //valor fijo para el estilo si cumple una condicion de inactivoctivo
      inactive:
        "border-solid border border-b-0 border-gray-400 rounded-t-lg py-2 px-6 bg-gray-100 text-gray-600 shadow-lg",
    };
  },

  //metodos o funciones del componenete
  methods: {
    //metodo para ejecutar el cambio de pestaña o ventana
    toggleTabs(tabNumber) {
      this.openTab = tabNumber;
    },
  },
};
</script>
