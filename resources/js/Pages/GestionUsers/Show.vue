<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- formulario de crear usuario -->
        <jet-form-section @submitted="createUser">
          <template #title>Crear Usuario </template>

          <template #description> Crea usuario del sistema. </template>

          <template #form>
            <!-- Titulo del Formulario "Datos del Usuario" -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                for="Datos"
                value="Datos del Usuario"
                class="font-serif text-xl"
              />
              <hr />
            </div>

            <!-- Conten de Nombre y Apellido  -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Nombre -->
              <div class="md:w-3/6">
                <jet-label for="representante" value="Nombre" />
                <jet-input
                  id="name"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateUserForm.name"
                  autocomplete="name"
                />
                <jet-input-error :message="CreateUserForm.errors.name" class="mt-2" />
              </div>
              <!-- Apellido -->
              <div class="mt-6 md:mt-0 md:ml-2 md:w-3/6">
                <jet-label for="representante" value="Apellido" />
                <jet-input
                  id="lastname"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateUserForm.lastname"
                  autocomplete="lastname"
                />
                <jet-input-error :message="CreateUserForm.errors.lastname" class="mt-2" />
              </div>
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="email" value="Email" />
              <jet-input
                id="email"
                type="email"
                class="block w-full mt-1"
                v-model="CreateUserForm.email"
              />
              <jet-input-error :message="CreateUserForm.errors.email" class="mt-2" />
            </div>

            <!-- telefono y rol de usuario-->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Numero telefonico -->
              <div class="md:w-3/5">
                <jet-label for="name" value="Numero Telefonico" />
                <jet-input
                  id="telefono"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateUserForm.telefono"
                  autocomplete="telefono"
                />
                <jet-input-error :message="CreateUserForm.errors.telefono" class="mt-2" />
              </div>

              <!-- Rol del Usuario -->
              <div class="md:w-2/5 md:ml-2">
                <jet-label for="name" value="Rol del usuario" />
                <jet-select class="w-full mt-1" v-model="CreateUserForm.role">
                  <template #options>
                    <option
                      v-for="role in roles"
                      :key="role.id"
                      class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                      :value="role.id"
                    >
                      {{ role.name }}
                    </option>
                  </template>
                </jet-select>
                <jet-input-error :message="CreateUserForm.errors.role" class="mt-2" />
              </div>
            </div>

            <!--  zonas -->
            <div class="col-span-6 sm:col-span-4 md:flex" v-if="CreateUserForm.role==3">
              <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
                <jet-label for="name" value="Zona" />
                <jet-select class="w-full mt-1" v-model="CreateUserForm.zone">
                  <template #options>
                    <option
                      v-for="zone in zones"
                      :key="zone.id"
                      class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                      :value="zone.id"
                    >
                      {{ zone.name }}
                    </option>
                  </template>
                </jet-select>
                <jet-input-error :message="CreateUserForm.errors.zone" class="mt-2" />
              </div>
            </div>
          </template>

          <template #actions>
            <jet-action-message class="mr-3"> Guardado </jet-action-message>

            <jet-button
              :class="{ 'opacity-50': CreateUserForm.processing }"
              :disabled="CreateUserForm.processing"
            >
              Guardar
            </jet-button>
          </template>
        </jet-form-section>
        <!-- linea de separacion de secciones -->
        <jet-section-border />
        <!-- seccion de busqueda y edicion de usuarios -->
        <div class="">
          <!-- formulario para aplicar filtro  -->
          <jet-form-section>
            <template #title> Modificar Usuario </template>

            <template #description> Puedes Modificar e Inactivar Usuarios </template>

            <template #form>
              <!-- Nit -->
              <div class="col-span-6 sm:col-span-4">
                <jet-label
                  for="Empresa"
                  value="Buscar Usuario"
                  class="inline-block font-serif text-xl"
                />
                <br />
                <br />
                <jet-input
                  placeholder="Buscar NIT o Nombre del Almacen "
                  id="query"
                  type="text"
                  v-model="keyword"
                  class="block w-full mt-1"
                  autocomplete="cedula"
                />
                <jet-input-error class="mt-2" />
              </div>
            </template>

            <template #actions>
              <jet-button> Buscar </jet-button>
            </template>
          </jet-form-section>
          <!-- Componente de muestra los resultados -->
          <div class="">
            <br />
            <br />
            <!-- contenedor fijo para scroll de la tabla -->
            <div class="overflow-hidden overflow-x-auto border rounded rounded-b-none">
              <!-- tabla para mostrar los resultados -->
              <table
                class="min-w-full overflow-hidden bg-white border border-gray-200 divide-y rounded-md rounded-b-none"
              >
                <!-- cabecera de la tabla donde se muestra los titulos de las columnas -->
                <thead class="bg-gray-50">
                  <!-- primera fila de la cabecera de la tabla siempre es una -->
                  <tr>
                    <!-- titulo de la 1 columna -->
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      Name
                    </th>
                    <!-- titulo de la 2 columna -->
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      Title
                    </th>
                    <!-- titulo de la 3 columna -->
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      Status
                    </th>
                    <!-- titulo de la 4 columna -->
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      Role
                    </th>
                    <!-- titulo de la 5 columna -->
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <!-- cuerpo de la tabla donde se muestra los datos -->
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="user in users.data" :key="user.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                          <img
                            class="w-10 h-10 rounded-full"
                            :src="user.profile_photo_url"
                            alt=""
                          />
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ user.name + " " + user.lastname }}
                          </div>
                          <div class="text-sm text-gray-500">{{ user.email }}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">
                        {{ user.store ? user.store : "Fundacion Multicredito" }}
                      </div>
                      <div class="text-sm text-gray-500">Optimization</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                      >
                        Active
                      </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ user.role }}
                    </td>
                    <td
                      class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
                    >
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                  </tr>

                  <!-- More people... -->
                </tbody>
              </table>
            </div>
            <div class="border rounded-lg rounded-t-none">
              <paginator
                class="rounded-lg rounded-t-none"
                :elements="users"
                :keyword="keyword"
                :offset="2"
              />
            </div>
          </div>
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
import VueCurrencyInput from "vue-currency-input";
import JetSelect from "../../Components/Select";
import Paginator from "../../Components/Paginator";

export default {
  props: ["sessions", "users", "roles", "zones"],

  data() {
    return {
      CreateUserForm: this.$inertia.form({
        store: "",
        socio_de_negocio_id: "",
        name: "",
        lastname: "",
        email: "",
        telefono: "",
        apellido: "",
        role: "",
        zone: null,
        _token: this.$page.props.csrf_token,
      }),
      keyword: "",
      displayingToken: false,
      managingPermissionsFor: null,
      apiTokenBeingDeleted: null,
    };
  },

  methods: {
    toggleTabs(tabNumber) {
      this.openTab = tabNumber;
    },
    createUser() {
      this.CreateUserForm.post(this.route("user.store"), {
        onSuccess: () => {
          this.CreateUserForm.reset();
          this.$loading(false);
        },
        onBefore: (visit) => {
          this.$loading(true);
        },
        onError: () => {
          this.$loading(false);
          console.error(this.CreateUserForm.errors);
        },
        preserveState: true,
        preserveScroll: true,
      });
    },
    confirmApiTokenDeletion(store) {
      this.apiTokenBeingDeleted = store;
    },
    formatMiles(n) {
      n = n / 1;
      n = String(n).replace(/\D/g, "");
      return n === "" ? n : Number(n).toLocaleString();
    },
    formatFecha(date) {
      //se declara variables dias de la semana (diaSem) y meses del año (mes)
      var mes = [
        "ENE",
        "FEB",
        "MAR",
        "ABR",
        "MAY",
        "JUN",
        "JUL",
        "AGO",
        "SEP",
        "OCT",
        "NOM",
        "DIC",
      ];
      var diaSem = ["DO", "LU", "MA", "MI", "JU", "VI", "SA"];
      let fecha = "";
      //se obtiene # del dia de la semana, # del dia del mes # del mes y # del año  se le aplica fromato con los arrays previamentes creados
      fecha =
        diaSem[date.getDay()] +
        "." +
        date.getDate() +
        " " +
        mes[date.getMonth()] +
        " " +
        date.getFullYear();
      return fecha;
    },
    formatHora(date) {
      let hora, minuto;
      hora = date.getHours();
      minuto = date.getMinutes();
      minuto < 10 ? (minuto = "0" + minuto) : (minuto = minuto);
      hora < 10 ? (hora = "0" + hora) : (hora = hora);
      return hora + ":" + minuto;
    },
    searchSolicitud() {
      this.$inertia.visit(this.route("gestion-credito.index"), {
        method: "get",
        data: {
          keyword: this.keyword,
        },
        preserveState: true,
        preserveScroll: true,
      });
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
