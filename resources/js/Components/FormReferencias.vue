<template>
  <form class="md:grid md:grid-cols-12 md:gap-6">
    <!-- Referencias Personales-->
    <div class="col-span-6 sm:col-span-12">
      <jet-label
        for="Empresa"
        value="Referencias Personales"
        class="font-serif text-xl"
      />
      <hr />
    </div>

    <!-- Nombre y telefono -->
    <div class="col-span-6 sm:col-span-6 md:flex">
      <!-- Nombres -->
      <div class="md:w-4/6">
        <jet-label for="name" value="Nombre" />
        <jet-input
          id="name"
          type="text"
          v-model="inReferencia.name"
          class="block w-full mt-1"
        />
      </div>

      <!-- Apellido -->
      <div class="mt-6 md:mt-0 md:ml-2 md:w-2/6">
        <jet-label for="lastname" value="Telefono" />
        <jet-input
          id="lastname"
          v-model="inReferencia.phone"
          type="text"
          class="block w-full mt-1"
        />
      </div>
    </div>
    <!-- boton agregar -->
    <div class="col-span-6 sm:col-span-4 md:flex">
      <div class="self-end">
        <jet-success-button
          :styleClass="'py-3 w-full'"
          @click="asignarReferencia"
        >
          <i class="mr-1 fas fa-plus"></i>
          Agregar
        </jet-success-button>
      </div>
    </div>

    <!-- Lista de de referencias -->
    <div class="col-span-6 sm:col-span-12">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div
        class="overflow-hidden overflow-x-auto border rounded rounded-b-none"
      >
        <table
          class="min-w-full overflow-hidden bg-white border border-gray-200 divide-y rounded-md rounded-b-none "
        >
          <thead class="bg-gray-50">
            <tr>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:w-7/12"
              >
                Nombre
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:w-4/12"
              >
                Telefono
              </th>
              <th scope="col" class="relative px-6 py-3 md:w-1/12">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="referencia in referencias">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="">
                    <div class="text-sm font-medium text-gray-900">
                      {{ referencia.name }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ referencia.phone }}</div>
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
              >
                <a
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  @click="eliminarReferencia(referencias.indexOf(referencia))"
                  >x</a
                >
              </td>
            </tr>
            <tr v-if="referencias.length == 0">
              <td colspan="3" class="py-1 text-lg text-center text-gray-500">
                No se encontraron registos . . .
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </form>
</template>
<script>
import JetFormSection from "@/Jetstream/FormSection";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetSuccessButton from "@/Jetstream/SuccessButton";
import JetButton from "@/Jetstream/Button";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
  components: {
    JetFormSection,
    JetLabel,
    JetInput,
    JetSuccessButton,
    JetButton,
    JetActionMessage,
  },

props:{
  referencias: Array(),
},
  data() {
    return {
      inReferencia :{
        phone: null,
        name:null,
      },
    };
  },

  methods: {
    asignarReferencia() {
      this.referencias.push({name:this.inReferencia.name, phone:this.inReferencia.phone});
      this.inReferencia.name = null;
      this.inReferencia.phone = null;
      this.$emit('referencias',this.referencias);
    },
    eliminarReferencia(id) {
      this.referencias.splice(id, 1);
    },

  },
};
</script>