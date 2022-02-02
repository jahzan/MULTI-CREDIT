<template>
  <app-layout>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section @submitted="searchSolicitud">
          <template #title> Solicitudes de Credito </template>

          <template #description>
            Puedes Aprobar o Rechazar Solicitudes Credito
          </template>

          <template #form>
            <!-- Nit -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="Cedula" value="Cedula" />
              <jet-input
                placeholder='Busca solicitud por "Cedula" '
                id="query"
                type="text"
                v-model="keyword"
                @keyup="searchSolicitud"
                class="mt-1 block w-full"
                autocomplete="cedula"
                required
                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46"
              />
              <jet-input-error class="mt-2" />
            </div>
          </template>

          <template #actions>
            <jet-action-message class="mr-3"> Guardado </jet-action-message>

            <jet-button> Buscar </jet-button>
          </template>
        </jet-form-section>
        <div class="">
          <br />
          <br />

          <div
            class="
              overflow-hidden overflow-x-auto
              border
              rounded rounded-b-none
            "
          >
            <table
              class="
                bg-white
                min-w-full
                divide-y
                overflow-hidden
                rounded-b-none rounded-md
                border border-gray-200
              "
            >
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="
                      font-extrabold font-serif
                      w-8
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    #
                  </th>
                  <th
                    scope="col"
                    class="
                      font-serif
                      px-6
                      w-10
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Cedula
                  </th>
                  <th
                    scope="col"
                    class="
                      font-serif
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Nombre
                  </th>
                  <th
                    scope="col"
                    class="
                      font-serif
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Monto
                  </th>
                  <th
                    scope="col"
                    class="
                      font-serif
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Fecha
                  </th>

                  <th
                    scope="col"
                    class="
                      text-center
                      font-serif
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Hora
                  </th>

                  <th
                    scope="col"
                    class="
                      font-serif
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Estado
                  </th>

                  <th
                    scope="col"
                    class="
                      font-serif
                      w-10
                      px-6
                      py-3
                      text-left text-sm
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    <div class="px-4 md:flex sm:items-center">
                      <!-- Settings Dropdown -->
                      <div class="relative">
                        <jet-dropdown-filter align="right" width="">
                          <template #trigger>
                            <button
                              class="
                                flex
                                py-2
                                items-center
                                text-sm
                                border-2 border-transparent
                                rounded-full
                                focus:outline-none focus:border-gray-300
                                transition
                                duration-150
                                ease-in-out
                                my-auto
                              "
                            >
                              <i
                                class="
                                  <i
                                  fas
                                  fa-filter fa-lg
                                  text-gray-500
                                  my-auto
                                "
                              />
                            </button>
                          </template>

                          <template #content>
                            <div
                              class="
                                z-50
                                right-0
                                bg-white
                                border
                                rounded-md
                                w-80
                                shadow-lg
                                overflow-hidden
                              "
                            >
                              <div
                                href="#"
                                class="
                                  flex
                                  items-center
                                  px-4
                                  py-1
                                  border-b
                                  hover:bg-gray-100
                                  -mx-2
                                "
                              >
                                <p class="object-cover ml-1 w-2/5">
                                  <span class="font-bold text-xs" href="#"
                                    >Estado</span
                                  >
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
                                      class="
                                        border-gray-300
                                        h-12
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      :value="estado.id"
                                    >
                                      {{ estado.name }}
                                    </option>
                                  </template>
                                </jet-select>
                              </div>
                              <div
                                href="#"
                                class="
                                  flex
                                  items-center
                                  px-4
                                  py-1
                                  border-b
                                  hover:bg-gray-100
                                  -mx-2
                                "
                              >
                                <p class="object-cover ml-1 w-2/5">
                                  <span class="font-bold text-xs" href="#"
                                    >Estado</span
                                  >
                                </p>
                                <jet-select class="h-9 mt-1 text-sm w-3/5">
                                  <template #options>
                                    <!-- <option value=""></option> -->
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Primaria"
                                    >
                                      Primaria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Secundaria"
                                    >
                                      Secundaria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Tecnico o Tecnologo"
                                    >
                                      Tecnico o Tecnologo
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Carrera Universitaria"
                                    >
                                      Carrera Universitaria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Maestria"
                                    >
                                      Maestria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                    >
                                      Doctorado
                                    </option>
                                  </template>
                                </jet-select>
                              </div>
                              <div
                                href="#"
                                class="
                                  flex
                                  items-center
                                  px-4
                                  py-1
                                  border-b
                                  hover:bg-gray-100
                                  -mx-2
                                "
                              >
                                <p class="object-cover ml-1 w-2/5">
                                  <span class="font-bold text-xs" href="#"
                                    >Estado</span
                                  >
                                </p>
                                <jet-select class="h-9 mt-1 text-sm w-3/5">
                                  <template #options>
                                    <!-- <option value=""></option> -->
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Primaria"
                                    >
                                      Primaria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Secundaria"
                                    >
                                      Secundaria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Tecnico o Tecnologo"
                                    >
                                      Tecnico o Tecnologo
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Carrera Universitaria"
                                    >
                                      Carrera Universitaria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
                                      value="Maestria"
                                    >
                                      Maestria
                                    </option>
                                    <option
                                      class="
                                        border-gray-300
                                        focus:border-indigo-300
                                        focus:ring
                                        focus:ring-indigo-200
                                        focus:ring-opacity-50
                                        rounded-md
                                        shadow-sm
                                      "
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
                    <div
                      class="text-center tracking-widest text-sm text-gray-900"
                    >
                      {{ solicitud.id }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="
                        tracking-widest
                        text-sm
                        oldstyle-nums
                        text-gray-900
                      "
                    >
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
                    <div
                      class="
                        tracking-widest
                        text-base
                        oldstyle-nums
                        text-gray-900
                      "
                    >
                      {{ "$ " + formatMiles(solicitud.monto) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="
                        tracking-widest
                        text-base
                        oldstyle-nums
                        text-gray-900
                      "
                    >
                      {{ formatFecha(new Date(solicitud.updated_at)) }}
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <div
                      class="
                        text-center
                        tracking-widest
                        text-base
                        oldstyle-nums
                        text-gray-900
                      "
                    >
                      {{ formatHora(new Date(solicitud.updated_at)) }}
                    </div>
                  </td>

                  <td class="px-6 py-2 whitespace-nowrap">
                    <div class="w-full items-center">
                      <span
                        v-if="solicitud.solicitud_estado_id == 3"
                        class="
                          px-1
                          inline-flex
                          text-xs
                          leading-5
                          font-semibold
                          rounded-full
                          bg-green-200
                          text-green-900
                        "
                      >
                        Aprobado
                      </span>

                      <span
                        v-if="solicitud.solicitud_estado_id == 1"
                        class="
                          px-1
                          inline-flex
                          text-xs
                          leading-5
                          font-semibold
                          rounded-full
                          bg-blue-200
                          text-blue-900
                        "
                      >
                        Pendiente
                      </span>
                      <span
                        v-if="solicitud.solicitud_estado_id == 2"
                        class="
                          px-1
                          inline-flex
                          text-xs
                          leading-5
                          font-semibold
                          rounded-full
                          bg-gray-200
                          text-gray-900
                        "
                      >
                        Finalizado
                      </span>
                      <span
                        v-if="solicitud.solicitud_estado_id == 4"
                        class="
                          px-1
                          inline-flex
                          text-xs
                          leading-5
                          font-semibold
                          rounded-full
                          bg-red-200
                          text-red-900
                        "
                      >
                        Rechazado
                      </span>
                    </div>
                  </td>

                  <td class="px-3 py-2 whitespace-nowrap">
                    <jet-secondary-button
                      @click.native="openModal()"
                      class="
                        tracking-widest
                        text-xs
                        cursor-pointer
                        text-indigo-600
                        underline
                        hover:text-indigo-900
                      "
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
                    class="text-center py-2 text-lg text-gray-500"
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
        <jet-dialog-modal :show="activeModal" maxWidth="5xl">
          <template #title> </template>

          <template #content>
            <vue-pdf-app style="height: 70vh" class="" :pdf="pdf"></vue-pdf-app>
          </template>

          <template
            #footer
            v-if="
              this.$inertia.page.props.roles.store_user ||
              this.$inertia.page.props.roles.store_admin
            "
          >
            <!-- Contenedor del usuario que va tener el rol de asesor de credito -->
            <div class="flex">
              <div class="flex-grow flex-wrap content-center">
                <jet-secondary-button
                  class="float-left my-2"
                  @click.native="closeModal"
                >
                  <span>
                    <i class="far fa-times-circle fa-lg"></i>
                    Cerrar
                  </span>
                </jet-secondary-button>
              </div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center">
                <jet-button
                  class="ml-2"
                  @click.native="closeModal"
                  :disabled="true"
                >
                  <span class="text-xl">
                    <i class="fas fa-file-signature"></i>
                    Firmar
                  </span>
                </jet-button>
              </div>
            </div>
          </template>
          <template #footer v-else>
            <!-- contenedor del usuario que va tener el rol de analista de credito -->
            <div class="flex">
              <div class="flex-grow flex-wrap items-center">
                <jet-secondary-button
                  class="float-left my-2"
                  @click.native="closeModal"
                >
                  <span>
                    <i class="far fa-times-circle fa-lg"></i>
                    Cerrar
                  </span>
                </jet-secondary-button>
              </div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex items-center">
                <jet-danger-button
                  class="float-left my-2 mr-2"
                  @click.native="rechazarSolicitud()"
                >
                  <span>
                    <i class="fas fa-times fa-lg"></i>
                    Rechazar
                  </span>
                </jet-danger-button>
                <jet-success-button
                  class="float-left my-2"
                  @click.native="openModal2()"
                >
                  <span class="text-base">
                    <i class="fas fa-check"></i>
                    Aprobar
                  </span>
                </jet-success-button>
              </div>
            </div>
          </template>
        </jet-dialog-modal>
        <!-- Segundo modal para datos adicionales antes de firmar pdf -->
        <jet-dialog-modal :show="activeModal2" maxWidth="3xl">
          <template #title>
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                value="Aprobar Crédito"
                class="font-serif text-xl"
              />
              <hr />
            </div>
          </template>
          <template #content>
            <!-- valor a prestar final -->
            <br />
            <div>
              <jet-label for="id" value="Valor a Prestar" />
              <vue-numeric
                class="
                  mt-1
                  block
                  w-full
                  border-gray-300
                  focus:border-indigo-300
                  focus:ring
                  focus:ring-indigo-200
                  focus:ring-opacity-50
                  rounded-md
                  shadow-sm
                "
                currency="$"
                separator="."
                id="monto"
              ></vue-numeric>
            </div>
            <!-- Descripcion de la solicitud -->
            <br />
            <div>
              <jet-label for="id" value="Descripcion Solicitud" />
              <textarea
                class="
                  form-textarea
                  mt-1
                  block
                  w-full
                  border-gray-300
                  focus:border-indigo-300
                  focus:ring
                  focus:ring-indigo-200
                  focus:ring-opacity-50
                  rounded-md
                  shadow-sm
                "
                placeholder="Describa la Solicitud Aprobada"
              ></textarea>
            </div>
            <!-- Anexo -->
            <br />
            <div
              class="col-span-6 sm:col-span-4"
              v-if="$page.props.jetstream.managesProfilePhotos"
            >
              <!--  File Input -->
              <input type="file" class="hidden" ref="anexo" />
              <jet-label for="Anexo" value="Estudio de Crédito" />

              <jet-secondary-button
                class="w-full text-gray-700 px-3 py-2 border rounded"
                type="button"
                @click.native.prevent="selectNewPhoto"
              >
                Seleccione Anexo
              </jet-secondary-button>
            </div>
          </template>
          <template #footer>
            <!-- Contenedor del usuario que va tener el rol de asesor de credito -->
            <div class="flex">
              <div class="flex-grow flex-wrap content-center">
                <jet-secondary-button
                  class="float-left my-2"
                  @click.native="closeModal2"
                >
                  <span>
                    <i class="far fa-times-circle fa-lg"></i>
                    Cerrar
                  </span>
                </jet-secondary-button>
              </div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center">
                <jet-button class="my-2"><span> Guardar </span> </jet-button>
              </div>
            </div>
          </template>
        </jet-dialog-modal>
<!-- Tercer modal para datos de solicitud rechazada -->
        <jet-dialog-modal :show="activeModalR" maxWidth="3xl">
          <template #title>
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                value="Solicitud Rechazada"
                class="font-serif text-xl"
              />
              <hr />
            </div>
          </template>
          <template #content>
            <!-- Descripcion de la solicitud rechazada -->
              <div>
              <jet-label for="id" value="Descripcion Solicitud Rechazada" />
              <textarea
                class="
                  form-textarea
                  mt-1
                  block
                  w-full
                  border-gray-300
                  focus:border-indigo-300
                  focus:ring
                  focus:ring-indigo-200
                  focus:ring-opacity-50
                  rounded-md
                  shadow-sm
                "
                placeholder="Describa la Solicitud Aprobada"
              ></textarea>
            </div>
            <!-- Anexo -->
            <br />
            <div
              class="col-span-6 sm:col-span-4"
              v-if="$page.props.jetstream.managesProfilePhotos"
            >
              <!--  File Input -->
              <input type="file" class="hidden" ref="anexo" />
              <jet-label for="Anexo" value="Estudio de Crédito" />

              <jet-secondary-button
                class="w-full text-gray-700 px-3 py-2 border rounded"
                type="button"
                @click.native.prevent="selectNewPhoto"
              >
                Seleccione Anexo
              </jet-secondary-button>
            </div>
          </template>
          <template #footer>
            <!-- Contenedor del usuario que va tener el rol de asesor de credito -->
            <div class="flex">
              <div class="flex-grow flex-wrap content-center">
                <jet-secondary-button
                  class="float-left my-2"
                  @click.native="closeModalR"
                >
                  <span>
                    <i class="far fa-times-circle fa-lg"></i>
                    Cerrar
                  </span>
                </jet-secondary-button>
              </div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center"></div>
              <div class="flex-grow flex-wrap content-center">
                <jet-button class="my-2"><span> Guardar </span> </jet-button>
              </div>
            </div>
          </template>
        </jet-dialog-modal>

      </div>
    </div>
  </app-layout>
</template>

<script>
import VuePdfApp from "vue-pdf-app";
import "vue-pdf-app/dist/icons/main.css";
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
import JetSuccessButton from "@/Jetstream/SuccessButton";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetNavLink from "@/Jetstream/NavLink";
import TableStores from "../RegitroAlmacen/Tablestores";
import VueCurrencyInput from "vue-currency-input";
import Paginator from "../../Components/Paginator";
import JetDropdownFilter from "@/Jetstream/DropdownFilter";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetSelect from "../../Components/Select";
import JetDropdownLink from "@/Jetstream/DropdownLink";

export default {
  props: ["sessions", "solicitudes", "estados", "user"],

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
    JetSuccessButton,
    JetNavLink,
    TableStores,
    VueCurrencyInput,
    Paginator,
    JetDropdownFilter,
    JetDropdownLink,
    JetSelect,
    JetDialogModal,
    JetDangerButton,
    VuePdfApp,
  },

  data() {
    return {
      updateSolicitudForm: this.$inertia.form({
        id: null,
        _token: this.$page.props.csrf_token,
      }),
      pdf: null,
      keyword: "",
      activeModal: false,
      activeModal2: false,
      activeModalR: false,
      estado: "",
      displayingToken: false,
      managingPermissionsFor: null,
      apiTokenBeingDeleted: null,
    };
  },

  methods: {
    selectNewPhoto() {
      this.$refs.anexo.click();
    },

    openModal() {
      this.activeModal = true;
    },
    openModal2() {
      this.closeModal();
      this.activeModal2 = true;
    },
    closeModal() {
      this.activeModal = false;
    },
    closeModal2() {
      this.openModal();
      this.activeModal2 = false;
    },
     closeModalR() {
      this.openModal();
      this.activeModalR = false;
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
    filterEstado() {
      this.$inertia.visit(this.route("solicitud.index"), {
        method: "get",
        data: {
          keyword: this.keyword,
          estado: this.estado,
        },
        preserveState: true,
        preserveScroll: true,
      });
    },
    searchSolicitud() {
      this.$inertia.visit(this.route("solicitud.index"), {
        method: "get",
        data: {
          keyword: this.keyword,
          estado: this.estado,
        },
        preserveState: true,
        preserveScroll: true,
      });
    },
    aprobarSolicitud(id) {
      this.updateSolicitudForm.id = id;
      this.updateSolicitudForm.post(route("solicitud.aprobar"), {
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
          console.error(this.updateSolicitudForm.errors);
        },
      });
    },
    rechazarSolicitud(id) {
      this.activeModalR = true,
      this.updateSolicitudForm.id = id;
      this.updateSolicitudForm.post(route("solicitud.rechazar"), {
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
          console.error(this.updateSolicitudForm.errors);
        },
      });
    },
    firmarSolicitud(id) {
      this.updateSolicitudForm.id = id;
      this.updateSolicitudForm.post(route("solicitud.firmar"), {
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
          console.error(this.updateSolicitudForm.errors);
        },
      });
    },
    cargarSolicitud(id) {},
  },
};
</script>
