<template>
  <app-layout>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- formulario de crear usuario -->
        <jet-form-section @submitted="permissionInRole">
          <template #title>Gestion de Roles </template>

          <template #description> Crea roles y asigna permisos a los roles. </template>

          <template #form>
            <!-- Titulo del Formulario "Roles" -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="Roles" value="Roles" class="font-serif text-xl" />
              <hr />
            </div>

            <!-- Conten de Nombre y Apellido  -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Nombre -->
              <div class="md:w-4/6">
                <jet-label for="name" value="Rol del usuario" />
                <jet-select
                  @change="activateChangePermisos"
                  class="w-full mt-1"
                  v-model="CreateRoleForm.role"
                >
                  <template #options>
                    <option
                      class="border-gray-300 font-bold focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                      :value="0"
                    >
                      Defenir Nuevo Rol
                    </option>
                    <option
                      v-for="role in roles"
                      :key="role.id"
                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                      :value="role.id"
                    >
                      {{ role.name }}
                    </option>
                  </template>
                </jet-select>
                <jet-input-error :message="CreateRoleForm.errors.role" class="mt-2" />
              </div>
            </div>

            <div class="col-span-6 sm:col-span-4 md:flex" v-if="CreateRoleForm.role == 0">
              <!-- Nombre -->
              <div class="md:w-4/6">
                <jet-label for="name" value="Rol del usuario" />
                <jet-input
                  type="text"
                  v-model="CreateRoleForm.roleName"
                  class="mt-1 block w-full"
                />
                <jet-input-error :message="CreateRoleForm.errors.roleName" class="mt-2" />
              </div>
            </div>

            <div class="col-span-8 sm:col-span-7">
              <jet-label for="Permisos" value="Permisos" class="font-serif text-xl" />
              <hr />
            </div>

            <div class="col-span-8 sm:col-span-7">
              <div class="bg-blue-50 w-full p-2 flex flex-wrap">
                <div
                  class="w-56"
                  v-for="(permission, key) in rolePermissions"
                  :key="permission.id"
                >
                  <label class="flex items-center">
                    <input
                      type="checkbox"
                      class="form-checkbox"
                      :disabled="CreateRoleForm.role === null"
                      v-model="permission.value"
                    />
                    <span
                      :class="{
                        'ml-2': true,
                        'text-gray-500': CreateRoleForm.role === null,
                      }"
                    >
                      {{ key }}</span
                    >
                  </label>
                </div>
              </div>
            </div>
          </template>

          <template #actions>
            <jet-action-message class="mr-3"> Guardado </jet-action-message>

            <jet-button
              :class="{ 'opacity-50': CreateRoleForm.processing }"
              :disabled="CreateRoleForm.processing"
            >
              Guardar
            </jet-button>
          </template>
        </jet-form-section>
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
import VueCurrencyInput from "vue-currency-input";
import JetSelect from "../../Components/Select";
import Paginator from "../../Components/Paginator";

export default {
  props: ["sessions", "permissionsPg", "roles", "role"],

  data() {
    return {
      CreateRoleForm: this.$inertia.form({
        rolePermissions: [],
        role: this.role,
        roleName: "",
      }),
      rolePermissions: this.permissionsPg,
    };
  },

  methods: {
    permissionInRole() {
      /**
       * Parte del codigo que coge los elemento selecionados y los guarda en un array
       * CreateRoleForm.rolePermissions
       */
      Object.values(this.rolePermissions).forEach((permisos) => {
        if (permisos.value) {
          this.CreateRoleForm.rolePermissions.push(permisos.name);
        }
        this.CreateRoleForm.post(this.route("post-permisos"), {
          onSuccess: () => {
            this.CreateRoleForm.reset();
            location.reload();
          },
          onBefore: (visit) => {
            this.$loading(true);
          },
          onError: () => {
            this.$loading(false);
            console.error(this.CreateRoleForm.errors);
          },
          preserveScroll: true,
        });
      });
    },
    /**
     *
     * Parte del codigo que se utiliza para el cambio de permisos
     *
     */
    activateChangePermisos() {
      this.$inertia.get(route("roles-permisos"), { role: this.CreateRoleForm.role });
    },
  },

  components: {
    AppLayout,
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
    VueCurrencyInput,
    Paginator,
    JetSelect,
  },
};
</script>
