<template>
  <app-layout>
    <div class="mx-auto max-w-7xl py-7 sm:px-6 lg:px-8">

      <!-- Formulario Autorizacion -->
      <jet-form-section>
        <template #title> Solicitud de credito </template>

        <template #description> Formulario para solicitar credito </template>

        <template #form>
          <!-- Label -->

          <div class="col-span-6 sm:col-span-4">
            <jet-label
              for="Empresa"
              value="Datos Personales"
              class="font-serif text-xl"
            />
            <hr />
          </div>
          <!-- Conten fecha de expedicion y numero de cedula -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Cedula -->
            <div class="md:w-1/6 ">
              <jet-label for="id" value="Tipo" />
              <!-- <jet-select
                id="id"
                v-model="CreateSolicitudForm.tipoDoc"
                class="block w-full mt-1"
                autocomplete="id"
              >
                <template#options>
                  <option v-for="tipoDoc in tiposDoc" :value="tipoDoc" :key="tipoDoc">{{tipoDoc}}</option>
                </template>
              </jet-select> -->
              <jet-select-search
                  :data="documentosId"
                  v-model.trim="CreateSolicitudForm.tipoDoc"
                  dropdownClass="absolute w-72 z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md"
                  class="block w-full mt-1 mb-6 mr-2 text-gray-500 sm:mr-0"
                  placeholder="Tipo "
              />
              <jet-input-error
                :message="CreateSolicitudForm.errors.tipoDoc"
                class="mt-2"
              />
            </div>
            <!-- Cedula -->
            <div class="md:w-2/5 ">
              <jet-label for="id" value="Documento" />
              <jet-input
                id="id"
                type="number"
                v-model="CreateSolicitudForm.numeroDeDocumento"
                class="block w-full mt-1 md:ml-1"
                autocomplete="id"
              />
              <jet-input-error
                :message="CreateSolicitudForm.errors.numeroDeDocumento"
                class="mt-2"
              />
            </div>
            <!-- Fec. exp. -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
              <jet-label for="FecExp" value="Fec. exp." />
              <jet-input
                id="FecExp"
                type="date"
                v-model="CreateSolicitudForm.fechaExpedicion"
                class="block w-full mt-1"
                autocomplete="FecExp"
              />
              <jet-input-error
                :message="CreateSolicitudForm.errors.fechaExpedicion"
                class="mt-2"
              />
            </div>
          </div>
          <!-- Nombres y apellidos -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Nombres -->
            <div class="md:w-3/6">
              <jet-label for="name" value="Nombres Completos" />
              <jet-input
                id="name"
                type="text"
                v-model="CreateSolicitudForm.nombre"
                class="block w-full mt-1"
              />
              <jet-input-error
                :message="CreateSolicitudForm.errors.nombre"
                class="mt-2"
              />
            </div>

            <!-- Apellido -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-3/6">
              <jet-label for="lastname" value="Apellidos Completos" />
              <jet-input
                id="lastname"
                v-model="CreateSolicitudForm.apellido"
                type="text"
                class="block w-full mt-1"
                autocomplete="lastname"
              />
              <jet-input-error
                :message="CreateSolicitudForm.errors.apellido"
                class="mt-2"
              />
            </div>
          </div>
          <!-- Fecha de nacimiento -->
          <div class="col-span-6 sm:col-span-4">
            <jet-label for="FechaNacimiento" value="Fecha de nacimiento" />
            <jet-input
              id="FechaNacimiento"
              type="date"
              class="block w-full mt-1"
              autocomplete="FechaNacimiento"
              v-model="CreateSolicitudForm.fechaNacimiento"
            />
            <jet-input-error
              :message="CreateSolicitudForm.errors.fechaNacimiento"
              class="mt-2"
            />
          </div>

          <!-- Monto Solicitado -->
          <div class="col-span-6 sm:col-span-4">
            <jet-label for="monto" value="Monto Solicitado" />
            <vue-numeric
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              currency="$"
              separator="."
              :precision="2"
              v-model="CreateSolicitudForm.monto"
              id="monto"
              :value="0"
            ></vue-numeric>
            <jet-input-error :message="CreateSolicitudForm.errors.monto" class="mt-2" />
          </div>

          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Email -->
            <div class="md:w-3/5">
              <jet-label for="email" value="Correo Electronico" />
              <jet-input
                id="email"
                type="email"
                class="block w-full mt-1"
                v-model="CreateSolicitudForm.email"
              />
              <jet-input-error :message="CreateSolicitudForm.errors.email" class="mt-2" />
            </div>

            <!-- Numero de Celular -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
              <jet-label for="telefono" value="Celular" />
              <jet-input
                id="phone"
                type="tel"
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                class="block w-full mt-1"
                autocomplete="telefono"
                v-model="CreateSolicitudForm.telefono"
              />
              <jet-input-error
                :message="CreateSolicitudForm.errors.telefono"
                class="mt-2"
              />
            </div>
          </div>
        </template>
        <template #actions>
          <jet-action-message class="mr-3"> Guardado </jet-action-message>
          <div class="flex w-full">
            <!-- <button
              v-on:click="prev"
              class="items-center flex-none px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">
              ..Anterior
            </button> -->
            <div class="flex-grow"></div>
            <button
              @click="sendOtp"
              class="items-center flex-none px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
            >
              Siguiente...
            </button>
          </div>
        </template>

      </jet-form-section><!-- Fin formulario Autorizacion -->


      <!-- Modal para codigo de autorizacion -->
      <jet-dialog-modal :show="activeModal" :maxWidth="width">
        <template #title>
          <jet-label
            for="Empresa"
            value="Verificacion"
            class="inline-block font-serif text-xl"
          />
          <hr />
        </template>

        <template #content>
          Se requiere autorizacion del cliente, se le ha enviado un sms con un codigo al
          cliente para validar identidad.
          <br />
          <div class="mx-auto sm:w-6/12">
            <jet-input
              id="Otp"
              type="number"
              :max="999999"
              v-model="CreateSolicitudForm.otpToken"
              class="block w-full mt-1 text-3xl text-center text-gray-600"
            />
          </div>
        </template>

        <template #footer>

          <jet-danger-button class="float-left" @click.native="closeModalOtp">
            Cerrar
          </jet-danger-button>

          <jet-secondary-button @click.native="closeModalOtp">
            Reenviar
          </jet-secondary-button>

          <jet-button class="ml-2" @click.native="verifcarOtp">
            Verificar
          </jet-button>

        </template>
      </jet-dialog-modal><!-- Fin modal para codigo de autorizacion -->

    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetActionSection from "@/Jetstream/ActionSection";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import JetButton from "@/Jetstream/Button";
import JetSuccessButton from "@/Jetstream/SuccessButton";
import JetFormSection from "@/Jetstream/FormSectionSmall";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetNavLink from "@/Jetstream/NavLink";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetSelectSearch from "@/Components/SelectSearchId2";
import JetSelect from "@/Components/Select";
export default {
  components: {
    AppLayout,
    JetFormSection,
    JetDialogModal,
    JetInput,
    JetActionSection,
    JetSectionBorder,
    JetButton,
    JetInputError,
    JetLabel,
    JetActionMessage,
    JetSecondaryButton,
    JetDangerButton,
    JetNavLink,
    JetSelect,
    JetSuccessButton,
    JetSelectSearch,
  },
  props:['otpId'],
  data() {
    return {
      CreateSolicitudForm: this.$inertia.form({
        nombre              : null,
        apellido            : null,
        numeroDeDocumento   : null,
        fechaExpedicion     : null,
        fechaNacimiento     : null,
        telefono            : null,
        email               : null,
        monto               : 0,
        tipoDoc             : null,
        otpId               : this.otpId,
        otpToken            : null,
        _token              : this.$page.props.csrf_token,
      }),
      activeModal: false,
      width: "2xl",
      documentosId:[
          {
              id: "CC",
              name: "Cedula Ciudadania"
          },
          {
              id: "CE",
              name: "Cedula Extrajero"
          },
          {
              id: "PA",
              name: "Pasaporte"
          },
          {
              id: "TI",
              name: "Tarjeta de Identidad"
          },
          {
              id: "RC",
              name: "Registro Civil"
          },
          {
              id: "CD",
              name: "Carnet Diplomatico"
          }
      ],
    };
  },
  methods: {
    next: function (event) {
      this.paginate += 1;
    },

    prev: function (event) {
      this.paginate -= 1;
    },

    openModalOtp(){
      this.activeModal = true;
    },

    closeModalOtp() {
      this.activeModal = false;
    },

    sendOtp(){
      this.CreateSolicitudForm.post(
        route("sendOtp"), {
          errorBag: null,
          preserveScroll: true,
          preserveState: true,
          onBefore: (visit) => {
            this.$loading(true);
          },
          onSuccess: () => {
            this.CreateSolicitudForm.otpId = this.otpId;
            this.$loading(false);
            this.openModalOtp();

          },
          onError: () => {
            this.$loading(false);
            console.error(this.CreateSolicitudForm.errors);

          },
        }
      );
    },

    verifcarOtp() {
      this.CreateSolicitudForm.post(
        route("solicitud.store"), {
          errorBag: null,
          preserveScroll: true,
          preserveState: true,
          onBefore: (visit) => {
            this.$loading(true);
          },
          onSuccess: () => {
            this.$loading(false);
            this.$swal("Solicitud Aprobada!", "Continua con la informacion socioeconomica", "success");
          },
          onError: () => {
            this.activeModal = false;
            this.$loading(false);
            this.$swal(this.$inertia.page.props.errors.message, this.$inertia.page.props.errors.description, this.$inertia.page.props.errors.type);
            if(this.$inertia.page.props.errors.type === "error"){
                this.CreateSolicitudForm.reset();
            }
            console.error(this.CreateSolicitudForm.errors);
          },
        }
      );

    },

    createSolicitud() {
      this.CreateSolicitudForm.post(
        route("solicitud.store"), {
          errorBag: null,
          preserveScroll: true,
          preserveState: true,
          onBefore: (visit) => {
            this.$loading(true);
          },
          onSuccess: () => {
            this.$loading(false);
            this.CreateSolicitudForm.otpId = this.otpId;
          },
          onError: () => {
            this.$loading(false);
            console.error(this.CreateSolicitudForm.errors);
          },
        }
      );
    },
  },
};
</script>
