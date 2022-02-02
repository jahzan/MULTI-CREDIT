<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="this.$inertia.page.props.permissions.almacenes_create">
                  <jet-form-section @submitted="createStore">
          <template #title>Crear Almacenes </template>

          <template #description> Crea Almacenes tramitadores del credito. </template>

          <template #form>
            <!-- Razon social -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="Empresa" value="Empresa" class="font-serif text-xl" />
              <hr />
            </div>

            <!-- Conten Nit Razon, Social -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Nit -->
              <div class="md:w-2/5">
                <jet-label for="id" value="Nit" />
                <jet-input
                  id="nit"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateStoreForm.nit"
                  autocomplete="nit"
                />
                <jet-input-error :message="CreateStoreForm.errors.nit" class="mt-2" />
              </div>
              <!-- Razon social -->
              <div class="mt-6 md:mt-0 md:ml-2 md:w-3/5">
                <jet-label for="FecExp" value="Razon social" />
                <jet-input
                  id="name"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateStoreForm.name"
                  autocomplete="name"
                />
                <jet-input-error :message="CreateStoreForm.errors.name" class="mt-2" />
              </div>
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="email" value="Email" />
              <jet-input
                id="email"
                type="email"
                class="block w-full mt-1"
                v-model="CreateStoreForm.email"
              />
              <jet-input-error :message="CreateStoreForm.errors.email" class="mt-2" />
            </div>

           
            <div class="col-span-6 sm:col-span-4 md:flex">
               <!-- Numero telefonico -->
              <div class="md:w-3/5">
                <jet-label for="name" value="Numero Telefonico" />
                <jet-input
                  id="telefono"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateStoreForm.telefono"
                  autocomplete="telefono"
                />
                <jet-input-error
                  :message="CreateStoreForm.errors.telefono"
                  class="mt-2"
                />
              </div>

              <!-- zona -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
              <jet-label for="name" value="Zona" />
              <jet-select class="w-full mt-1"
               v-model="CreateStoreForm.zone"
              >
                <template #options>

                      <option
                        v-for="zone in zones"
                        :key="zone.id"
                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        :value="zone.id"
                      >
                        {{zone.name}}
                      </option>
                  


                </template>
              </jet-select>
              <jet-input-error :message="CreateStoreForm.errors.zone" class="mt-2" />
            </div>
            </div>



            <!-- representante -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                for="representante"
                value="Representante"
                class="font-serif text-xl"
              />
            </div>

            <!-- Conten Nombre Representante, Apellido Representante -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Nombre -->
              <div class="md:w-3/6">
                <jet-label for="representante" value="Nombre" />
                <jet-input
                  id="representante"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateStoreForm.nombre"
                  autocomplete="nombre"
                />
                <jet-input-error :message="CreateStoreForm.errors.nombre" class="mt-2" />
              </div>
              <!-- Apellido -->
              <div class="mt-6 md:mt-0 md:ml-2 md:w-3/6">
                <jet-label for="representante" value="Apellido" />
                <jet-input
                  id="apellido"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateStoreForm.apellido"
                  autocomplete="apellido"
                />
                <jet-input-error
                  :message="CreateStoreForm.errors.apellido"
                  class="mt-2"
                />
              </div>
            </div>
          </template>

          <template #actions>
            <jet-action-message class="mr-3"> Guardado </jet-action-message>

            <jet-button
              :class="{ 'opacity-50': CreateStoreForm.processing }"
              :disabled="CreateStoreForm.processing"
            >
              Guardar
            </jet-button>
          </template>
                  </jet-form-section>
                  <br />
                  <jet-section-border />
                  <br />
        </div>
        <div v-if="this.$inertia.page.props.permissions.almacenes_update">
          <table-stores :stores="stores"></table-stores>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetActionSection from "@/Jetstream/ActionSection";
import JetActionSectionFull from "@/Jetstream/ActionSectionFull";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetNavLink from "@/Jetstream/NavLink";
import TableStores from "../RegitroAlmacen/Tablestores";
import JetSelect from "../../Components/Select";

export default {
  props: ["sessions", "stores", "zones"],

  components: {
    AppLayout,
    JetSelect,
    JetSectionBorder,
    JetActionSection,
    JetActionMessage,
    JetButton,
    JetActionSectionFull,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetNavLink,
    TableStores,
  },

  data() {
    return {
      CreateStoreForm: this.$inertia.form({
        name: "",
        email: "",
        nit: "",
        telefono: "",
        representante: "",
        nombre: "",
        apellido: "",
        zone:"",
        _token: this.$page.props.csrf_token,
      }),
      displayingToken: false,
      managingPermissionsFor: null,
      apiTokenBeingDeleted: null,
    };
  },

  methods: {
    createStore() {
      this.CreateStoreForm.representante =
        this.CreateStoreForm.nombre + " " + this.CreateStoreForm.apellido;
      this.CreateStoreForm.post(this.route("almacen.store"), {
        onBefore: (visit) => {
          this.$loading(true);
        },
        onSuccess: () => {
          this.CreateStoreForm.reset();
          this.$loading(false);
        },
        onError: () => {
          this.$loading(false);
        },        
      });
    },
    confirmApiTokenDeletion(store) {
      this.apiTokenBeingDeleted = store;
    },
  },
};
</script>
