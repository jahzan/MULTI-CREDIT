<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <jet-form-section :tbs="2" @submitted="hola">
          <template #title> Transferir </template>
          <template #description>
            Solicita desembolso del dinero de creditos ortorgados
          </template>
          <template #tabTitle1
            ><p class="text-base font-semibold">
              Consignacion a Factura Milan
            </p></template
          >
          <template #tabTitle2>
            <p class="text-base font-semibold">
              Consignacion a Cuenta Bancaria
            </p></template
          >
          <template #formContent1>
            <!-- Cuenta Milan -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                for="Cuenta Milan"
                value="Facturas Milan"
                class="font-serif text-xl"
              />
              <hr />
              <br />
            </div>
            <!-- Nit del almacen a consignar -->
            <div
              class="col-span-6 sm:col-span-4"
              v-if="permission.transferencia_create_admin"
            >
              <div class="md:w-2/5">
                <jet-label for="id" value="Nit" />
                <jet-input
                  id="nit"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateTransferForm.nit"
                  autocomplete="nit"
                />
                <jet-input-error
                  :message="CreateTransferForm.errors.nit"
                  class="mt-2"
                />
              </div>
              <br />
            </div>
            <!-- Conten Factura, Monto o Valor a Pagar -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Factura -->
              <div class="md:w-2/5">
                <jet-label for="id" value="Factura" />
                <jet-input
                  id="fact"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateTransferForm.fact"
                  autocomplete="fact"
                />
                <jet-input-error
                  :message="CreateTransferForm.errors.nit"
                  class="mt-2"
                />
              </div>

              <!-- Valor o Monto -->
              <div class="mt-6 md:mt-0 md:ml-2 md:w-3/5">
                <jet-label value="Monto o Valor" />
                <vue-numeric
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  currency="$"
                  separator="."
                  id="monto"
                  v-model="CreateTransferForm.monto"
                >
                </vue-numeric>
              </div>
            </div>
            <br />
            <!-- maximo a solicitar -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <div class="mt-3 md:mt-0 md:ml-0 md:w-3/5">
                <jet-label for="id" value="El Maximo a consignar es de : " />{{
                  "$ " + formatMiles(ctnMilan)
                }}
              </div>
              <div class="mt-3 md:mt-0 md:ml-2 md:w-3/5"></div>
              <!-- Boton Solicitar Consignacion a Milan  -->
              <div
                class="flex flex-wrap items-center content-center mt-3 md:mt-0 md:ml-9 md:w-1/5"
              >
                <jet-button>Solicitar</jet-button>
              </div>
            </div>
          </template>
          <template #formContent2>
            <!-- Banco Consignacion -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                for="Banco C"
                value="Banco a Consignar"
                class="font-serif text-xl"
              />
              <hr />
            </div>
            <br />
            <!-- Banco y Nit -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- Nit -->
              <div
                class="md:w-2/5"
                v-if="permission.transferencia_create_admin"
              >
                <jet-label for="FecExp" value="Nit del almacen" />
                <jet-input
                  id="Ncuenta"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateTransferForm.Cuenta"
                  autocomplete="Ncuenta"
                />
                <jet-input-error
                  :message="CreateTransferForm.errors.name"
                  class="mt-2"
                />
              </div>
              <!-- Banco Name -->
            </div>
            <!-- Numero de cuenta Banco -->

            <!-- Cuenta -->
            <div>
            <div  class="col-span-6 sm:col-span-4 md:flex">
              <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
                <jet-label for="id" value="Banco" />
                <jet-input 
                    id="banco"
                  type="text"
                  class="block w-full mt-1"
                  
                  
                  />
                <jet-input-error
                  :message="CreateTransferForm.errors.nit"
                  class="mt-2"
                />
              </div>
              <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
                <jet-label for="id" value="Número de cuenta" />
                <jet-input
                  id="Ncuenta"
                  type="number"
                  class="block w-full mt-1"
                  v-model="CreateTransferForm.Cuenta"
                  autocomplete="Ncuenta"
                />
                <jet-input-error
                  :message="CreateTransferForm.errors.nit"
                  class="mt-2"
                />
              </div>
            </div>

              <!-- Monto o Valor -->
              <div class="mt-6 md:mt-0 md:ml-2 md:w-3/5">
                <jet-label for="FecExp" value="Monto o Valor" />
                <vue-numeric
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  currency="$"
                  separator="."
                  id="monto"
                  v-model="CreateTransferForm.monto"
                >
                </vue-numeric>
                <jet-input-error
                  :message="CreateTransferForm.errors.name"
                  class="mt-2"
                />
              </div>
            </div>
            <br />
            <!-- maximo a solicitar -->
            <div class="col-span-6 sm:col-span-4 md:flex">
              <div class="mt-3 md:mt-0 md:ml-0 md:w-3/5">
                <jet-label for="id" value="El Maximo a consignar es de : " />{{
                  "$ " + formatMiles(ctnBcon)
                }}
              </div>
              <div class="mt-3 md:mt-0 md:ml-2 md:w-3/5"></div>
              <!-- Boton Solicitar Consignacion a Milan  -->
              <div
                class="flex flex-wrap items-center content-center mt-3 md:mt-0 md:ml-9 md:w-1/5"
              >
                <jet-button>Solicitar</jet-button>
              </div>
            </div>
          </template>
        </jet-form-section>
        <div class="">
          <br />
          <br />
          <div
            class="overflow-hidden overflow-x-auto border rounded rounded-b-none "
          >
            <table
              class="min-w-full overflow-hidden bg-white border border-gray-200 divide-y rounded-md rounded-b-none "
            >
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="w-8 px-6 py-3 font-serif text-sm font-medium font-extrabold tracking-wider text-left text-gray-500 uppercase "
                  >
                    #
                  </th>
                  <th
                    scope="col"
                    class="w-10 px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase "
                  >
                    Cedula
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase "
                  >
                    Nombre
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase "
                  >
                    Monto
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase "
                  >
                    Fecha
                  </th>

                  <th
                    scope="col"
                    class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-center text-gray-500 uppercase "
                  >
                    Hora
                  </th>

                  <th
                    scope="col"
                    class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase "
                  >
                    Estado
                  </th>

                  <th
                    scope="col"
                    class="w-10 px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase "
                  ></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="solicitud in solicitudes.data" :key="solicitud.id">
                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="text-sm tracking-widest text-center text-gray-900"
                    >
                      {{ solicitud.id }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="text-sm tracking-widest text-gray-900 oldstyle-nums"
                    >
                      {{ formatMiles(solicitud.numeroDeDocumento) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div class="text-sm tracking-wide text-gray-900">
                      {{
                        solicitud.nombre.toUpperCase() +
                        " " +
                        solicitud.apellido.toUpperCase()
                      }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="text-base tracking-widest text-gray-900 oldstyle-nums"
                    >
                      {{ "$ " + formatMiles(solicitud.monto) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="text-base tracking-widest text-gray-900 oldstyle-nums"
                    >
                      {{ formatFecha(new Date(solicitud.updated_at)) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="text-base tracking-widest text-center text-gray-900 oldstyle-nums"
                    >
                      {{ formatHora(new Date(solicitud.updated_at)) }}
                    </div>
                  </td>
                  <!-- borre los estados que no se utilizan en esta vista -->
                  <td class="px-6 py-2 whitespace-nowrap">
                    <div class="items-center w-full">
                      <span
                        v-if="solicitud.solicitud_estado_id == 3"
                        class="inline-flex px-1 text-xs font-semibold leading-5 text-green-900 bg-green-200 rounded-full "
                      >
                        Aprobado
                      </span>
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <jet-secondary-button
                      @click.native="editStore(store)"
                      class="text-xs tracking-widest text-indigo-600 underline cursor-pointer hover:text-indigo-900"
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
                  <td
                    COLSPAN="8"
                    class="py-2 text-lg text-center text-gray-500"
                  >
                    {{
                      'No se encontraron datos registrados "' + keyword + '"'
                    }}
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
  props: ["sessions", "solicitudes", "ctnMilan", "ctnBcon"],

  data() {
    return {
      openTab: 1,
      CreateTransferForm: this.$inertia.form({
        nit: "",
        fact: "",
        monto: "",
        _token: this.$page.props.csrf_token,
      }),
      keyword: "",
      permission: this.$inertia.page.props.permissions,
    };
  },

  computed: {
    isMargin() {
      if (this.permission.transferencia_create_admin) {
        return "mt-6 md:mt-0 md:ml-2";
      }
    },
  },

  methods: {
    hola() {
      console.log("hola mundo");
    },
    toggleTabs(tabNumber) {
      this.openTab = tabNumber;
    },    
    createStore() {
      this.CreateTransferForm.representante =
        this.CreateTransferForm.nombre + " " + this.CreateTransferForm.apellido;
      this.CreateTransferForm.post(this.route("almacen.store"), {
        onSuccess: () => {
          this.CreateTransferForm.reset();
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
