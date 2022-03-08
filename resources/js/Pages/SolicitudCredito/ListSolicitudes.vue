<template>
  <app-layout>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Formulario de Busqueda -->
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
              class="block w-full mt-1"
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
        </template> </jet-form-section
      ><!-- //Formulario de Busqueda -->

      <!-- Seccion de la Listado Table -->
      <div class="">
        <br />
        <br />

        <div
          class="overflow-hidden overflow-x-auto border rounded rounded-b-none"
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
                >
                  <div class="px-4 md:flex sm:items-center">
                    <!-- Settings Dropdown -->
                    <div class="relative">
                      <jet-dropdown-filter align="right" width="">
                        <template #trigger>
                          <button
                            class="flex items-center py-2 my-auto text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300"
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
                            class="right-0 z-50 overflow-hidden bg-white border rounded-md shadow-lg w-80"
                          >
                            <div
                              href="#"
                              class="flex items-center px-4 py-1 -mx-2 border-b hover:bg-gray-100"
                            >
                              <p class="object-cover w-2/5 ml-1">
                                <span class="text-xs font-bold" href="#"
                                  >Estado</span
                                >
                              </p>
                              <jet-select
                                @change="filterEstado"
                                v-model="estado"
                                class="w-3/5 mt-1 text-sm h-9"
                              >
                                <template #options>
                                  <!-- <option value=""></option> -->
                                  <option
                                    v-for="estado in estados"
                                    :key="estado.id"
                                    class="h-12 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    :value="estado.id"
                                  >
                                    {{ estado.name }}
                                  </option>
                                </template>
                              </jet-select>
                            </div>
                            <div
                              href="#"
                              class="flex items-center px-4 py-1 -mx-2 border-b hover:bg-gray-100"
                            >
                              <p class="object-cover w-2/5 ml-1">
                                <span class="text-xs font-bold" href="#"
                                  >Estado</span
                                >
                              </p>
                              <jet-select class="w-3/5 mt-1 text-sm h-9">
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
                            </div>
                            <div
                              href="#"
                              class="flex items-center px-4 py-1 -mx-2 border-b hover:bg-gray-100"
                            >
                              <p class="object-cover w-2/5 ml-1">
                                <span class="text-xs font-bold" href="#"
                                  >Estado</span
                                >
                              </p>
                              <jet-select class="w-3/5 mt-1 text-sm h-9">
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

                <td class="px-6 py-2 whitespace-nowrap">
                  <div class="items-center w-full">
                    <span
                      v-if="solicitud.solicitud_estado_id == 3"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-green-900 bg-green-200 rounded-full "
                    >
                      Aprobado
                    </span>

                    <span
                      v-if="solicitud.solicitud_estado_id == 1"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-blue-900 bg-blue-200 rounded-full "
                    >
                      Pendiente
                    </span>

                    <span
                      v-if="solicitud.solicitud_estado_id == 7"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-blue-900 bg-blue-200 rounded-full "
                    >
                      Pre-Pendiente
                    </span>

                    <span
                      v-if="solicitud.solicitud_estado_id == 2"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-gray-900 bg-gray-200 rounded-full "
                    >
                      Finalizado
                    </span>
                    <span
                      v-if="solicitud.solicitud_estado_id == 4"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-red-900 bg-red-200 rounded-full "
                    >
                      Rechazado
                    </span>
                  </div>
                </td>

                <td class="px-3 py-2 whitespace-nowrap">
                  <jet-secondary-button
                    @click.native="showModalShowSolicitud(solicitud)"
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
                <td COLSPAN="8" class="py-2 text-lg text-center text-gray-500">
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
      <!-- //Seccion de la Listado Table -->

      <!-- modal mostrar solicitud -->
      <jet-dialog-modal
        :show="modalShowSolicitud"
        class="max-h-screen"
        maxWidth="5xl"
      >
        <template #title> </template>

        <template #content>
          <vue-pdf-app
            style="height: 70vh"
            class="md:w-full"
            :pdf="pdf"
          ></vue-pdf-app>
        </template>

        <template #footer>
          <!-- Contenedor del usuario que va tener el rol de asesor de credito -->
          <div class="flex flex-wrap">
            <div class="order-last w-full my-auto md:order-first md:w-1/3">
              <jet-secondary-button
                class="w-full sm:float-left sm:w-auto"
                @click.native="closeModalShowSolicitud"
              >
                <span class="mx-auto text-sm">
                  <i class="far fa-times-circle fa-lg"></i>
                  Cerrar
                </span>
              </jet-secondary-button>
            </div>
            <div class="flex justify-end w-full my-auto md:w-2/3 ">
                <jet-danger-button
                    class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                    @click.native="showModalResponseSolicitud(4)"
                    v-if="$inertia.page.props.permissions.solicitud_rechazar"
                >
                    <span class="mx-auto text-sm">
                    <i class="hidden md:inline fas fa-times fa-lg"></i>
                    Rechazar
                    </span>
                </jet-danger-button>

              <jet-success-button
                        class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                        @click.native="showModalResponseSolicitud(3)"
                        v-if="$inertia.page.props.permissions.solicitud_aprobar"
              >
                        <span class="mx-auto text-sm lg:text-lg">
                        <i class="hidden md:inline fas fa-check"></i>
                        Aprobar
                        </span>
              </jet-success-button>

              <jet-warning-button
                class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                @click.native="showModalFirmaSolicitud(2)"
                v-if="$inertia.page.props.permissions.solicitud_anular"
              >
                <span class="mx-auto text-sm">
                  <i class="hidden md:inline fas fa-exclamation-circle"></i>
                  Anular
                </span>
              </jet-warning-button>

              <jet-button
                v-if="
                  updateSolicitudForm.solicitud_estado_id === 3 &&
                  $inertia.page.props.permissions.solicitud_firmar
                "
                class=""
                @click.native="showModalFirmaSolicitud(2)"
              >
                <span class="text-sm lg:text-lg">
                  <i class="hidden md:inline fas fa-file-signature"></i>
                  Desembolso
                </span>
              </jet-button>
            </div>

            <!-- <div class="flex float-right">flex justify-end my-auto md:w-2/3 -->

            <!-- boton rechazar -->
            <!-- <jet-danger-button
                    class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                    @click.native="showModalResponseSolicitud(4)"
                    v-if="$inertia.page.props.permissions.solicitud_rechazar"
                >
                    <span class="mx-auto text-sm">
                    <i class="hidden md:flex fas fa-times fa-lg"></i>
                    Rechazar
                    </span>
                    </jet-danger-button> -->
            <!-- boton aprobar -->
            <!-- <jet-success-button
                        class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                        @click.native="showModalResponseSolicitud(3)"
                        v-if="$inertia.page.props.permissions.solicitud_aprobar"
                    >
                        <span class="mx-auto text-sm lg:text-lg">
                        <i class="hidden md:flex fas fa-check"></i>
                        Aprobar
                        </span>
                    </jet-success-button> -->

            <!-- Boton Anular -->
            <!-- <jet-warning-button
                class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                @click.native="showModalFirmaSolicitud(2)"
                v-if="$inertia.page.props.permissions.solicitud_anular"
              >
                <span class="mx-auto text-sm">
                  <i class="hidden md:flex fas fa-exclamation-circle"></i>
                  Anular
                </span>
              </jet-warning-button> -->
            <!-- boton Desembolsar -->
            <!-- <jet-button
                v-if="updateSolicitudForm.solicitud_estado_id === 3 && $inertia.page.props.permissions.solicitud_firmar"
                class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                @click.native="showModalFirmaSolicitud(2)"
              >
                <span class="mx-auto text-sm lg:text-lg">
                  <i class="hidden md:flex fas fa-file-signature"></i>
                  Desembolso
                </span>
              </jet-button> -->
            <!-- </div> -->
          </div>
        </template>
        <!--
        <template #footer v-else>
          <!-- contenedor del usuario que va tener el rol de analista de credito -->
        <!-- <div class="sm:flex">
            <div class="sm:flex-grow sm:flex-wrap sm:items-center">
              <jet-secondary-button
                class="w-full sm:float-left sm:my-2 sm:w-auto"
                @click.native="closeModalShowSolicitud"
              >
                <span>
                  <i class="far fa-times-circle fa-lg"></i>
                  Cerrar
                </span>
              </jet-secondary-button>
            </div>
            <div class="flex sm:items-center">
              <jet-danger-button
                class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                @click.native="showModalResponseSolicitud(4)"
              >
                <span>
                  <i class="fas fa-times fa-lg"></i>
                  Rechazar
                </span>
              </jet-danger-button>

              <jet-success-button
                class="w-2/4 mx-1 my-2 sm:float-left sm:mr-2 sm:w-auto sm:mx-auto"
                @click.native="showModalResponseSolicitud(3)"
              >
                <span class="text-base">
                  <i class="fas fa-check"></i>
                  Aprobar
                </span>
              </jet-success-button>
            </div>
          </div>
        </template> -->
        --> </jet-dialog-modal
      ><!--// modal mostrar solicitud -->

      <!-- modal respuesta solicitud -->
      <jet-dialog-modal :show="modalResponseSolicitud" maxWidth="lg">
        <template #title>
          <div class="col-span-6 sm:col-span-4">
            <jet-label
              v-if="accionReponse === 3"
              value="Aprobar Crédito"
              class="font-serif text-xl"
            />
            <jet-label
              v-else-if="accionReponse === 4"
              value="Rechazar Crédito"
              class="font-serif text-xl"
            />
            <hr />
          </div>
        </template>
        <template #content>
          <!-- valor a prestar final -->
          <div v-if="accionReponse === 3">
            <jet-label for="id" value="Valor a Prestar" />
            <vue-numeric
              disabled
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              currency="$"
              separator="."
              decimal-separator=","
              id="monto"
              :precision="2"
              v-model="updateSolicitudForm.valor"
            ></vue-numeric>
          </div>
          <div>
            <jet-label for="id" value="Descripcion Solicitud" />
            <textarea
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-textarea focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              v-model="updateSolicitudForm.descripcion"
              placeholder="Describa la Solicitud Aprobada"
            ></textarea>
          </div>
          <!-- Anexo -->
          <br />
          <div class="col-span-6 sm:col-span-4">
            <div class="mb-2">
              <!--  File Input -->
              <jet-label for="Anexo" value="Estudio de Crédito" />
              <div
                class="relative flex items-center justify-center rounded-lg h-36 hover:cursor-pointer"
                :class="{
                  'border-dashed border-2 border-gray-400 bg-white': !dragOver,
                  'border-dashed border-4 border-blue-700 bg-blue-50 animate-pulse':
                    dragOver,
                }"
                @dragover="dragOver = true"
                @dragleave="dragOver = false"
              >
                <div
                  class="absolute w-full h-full p-3"
                  :class="{ hidden: updateSolicitudForm.file.length > 0 }"
                >
                  <div class="flex flex-col items-center text-gray-500">
                    <i class="fas fa-cloud-upload-alt fa-2x"></i>
                    <span class="block font-normal text-gray-400"
                      >Arrastra tus archivos aqui</span
                    >
                    <span class="block font-normal text-blue-400"
                      >Buscar Archivos Clic Aqui</span
                    >
                  </div>
                </div>
                <div class="absolute w-full h-full p-3">
                  <!-- div donde muestra  los archivos cargados -->
                  <div class="grid h-full grid-cols-4">
                    <div
                      class="grid grid-flow-col grid-rows-3"
                      :key="index"
                      v-for="(file, index) in updateSolicitudForm.file"
                    >
                      <div class="row row-cols-1">
                        <div class="mx-auto text-center text-gray-500">
                          <i class="mx-4 far fa-file-pdf fa-2x"></i>
                        </div>
                      </div>
                      <div class="mx-2 row row-cols-1">
                        <span
                          class="block text-sm font-normal text-center text-gray-500 break-all sm:text-xs"
                        >
                          {{ file.name }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <input
                  @change="changeFile($event)"
                  ref="file"
                  type="file"
                  class="w-full h-full opacity-0"
                  multiple
                  name=""
                />
              </div>
              <div class="flex items-center justify-between text-gray-400">
                <span>{{ nameFile }}</span>
                <span class="flex items-center"
                  ><i class="mr-1 fa fa-lock"></i> secure</span
                >
              </div>
            </div>
          </div>
        </template>
        <template #footer>
          <!-- Contenedor del usuario que va tener el rol de asesor de credito -->
          <div class="flex">
            <div class="flex-wrap content-center flex-grow">
              <jet-secondary-button
                class="float-left my-2"
                @click.native="closeResponseSolicitud"
              >
                <span>
                  <i class="far fa-times-circle fa-lg"></i>
                  Cerrar
                </span>
              </jet-secondary-button>
            </div>
            <div class="flex-wrap content-center flex-grow"></div>
            <div class="flex-wrap content-center flex-grow"></div>
            <div class="flex-wrap content-center flex-grow">
              <jet-button
                class="my-2"
                @click.native="responderSolicitud(accionReponse)"
                ><span> Guardar </span>
              </jet-button>
            </div>
          </div>
        </template> </jet-dialog-modal
      ><!--//modal respuesta solicitud -->

      <!-- modal Firma -->
      <jet-dialog-modal :show="modalFirmaSolicitud" maxWidth="lg">
        <template #title>
          <div class="col-span-6 sm:col-span-4">
            <jet-label value="Desembolsar Crédito" class="font-serif text-xl" />
            <hr />
          </div>
        </template>
        <template #content>
          <!--contenido modal de firma solo firma  -->
          <div>
            <div class="col-span-6 sm:col-span-4 md:flex">
              <!-- contenido valor-->
              <div class="md:w-3/5">
                <jet-label for="id" value="Valor Factura" />
                <vue-numeric
                  class="block mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  currency="$"
                  separator="."
                  id="Valor"
                  v-model="createDesembolsarForm.amount"
                ></vue-numeric>
              </div>
              <!--Monto-->
              <div class="mt-6 md:mt-0 md:ml-2 md:w-3/5">
                <jet-label for="Cuotas" value="Cuotas" />
                <vue-numeric
                  class="block mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  placeholder="Meses"
                  v-model="createDesembolsarForm.cuota"
                  id="Cuotas"
                ></vue-numeric>
              </div>
            </div>
            <br />
            <!--anexo solo para facturas y cedulas -->
            <div class="col-span-6 sm:col-span-4">
              <div class="mb-2">
                <!--  File Input -->
                <jet-label for="Anexo" value="Factura y Cedula" />
                <div
                  class="relative flex items-center justify-center rounded-lg h-28 hover:cursor-pointer"
                  :class="{
                    'border-dashed border-2 border-gray-400 bg-white':
                      !dragOver,
                    'border-dashed border-4 border-blue-700 bg-blue-50 animate-pulse':
                      dragOver,
                  }"
                  @dragover="dragOver = true"
                  @dragleave="dragOver = false"
                >
                  <div class="absolute">
                    <div class="flex flex-col items-center text-gray-500">
                      <i class="fas fa-cloud-upload-alt fa-2x"></i>
                      <span class="block font-normal text-gray-400"
                        >Attach you files here</span
                      >
                      <span class="block font-normal text-blue-400"
                        >Browse files</span
                      >
                    </div>
                  </div>
                  <input
                    @change="
                      dragOver = false;
                      createDesembolsarForm.file = $event.target.files;
                    "
                    ref="file"
                    type="file"
                    @input="createDesembolsarForm.file = $event.target.files"
                    class="w-full h-full opacity-0"
                    multiple
                    name=""
                  />
                </div>
                <div class="flex items-center justify-between text-gray-400">
                  <span>{{ nameFile }}</span>
                  <span class="flex items-center"
                    ><i class="mr-1 fa fa-lock"></i> secure</span
                  >
                </div>
              </div>
            </div>
          </div>
          <!--//contenido modal de firma solo firma -->
        </template>
        <template #footer>
          <!-- Contenedor del usuario que va tener el rol de asesor de credito -->
          <div class="flex">
            <div class="flex-wrap content-center flex-grow">
              <jet-secondary-button
                class="float-left my-2"
                @click.native="closeFirmarSolicitud()"
              >
                <span>
                  <i class="far fa-times-circle fa-lg"></i>
                  Cerrar
                </span>
              </jet-secondary-button>
            </div>
            <div class="flex-wrap content-center flex-grow"></div>
            <div class="flex-wrap content-center flex-grow"></div>
            <div class="flex-wrap content-center flex-grow">
              <jet-button
                class="my-2"
                @click.native="firmarSolicitud(accionReponse)"
                ><span> Guardar </span>
              </jet-button>
            </div>
          </div>
        </template> </jet-dialog-modal
      ><!--//modal Firma -->
    </div>
  </app-layout>
</template>

<script>
/**
 * se importaan los librerias que se van a utilizar
 */
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
import JetWarningButton from "@/Jetstream/WarningButton";
import JetNavLink from "@/Jetstream/NavLink";
import TableStores from "../RegitroAlmacen/Tablestores";
import VueCurrencyInput from "vue-currency-input";
import Paginator from "../../Components/Paginator";
import JetDropdownFilter from "@/Jetstream/DropdownFilter";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetSelect from "../../Components/Select";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import Push from "push.js";

export default {
  props: ["sessions", "solicitudes", "estados"],

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
    JetWarningButton,
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
      //Estudio de credito, se actualiza el estado de la solicitud por eso se guarda como UpdateSolicitud.
      updateSolicitudForm: this.$inertia.form({
        solicitud_estado_id: null,
        id: null,
        file: Array(),
        solicitud_id: null,
        valor: 0,
        descripcion: null,
        _token: this.$page.props.csrf_token,
      }),
      createDesembolsarForm: this.$inertia.form({
        amount: null,
        solicitud_estado_id: null,
        id: null,
        solicitud_id: null,
        cuota: null,
        file: Array(),
        _token: this.$page.props.csrf_token,
      }),
      pdf: "",
      keyword: "",
      modalShowSolicitud: false,
      nameFile: null,
      modalResponseSolicitud: false,
      modalFirmaSolicitud: false,
      estado: "",
      accionReponse: null,
      dragOver: false,
      prueba: false,
      $inertia: this.$inertia,
    };
  },

  methods: {
    closeModalShowSolicitud() {
      this.modalShowSolicitud = false;
    },
    closeResponseSolicitud() {
      this.modalShowSolicitud = true;
      this.modalResponseSolicitud = false;
      this.updateSolicitudForm.reset();
      this.updateSolicitudForm.file = [];
    },
    closeFirmarSolicitud() {
      this.modalShowSolicitud = true;
      this.modalResponseSolicitud = false;
      this.modalFirmaSolicitud = false;
    },
    showModalShowSolicitud(solicitud) {
      this.pdf = "storage/" + solicitud.path_solicitud + "/solicitud.pdf"; //ruta delos archivos
      this.updateSolicitudForm.id = solicitud.id; //
      this.createDesembolsarForm.solicitud_id = solicitud.id;
      this.createDesembolsarForm.id = solicitud.id;
      this.updateSolicitudForm.solicitud_estado_id =
        solicitud.solicitud_estado_id;
      this.updateSolicitudForm.valor = parseFloat(solicitud.monto);
      this.modalShowSolicitud = true;
    },
    showModalResponseSolicitud(accionReponse) {
      this.accionReponse = accionReponse;
      this.closeModalShowSolicitud();
      this.modalResponseSolicitud = true;
    },
    showModalFirmaSolicitud() {
      this.accionReponse = 2;
      this.closeModalShowSolicitud();
      this.modalFirmaSolicitud = true;
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
        "NOV",
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
    responderSolicitud(estado_id) {
      this.updateSolicitudForm.solicitud_estado_id = estado_id;
      this.$inertia.post(
        `solicitud/${this.updateSolicitudForm.id}`,
        {
          _method: "put",
          solicitud_estado_id: this.updateSolicitudForm.solicitud_estado_id,
          id: this.updateSolicitudForm.id,
          file: this.updateSolicitudForm.file,
          solicitud_estado_id: this.updateSolicitudForm.solicitud_estado_id,
          solicitud_id: this.updateSolicitudForm.solicitud_id,
          valor: this.updateSolicitudForm.valor,
          descripcion: this.updateSolicitudForm.descripcion,
        },
        {
          errorBag: null,
          preserveScroll: true,
          preserveState: true,
          forceFormData: true,
          onBefore: (visit) => {
            this.$loading(true);
          },
          onSuccess: () => {
            this.$loading(false);
            this.modalResponseSolicitud = false;
            this.$toast("Solicitud Respuesta", {
              type: "success",
              position: "bottom-right",
            });
            this.updateSolicitudForm.reset();
          },
          onError: () => {
            this.$loading(false);
          },
        }
      );
    },
    changeFile($event) {
      this.dragOver = false;
      this.updateSolicitudForm.file = this.updateSolicitudForm.file.concat(
        Array.from($event.target.files)
      );
    },
    firmarSolicitud(estado_id) {
      this.createDesembolsarForm.solicitud_estado_id = estado_id;
      this.$inertia.post(
        `solicitud/${this.createDesembolsarForm.id}`,
        {
          _method: "put",
          solicitud_estado_id: this.createDesembolsarForm.solicitud_estado_id,
          id: this.createDesembolsarForm.id,
          file: this.createDesembolsarForm.file,
          solicitud_estado_id: this.createDesembolsarForm.solicitud_estado_id,
          solicitud_id: this.createDesembolsarForm.solicitud_id,
          amount: this.createDesembolsarForm.amount,
          cuotas: this.createDesembolsarForm.cuota,
        },
        {
          errorBag: null,
          preserveScroll: true,
          preserveState: true,
          forceFormData: true,
          onBefore: (visit) => {
            this.$loading(true);
          },
          onSuccess: () => {
            this.$loading(false);
            this.$swal(
              "Desembolso Exitoso!",
              "Continua con la informacion socioeconomica",
              "success"
            );
          },
          onError: () => {
            this.$loading(false);
          },
        }
      );
    },
    recargarSolicitud() {
      Echo.private(
        "App.Models.User." + this.$inertia.page.props.user.id
      ).notification((notification) => {
        this.$inertia.reload({ only: ["solicitudes"] });
      });
    },
  },
  // se ejecuta antes de renderizar el contenido
  mounted() {
    // llama al evento que se encarga de conectar brodcast
    //this.recargarSolicitud();
  },
};
</script>
