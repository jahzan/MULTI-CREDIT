<template>
  <div class="space-y-6">
    <div class="flex flex-col">
      <div>
          <jet-input
            placeholder='Busca en la tabla de almacenes por "Nit" o "Nombre"'
            id="query"
            type="text"
            v-model="keyword"
            @keyup="searchStore"
            class="mt-1 block w-full"
            autocomplete="name"
          />
      </div>
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

          <br />
          <div class="shadow overflow-hidden border rounded-t-lg border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-100">
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
                        <div class="text-sm font-medium text-gray-900">
                          {{ store.name }}
                        </div>
                        <div class="text-sm text-gray-500">
                          {{ "Nit." + store.nit }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-2 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ store.representante }}
                    </div>
                    <div class="text-sm text-gray-500">{{ store.email }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ store.telefono }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      v-if="store.deleted_at == null"
                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
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

                <!-- More items... -->
              </tbody>
            </table>
          </div>
          <div class="w-full shadow overflow-hidden border-b border-gray-200">
            <p v-if="stores.data.length < 1" class="p-2 text-lg text-gray-500 w-full">
              No se encontraron datos registrados "{{ this.keyword }}"
            </p>
          </div>
        </div>
      </div>
      <div>
        <paginator
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-b-lg"
          :elements="stores"
          :offset="2"
          :keyword="keyword"
        />
      </div>
    </div>
    <jet-dialog-modal :show="this.activeModal" @close="closeModal">
      <template #title>
        <switch-activator :active="activeSwitch">
          <template #conten>
            <jet-label for="Empresa" value="Almacen" class="font-serif text-xl inline-block" />
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

        <jet-button class="ml-2" @click.native="closeModal"> Guardar </jet-button>
      </template>
    </jet-dialog-modal>
  </div>
</template>
<script>
//importa los componentes necesarios
import Paginator from "../../Components/Paginator";
import SwitchActivator from "../../Components/Switch";
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
  },
//declarar variables que se utilizaran en el formulario
  data() {
    return {
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

  },
};
</script>
