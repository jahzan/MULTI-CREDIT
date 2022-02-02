<template>
  <app-layout>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section :tbs="2" @submitted="createStore">
          <template #title> Transferir </template>

          <template #description>
            Solicita desembolso del dinero de creditos ortorgados
          </template>

          <template #tabTitle1
            ><p class="text-base font-semibold">Consignacion Cuenta Milan</p></template
          >

          <template #tabTitle2>
            <p class="text-base font-semibold">Consignacion Cuenta Bancaria</p></template
          >

          <template #formContent1>
            <p>
              Collaboratively administrate empowered markets via plug-and-play networks.
              Dynamically procrastinate B2C users after installed base benefits.
              <br />
              <br />
              Dramatically visualize customer directed convergence without revolutionary
              ROI.
            </p>
          </template>

          <template #formContent2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet culpa eius
              vel fugit, veritatis ad rem reprehenderit illum iste dolores aut voluptatem
              consequuntur natus. Ea atque quia cum inventore eius!
              <br />
              <br />
              Dramatically visualize customer directed convergence without revolutionary
              ROI.
            </p>
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
                    class="font-extrabold font-serif w-8 px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    #
                  </th>
                  <th
                    scope="col"
                    class="font-serif px-6 w-10 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Cedula
                  </th>
                  <th
                    scope="col"
                    class="font-serif px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Nombre
                  </th>
                  <th
                    scope="col"
                    class="font-serif px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Monto
                  </th>
                  <th
                    scope="col"
                    class="font-serif px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Fecha
                  </th>

                  <th
                    scope="col"
                    class="text-center font-serif px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Hora
                  </th>

                  <th
                    scope="col"
                    class="font-serif px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Estado
                  </th>

                  <th
                    scope="col"
                    class="font-serif w-10 px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    <div class="px-4 md:flex sm:items-center">
                      <!-- Settings Dropdown -->
                      <div class="relative">
                        <jet-dropdown-filter align="right" width="">
                          <template #trigger>
                            <button
                              class="flex py-2 items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out my-auto"
                            >
                              <i class="<i fas fa-filter fa-lg text-gray-500 my-auto" />
                            </button>
                          </template>

                          <template #content>
                            <div
                              class="z-50 right-0 bg-white border rounded-md w-80 shadow-lg overflow-hidden"
                            >
                              <div
                                href="#"
                                class="flex items-center px-4 py-1 border-b hover:bg-gray-100 -mx-2"
                              >
                                <p class="object-cover ml-1 w-2/5">
                                  <span class="font-bold text-xs" href="#">Estado</span>
                                </p>
                                <jet-select
                                  @change="filterEstado"
                                  v-model="estado"
                                  class="h-9 mt-1 text-sm w-3/5"
                                >
                                  <template #options>
                                    <!-- <option value=""></option> -->
                                    <option
                                      v-for="estado in estados"
                                      :key="estado.id"
                                      class="border-gray-300 h-12 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      :value="estado.id"
                                    >
                                      {{ estado.name }}
                                    </option>
                                  </template>
                                </jet-select>
                              </div>
                              <div
                                href="#"
                                class="flex items-center px-4 py-1 border-b hover:bg-gray-100 -mx-2"
                              >
                                <p class="object-cover ml-1 w-2/5">
                                  <span class="font-bold text-xs" href="#">Estado</span>
                                </p>
                                <jet-select class="h-9 mt-1 text-sm w-3/5">
                                  <template #options>
                                    <!-- <option value=""></option> -->
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Primaria"
                                    >
                                      Primaria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Secundaria"
                                    >
                                      Secundaria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Tecnico o Tecnologo"
                                    >
                                      Tecnico o Tecnologo
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Carrera Universitaria"
                                    >
                                      Carrera Universitaria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Maestria"
                                    >
                                      Maestria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    >
                                      Doctorado
                                    </option>
                                  </template>
                                </jet-select>
                              </div>
                              <div
                                href="#"
                                class="flex items-center px-4 py-1 border-b hover:bg-gray-100 -mx-2"
                              >
                                <p class="object-cover ml-1 w-2/5">
                                  <span class="font-bold text-xs" href="#">Estado</span>
                                </p>
                                <jet-select class="h-9 mt-1 text-sm w-3/5">
                                  <template #options>
                                    <!-- <option value=""></option> -->
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Primaria"
                                    >
                                      Primaria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Secundaria"
                                    >
                                      Secundaria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Tecnico o Tecnologo"
                                    >
                                      Tecnico o Tecnologo
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Carrera Universitaria"
                                    >
                                      Carrera Universitaria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                      value="Maestria"
                                    >
                                      Maestria
                                    </option>
                                    <option
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    >
                                      Doctorado
                                    </option>
                                  </template>
                                </jet-select>
                              </div>
                            </div>
                          </template>
                        </jet-dropdown-filter>
                      </div>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="solicitud in solicitudes.data" :key="solicitud.id">
                  <td class="px-3 py-2 whitespace-nowrap">
                    <div class="text-center tracking-widest text-sm text-gray-900">
                      {{ solicitud.id }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div class="tracking-widest text-sm oldstyle-nums text-gray-900">
                      {{ formatMiles(solicitud.numeroDeDocumento) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div class="tracking-wide text-sm text-gray-900">
                      {{
                        solicitud.nombre.toUpperCase() +
                        " " +
                        solicitud.apellido.toUpperCase()
                      }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div class="tracking-widest text-base oldstyle-nums text-gray-900">
                      {{ "$ " + formatMiles(solicitud.monto) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div class="tracking-widest text-base oldstyle-nums text-gray-900">
                      {{ formatFecha(new Date(solicitud.updated_at)) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="text-center tracking-widest text-base oldstyle-nums text-gray-900"
                    >
                      {{ formatHora(new Date(solicitud.updated_at)) }}
                    </div>
                  </td>

                  <td class="px-6 py-2 whitespace-nowrap">
                    <div class="w-full items-center">
                      <span
                        v-if="solicitud.solicitud_estado_id == 1"
                        class="px-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900"
                      >
                        Aprobado
                      </span>

                      <span
                        v-if="solicitud.solicitud_estado_id == 2"
                        class="px-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-blue-900"
                      >
                        Pendiente
                      </span>
                      <span
                        v-if="solicitud.solicitud_estado_id == 3"
                        class="px-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-900"
                      >
                        Finalizado
                      </span>
                      <span
                        v-if="solicitud.solicitud_estado_id == 4"
                        class="px-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-900"
                      >
                        Rechazado
                      </span>
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <jet-secondary-button
                      @click.native="editStore(store)"
                      class="tracking-widest text-xs cursor-pointer text-indigo-600 underline hover:text-indigo-900"
                    >
                      Ver Mas
                    </jet-secondary-button>
                  </td>
                </tr>

                <tr v-if="solicitudes.data.length < 2" class="h-8">
                  <br />
                  <br />
                </tr>
                <tr v-if="solicitudes.data.length == 0" class="text-center">
                  <td COLSPAN="8" class="text-center py-2 text-lg text-gray-500">
                    {{ 'No se encontraron datos registrados "' + keyword + '"' }}
                  </td>
                </tr>
                <tr v-if="solicitudes.data.length < 3" class="h-8">
                  <br />
                  <br />
                </tr>

                <!-- More items... -->
              </tbody>
            </table>
          </div>
          <div class="border rounded rounded-t-none">
            <paginator
              :estado="estado"
              :elements="solicitudes"
              :offset="2"
              :keyword="keyword"
            />
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
import JetFormSection from "@/Components/FormTabsSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetNavLink from "@/Jetstream/NavLink";
import TableStores from "../RegitroAlmacen/Tablestores";
import VueCurrencyInput from "vue-currency-input";
import Paginator from "../../Components/Paginator";

export default {
  props: ["sessions", "solicitudes"],

  data() {
    return {
      openTab: 1,
      active:
        "border-solid border border-b-0 border-blue-500 rounded-t-lg py-2 px-6 bg-white text-blue-700",
      inactive:
        "border-solid border border-b-0 border-gray-400 rounded-t-lg py-2 px-6 bg-gray-100 text-gray-600 shadow-lg",
      CreateStoreForm: this.$inertia.form({
        name: "",
        email: "",
        nit: "",
        telefono: "",
        representante: "",
        nombre: "",
        apellido: "",
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
    createStore() {
      this.CreateStoreForm.representante =
        this.CreateStoreForm.nombre + " " + this.CreateStoreForm.apellido;
      this.CreateStoreForm.post(this.route("almacen.store"), {
        onSuccess: () => {
          this.CreateStoreForm.reset();
        },
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
  },
};
</script>
