<template>
  <app-layout>
    <div class="mx-auto max-w-7xl py-7 sm:px-6 lg:px-8">
      <!-- formulario socioeconomico -->
      <jet-form-section>
        <template #title> Solicitud de credito </template>
        <template #description> Formulario para solicitar credito </template>
        <template #form>
          <!-- Label de Datos Socioeconomicos -->
          <div class="col-span-6 sm:col-span-4">
            <jet-label
              for="Socioeconomicos"
              value="Datos Socioeconomicos"
              class="font-serif text-xl"
            />
            <hr />
          </div>

          <!-- Content Estado civil Y personas a cargo -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Estado civil -->
            <div class="md:w-4/5">
              <jet-label for="estadoCivil" value="Estado Civil" />
              <jet-select
                id="estadoCivil"
                v-model="CreateSocioeconimicoForm.estadoCivil"
                class="block w-full mt-1"
              >
                <template #options>
                  <!-- <option value=""></option> -->
                  <option
                    class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    value="Soltero"
                  >
                    Soltero
                  </option>
                  <option
                    class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    value="Casado"
                  >
                    Casado
                  </option>
                  <option
                    class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    value="Divorciado"
                  >
                    Divorciado
                  </option>
                  <option
                    class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    value="Vido"
                  >
                    Vido
                  </option>
                </template>
              </jet-select>
              <jet-input-error
                :message="CreateSocioeconimicoForm.errors.estadoCivil"
                class="mt-2"
              />
            </div>
            <!-- Personas acargo -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
              <jet-label for="PersonasCargo" value="Personas a cargo" />
              <jet-input
                id="PersonasCargo"
                min="0"
                type="number"
                v-model="CreateSocioeconimicoForm.personasCargo"
                class="block w-full mt-1"
              />
              <jet-input-error
                :message="CreateSocioeconimicoForm.errors.personasCargo"
                class="mt-2"
              />
            </div>
          </div>

          <!-- Sexo -->
          <div class="w-full col-span-6 sm:col-span-4">
            <jet-label for="LevelAca" value="Sexo" />
            <input
              name="sexo"
              type="radio"
              id="M"
              value="Masculino"
              v-model="CreateSocioeconimicoForm.sexo"
            />
            <label for="M">Masculino</label>
            <input
              name="sexo"
              type="radio"
              id="F"
              value="Femenino"
              v-model="CreateSocioeconimicoForm.sexo"
              class="ml-6"
            />
            <label for="F">Femenino</label>
            <jet-input-error
              :message="CreateSocioeconimicoForm.errors.sexo"
              class="mt-2"
            />
          </div>

          <!-- Tipo de vivienda -->
          <div class="w-full col-span-6 sm:col-span-4">
            <jet-label for="LevelAca" value="Tipo de vivienda" />
            <jet-select
              class="w-full mt-1"
              v-model="CreateSocioeconimicoForm.tipoVivienda"
            >
              <template #options>
                <!-- <option value=""></option> -->
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Propietario"
                >
                  Propia
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Hipoteca"
                >
                  Hipoteca
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Leasing Habitacional"
                >
                  Contrato leasing habitacional
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Familiar"
                >
                  Familiar
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Arrendatario"
                >
                  Arrendada
                </option>
              </template>
            </jet-select>
            <jet-input-error
              :message="CreateSocioeconimicoForm.errors.tipoVivienda"
              class="mt-2"
            />
          </div>

          <!-- Content Departamento y Municipio -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Departamento -->
            <div class="md:w-3/5">
              <jet-label for="departamento" value="Departamento" />
              <jet-select-search
                :data="departamentos"
                v-model.trim="departamento"
                v-on:asignar="asignarDepartamento"
                v-on:select="cargarCiudades"
                placeholder="Buscar Departamento..."
              ></jet-select-search>
              <jet-input-error
                :message="CreateSocioeconimicoForm.errors.departamento"
                class="mt-2"
              />
            </div>
            <!-- Ciudad -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-3/5">
              <jet-label for="ciudad" value="Ciudad" />
              <jet-select-search
                :data="ciudades"
                v-model.trim="ciudad"
                v-on:asignar="asignarCiudad"
                placeholder="Buscar Ciudad..."
              ></jet-select-search>
              <jet-input-error
                :message="CreateSocioeconimicoForm.errors.ciudad"
                class="mt-2"
              />
            </div>
          </div>

          <!--Content Direccion -->
          <div class="col-span-6 sm:col-span-4">
            <jet-label for="phone" value="Direccion" />
            <jet-input
              id="direccion"
              type="text"
              v-model="CreateSocioeconimicoForm.direccion"
              class="block w-full mt-1"
            />
            <jet-input-error
              :message="CreateSocioeconimicoForm.errors.direccion"
              class="mt-2"
            />
          </div>

          <!-- Datos Finacieros -->
          <div class="col-span-6 sm:col-span-4">
            <jet-label
              for="Empresa"
              value="Datos Financieros"
              class="font-serif text-xl"
            />
            <hr />
          </div>

          <!-- Content Nivel academico -->
          <div class="w-full col-span-6 sm:col-span-4">
            <jet-label for="LevelAca" value="Nivel Academico" />
            <jet-select
              class="w-full mt-1"
              v-model="CreateSocioeconimicoForm.nivelAcademico"
            >
              <template #options>
                <!-- <option value=""></option> -->
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Primaria"
                >
                  Primaria
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Secundaria"
                >
                  Secundaria
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Tecnico o Tecnologo"
                >
                  Tecnico o Tecnologo
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Carrera Universitaria"
                >
                  Carrera Universitaria
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  value="Maestria"
                >
                  Maestria
                </option>
                <option
                  class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                  Doctorado
                </option>
              </template>
            </jet-select>
            <jet-input-error
              :message="CreateSocioeconimicoForm.errors.nivelAcademico"
              class="mt-2"
            />
          </div>

          <!-- Content Estado laboral y Pensionado -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Estado laboral -->
            <div class="md:w-4/5">
              <jet-label
                for="estadoLaboral"
                value="Actualmente estas laborando?"
              />
              <input
                name="estadoLaboral"
                type="radio"
                id="estadoLaboralY"
                :value="true"
                v-model="CreateSocioeconimicoForm.estadoLaboral"
              />
              <label for="estadoLaboralY">Si</label>
              <input
                name="estadoLaboral"
                type="radio"
                id="estadoLaboralN"
                :value="false"
                v-model="CreateSocioeconimicoForm.estadoLaboral"
                class="ml-6"
              />
              <label for="estadoLaboralN">No</label>
              <jet-input-error
                :message="CreateSocioeconimicoForm.errors.estadoLaboral"
                class="mt-2"
              />
            </div>
            <!-- Pensionado -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/5">
              <jet-label for="pensionado" value="Eres pensionado?" />
              <input
                name="pensionado"
                type="radio"
                id="pensionadoY"
                :value="true"
                v-model="CreateSocioeconimicoForm.pensionado"
              />
              <label for="pensionadoY">Si</label>
              <input
                name="pensionado"
                type="radio"
                id="pensionadoN"
                :value="false"
                v-model="CreateSocioeconimicoForm.pensionado"
                class="ml-6"
              />
              <label for="pensionadoN">No</label>
              <jet-input-error
                :message="CreateSocioeconimicoForm.errors.pensionado"
                class="mt-2"
              />
            </div>
          </div>

          <!-- contenedor para mostrar si esta trabajando -->
          <transition name="fade">
            <div
              class="w-full col-span-6 sm:col-span-4"
              v-if="CreateSocioeconimicoForm.estadoLaboral"
            >
              <!--Empresa donde labora -->
              <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Empresa donde labora" />
                <jet-input
                  id="phone"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateSocioeconimicoForm.empresaLabora"
                />
              </div>
              <br />
              <!--telefono -->
              <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="#Tel. de la Empresa" />
                <jet-input
                  id="phone"
                  type="text"
                  class="block w-full mt-1"
                  v-model="CreateSocioeconimicoForm.telEmpresa"
                />
              </div>
              <br />
              <!--Direccion de la empresa -->
              <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Direccion de la empresa" />
                <jet-input
                  id="direccionEmpresa"
                  type="text"
                  class="block w-full mt-1"
                  v-model.trim="CreateSocioeconimicoForm.dirEmpresa"
                />
              </div>
            </div>
          </transition>
          <!-- Content Ingresos fijos, Ingresos variables, Gastos -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Ingresos Fijos -->
            <div class="md:w-2/6">
              <jet-label for="id" value="Ingresos Fijos Mens." />
              <vue-numeric
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                currency="$"
                separator="."
                v-model="CreateSocioeconimicoForm.ingresos"
                :value="0"
              ></vue-numeric>
              <!-- <jet-input-error :message="CreateSolicitudForm.errors.name" class="mt-2" /> -->
            </div>
            <!-- Otros Ingresos -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/6">
              <jet-label for="FecExp" value="Otros Ingresos Mens." />
              <vue-numeric
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                currency="$"
                separator="."
                v-model="CreateSocioeconimicoForm.otrosIngresos"
                :value="0"
              ></vue-numeric>
              <!-- <jet-input-error :message="CreateSolicitudForm.errors.name" class="mt-2" /> -->
            </div>

            <!--Gastos Mensuales -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/6">
              <jet-label for="phone" value="Gastos Mens." />
              <vue-numeric
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                currency="$"
                separator="."
                v-model="CreateSocioeconimicoForm.gastos"
                :value="0"
              ></vue-numeric>
            </div>
          </div>
        </template>
        <template #actions>
          <jet-action-message class="mr-3"> Guardado </jet-action-message>
          <div class="flex w-full">
            <div class="flex-grow"></div>
            <button
              v-on:click="createSocioeconimico"
              class="items-center flex-none px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
            >
              Siguiente...
            </button>
          </div>
        </template> </jet-form-section
      ><!-- fin formulario socioeconomico -->
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetFormSection from "@/Jetstream/FormSection";
import JetLabel from "@/Jetstream/Label";
import JetSelect from "@/Components/Select";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetSelectSearch from "@/Components/SelectSearch";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
  components: {
    AppLayout,
    JetFormSection,
    JetLabel,
    JetSelect,
    JetInput,
    JetInputError,
    JetSelectSearch,
    JetActionMessage,
  },
  props: ["idSolicitud", "ciudades", "departamentos"],

  data() {
    return {
      CreateSocioeconimicoForm: this.$inertia.form({
        estadoCivil: null,
        personasCargo: null,
        sexo: null,
        tipoVivienda: null,
        departamento: null,
        ciudad: null,
        direccion: null,
        nivelAcademico: null,
        estadoLaboral: null,
        pensionado: null,
        empresaLabora: null,
        telEmpresa: null,
        dirEmpresa: null,
        ingresos: null,
        otrosIngresos: null,
        gastos: null,
        idSolicitud: this.idSolicitud,
      }),
      ciudad: null,
      departamento: null,
    };
  },

  methods: {
    cargarCiudades() {
      this.$inertia.get(
        route("socioeconomico.index"),
        {
          id_solicitud       : this.idSolicitud,
          id_departamento   : this.CreateSocioeconimicoForm.departamento
        },
        {
          errorBag: null,
          preserveScroll: true,
          preserveState: true,
        }
      );
    },

    asignarDepartamento(idItem) {
      this.CreateSocioeconimicoForm.departamento = idItem.id;
    },

    asignarCiudad(idItem) {
      this.CreateSocioeconimicoForm.ciudad = idItem.id;
    },

    createSocioeconimico() {
      this.CreateSocioeconimicoForm.post(route("socioeconomico.store"), {
        errorBag: null,
        preserveScroll: true,
        preserveState: true,
        onBefore: (visit) => {
          this.$loading(true);
        },
        onSuccess: () => {
          this.$loading(false);
        },
        onError: () => {
          this.$loading(false);
          console.error(this.CreateSolicitudForm.errors);
        },
      });
    },
  },
};
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
</style>