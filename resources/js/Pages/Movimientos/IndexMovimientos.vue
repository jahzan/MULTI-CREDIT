<template>
  <app-layout>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <jet-form-section>
        <template #title>
          <div>Movimientos</div>
        </template>
        <template #description> Muestra o crea un Movimiento</template>
        <template #form>
          <!-- Socio de negocios -->
          <div class="col-span-12 sm:col-span-4 md:flex">
            <!-- Nombre -->
            <div class="w-full">
              <jet-label
                for="representante"
                value="Selecciona el Socio"
                class="mb-1"
              />
              <jet-select-search
                :data="socioNegocios"
                v-model="socioSearch"
                v-on:asignar="asignar"
                v-on:reset="reset"
                placeholder="Busca Socio..."
              ></jet-select-search>
            </div>
          </div>
          <!--Empresa donde labora -->
          <div class="col-span-12 sm:col-span-4">
            <jet-label for="nombre" value="Numero de Documento" />
            <jet-input
              id="nombre"
              type="text"
              class="block w-full mt-1"
              v-model="socio.id"
              disabled
            />
          </div>

          <div class="w-full col-span-5 row-span-2 sm:col-span-4">
            <div
              class="items-center text-center text-gray-400 align-middle bg-gray-200 rounded shadow-md sm:float-right h-36 w-28 py-9 text-7xl"
            >
              <div v-show="socio.tipo_socio_id == 2">
                <i class="fas fa-user"></i>
              </div>
              <div v-show="socio.tipo_socio_id == 1">
                <i class="fas fa-store"></i>
              </div>
              <div v-show="socio.tipo_socio_id == null">
                <span> NN </span>
              </div>
            </div>
          </div>

          <!--Empresa donde labora -->
          <div class="col-span-12 sm:col-span-4">
            <jet-label for="nombre" value="Numero de Documento" />
            <jet-input
              id="nombre"
              type="text"
              class="block w-full mt-1"
              v-model="socio.id"
              disabled
            />
          </div>
          <!--Empresa donde labora -->
          <div class="col-span-12 sm:col-span-4">
            <jet-label for="nombre" value="Numero de Documento" />
            <jet-input
              id="nombre"
              type="text"
              class="block w-full mt-1"
              v-model="socio.id"
              disabled
            />
          </div>
          <!-- Socio de negocios -->
          <div class="col-span-7 sm:col-span-12 md:flex">
            <div class="float-right w-full sm:w-1/3">
              <jet-label
                for="representante"
                value="Monto Retiro Bco"
                class="mb-2"
              />
              <vue-numeric
                currency="$"
                v-model="socio.amountDispoBcn"
                separator="."
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                disabled
                type="text"
              />
            </div>
            <div class="float-right w-full sm:px-2 sm:w-1/3">
              <jet-label
                for="representante"
                value="Monto Facturas Milan"
                class="mb-2"
              />
              <vue-numeric
                currency="$"
                v-model="socio.amountDispoMln"
                separator="."
                type="text"
                disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              />
            </div>
            <div class="float-right w-full sm:w-1/3">
              <jet-label for="representante" value="Valor Deuda" class="mb-2" />
              <vue-numeric
                currency="$"
                v-model="socio.amountDeuda"
                separator="."
                type="text"
                disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              />
            </div>
          </div>
        </template>
      </jet-form-section>
      <table-movimientos :solicitudes="{data:[]}"></table-movimientos>

    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetActionSection from "@/Jetstream/ActionSection";
import JetActionSectionFull from "@/Jetstream/ActionSectionFull";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSectionWidth";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetNavLink from "@/Jetstream/NavLink";
import TableStores from "../RegitroAlmacen/Tablestores";
import VueCurrencyInput from "vue-currency-input";
import Paginator from "../../Components/Paginator";
import JetSelectSearch from "@/Components/SelectSearchId";
import TableMovimientos from "./TableMovimientos";

export default {
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
    JetSelectSearch,
    TableMovimientos
  },
  props: ["socioNegocios", "solicitudes"],
  data() {
    return {
      socioSearch: null,
      socio: {
      },
    };
  },
  methods: {
    asignar(item) {
      this.socio = item;
    },
    reset(){
        this.socio = {};
    },
  },
};
</script>
