<template>
  <div class="">
    <jet-form-section>
      <template #title> Modificar Almacenes </template>

      <template #description> Puedes Modificar e Inactivar Almacenes </template>

      <template #form>
        <!-- Nit -->
        <div class="col-span-6 sm:col-span-4">
          <jet-label
            for="Empresa"
            value="Buscar Almacen"
            class="font-serif text-xl inline-block"
          />
          <br />
          <br />
          <jet-input
            placeholder="Buscar NIT o Nombre del Almacen "
            id="query"
            type="text"
            v-model="keyword"
            @keyup="searchStore"
            class="mt-1 block w-full"
            autocomplete="cedula"
          />
          <jet-input-error class="mt-2" />
        </div>
      </template>

      <template #actions>
        <jet-button> Buscar </jet-button>
      </template>
    </jet-form-section>

    <div class="">
      <br />
      <br />
      <div class="overflow-hidden overflow-x-auto border rounded rounded-b-none">
        <table
          class="bg-white min-w-full divide-y overflow-hidden rounded-b-none rounded-md border border-gray-200"
        >
          <thead class="bg-gray-50">
            <tr>
              <th
                scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Almacen
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Reprecentante
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Telefono
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Estado
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="store in stores.data" :key="store.id">
              <td class="px-2 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-base font-medium text-gray-900">
                      {{ store.name }}
                    </div>
                    <div class="text-xs text-gray-500">
                      {{ "Nit." + store.nit }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-2 py-4 whitespace-nowrap">
                <div class="text-base text-gray-900">
                  {{ store.representante }}
                </div>
                <div class="text-xs text-gray-500">{{ store.email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                {{ store.telefono }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span
                  v-if="store.deleted_at == null"
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900"
                >
                  Active
                </span>
                <span
                  v-else
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"
                >
                  Inactive
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <jet-secondary-button
                  @click.native="editStore(store)"
                  class="cursor-pointer text-indigo-600 underline hover:text-indigo-900"
                >
                  Editar
                </jet-secondary-button>
              </td>
            </tr>
            <tr class="text-center" v-if="stores.data.length === 0">
              <td COLSPAN="5" class="text-center py-2 text-lg text-gray-500">
                {{ 'No se encontraron datos registrados "' + keyword + '"' }}
              </td>
            </tr>
            <!-- More items... -->
          </tbody>
        </table>
      </div>
      <div class="border rounded-lg rounded-t-none">
        <paginator class="rounded-lg rounded-t-none" :elements="stores" :offset="2" :keyword="keyword" />
      </div>
    </div>

    <jet-dialog-modal :show="this.activeModal" @close="closeModal">
      <template #title>
        <switch-activator :active="activeSwitch">
          <template #conten>
            <jet-label
              for="Empresa"
              value="Almacen"
              class="font-serif text-xl inline-block"
            />
          </template>
        </switch-activator>
        <hr class="mt-1" />
      </template>

      <template #content>
        <!-- Razon social -->
        <div class="mb-1col-span-6 sm:col-span-4">
          <jet-label for="update-name" value="Razon social" />
          <jet-input
            id="update-name"
            type="text"
            class="mt-1 block w-full"
            v-model="fromStoreUpdate.name"
            autocomplete="update-name"
          />
          <jet-input-error :message="fromStoreUpdate.errors.name" class="mt-2" />
        </div>
        <br />
        <!-- Nit -->
        <div class="mb-1 col-span-6 sm:col-span-4">
          <jet-label for="update-nit" value="Nit" />
          <jet-input
            id="update-nit"
            type="number"
            class="mt-1 block w-full"
            v-model="fromStoreUpdate.nit"
            autocomplete="update-nit"
          />
          <jet-input-error :message="fromStoreUpdate.errors.nit" class="mt-2" />
        </div>
        <br />
        <!-- Email -->
        <div class="mb-1 col-span-6 sm:col-span-4">
          <jet-label for="update-email" value="Email" />
          <jet-input
            id="update-email"
            type="email"
            class="mt-1 block w-full"
            v-model="fromStoreUpdate.email"
          />
          <jet-input-error :message="fromStoreUpdate.errors.email" class="mt-2" />
        </div>
        <br />
        <!-- Numero telefonico -->
        <div class="mb-1 col-span-6 sm:col-span-4">
          <jet-label for="update-telf" value="Numero Telefonico" />
          <jet-input
            id="update-telf"
            type="number"
            class="mt-1 block w-full"
            v-model="fromStoreUpdate.telefono"
            autocomplete="update-telf"
          />
          <jet-input-error :message="fromStoreUpdate.errors.telefono" class="mt-2" />
        </div>
      </template>

      <template #footer>
        <jet-secondary-button @click.native="closeModal"> Cancelar </jet-secondary-button>

        <button
          class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
          @click="updateStore"
        >
          Guardar
        </button>
      </template>
    </jet-dialog-modal>

  </div>
</template>
<script>
//importa los componentes necesarios
import Paginator from "../../Components/Paginator";
import SwitchActivator from "../../Components/Switch";
import JetFormSection from "@/Jetstream/FormSection";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInputError from "@/Jetstream/InputError";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  //datos de entrada al componente desde otro componente
  props: ["stores"],
  //inicializar componentes previamentes importados
  components: {
    Paginator,
    JetInput,
    JetInputError,
    JetLabel,
    JetButton,
    JetDialogModal,
    JetSecondaryButton,
    SwitchActivator,
    JetFormSection,
  },
  //declarar variables que se utilizaran en el formulario
  data() {
    return {
      isLoad: false,
      keyword: "",
      activeModal: false,
      id: null,
      activeSwitch: false,
      fromStoreUpdate: this.$inertia.form({
        id: "",
        name: "",
        nit: "",
        representante: "",
        socio_de_negocio_id: "",
        telefono: "",
        email: "",
        deleted_at: null,
      }),
    };
  },
  //metodos o funciones utilizados para la logica del formulario
  methods: {
    //Busca los valores de la tabla
    searchStore() {
      // this.$inertia.visit(this.route("almacen.index", { keyword: this.keyword },{ preserveScroll: true }));
      this.$inertia.visit(this.route("almacen.index"), {
        method: "get",
        data: {
          keyword: this.keyword,
        },
        preserveState: true,
        preserveScroll: true,
      });
    },
    //cierra el modal(ventana emergente) de actualizar datos del distribuidor
    closeModal() {
      this.activeModal = false;
    },
    //metodo utilizado para guardar los datos digitados en la base de datos utilizando una api previamente creada
    editStore(store) {
      this.activeModal = true;
      this.fromStoreUpdate.id = store.id;
      this.fromStoreUpdate.name = store.name;
      this.fromStoreUpdate.nit = store.nit;
      this.fromStoreUpdate.representante = store.representante;
      this.fromStoreUpdate.socio_de_negocio_id = store.socio_de_negocio_id;
      this.fromStoreUpdate.telefono = store.telefono;
      this.fromStoreUpdate.email = store.email;
      this.fromStoreUpdate.deleted_at = store.deleted_at;

      if (this.fromStoreUpdate.deleted_at === null) {
        this.activeSwitch = true;
      } else {
        this.activeSwitch = false;
      }
    },
    loadClose() {
      this.load = false;
    },
    updateStore() {
      this.fromStoreUpdate.put("/almacen/" + this.fromStoreUpdate.id, {
        data: this.fromStoreUpdate,
        preserveState: true,
        preserveScroll: true,
        onBefore: (visit) => {
          this.$loading(true);
        },
        onSuccess: () => {
          this.success();
        },
      });
    },
    success() {
      this.$loading(false);
      this.closeModal();
      this.$toast.success("Se guardo", {
        position: "bottom-right",
        timeout: 1800,
      });
    },
  },
};
</script>
