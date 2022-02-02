<template>
          <!-- Seccion de la Listado Table -->
      <div class="">
        <br />
        <br />
        <div class="border rounded-md shadow-md ">

        <div
          class="overflow-hidden overflow-x-auto"
        >
          <table
            class="min-w-full overflow-hidden bg-white divide-y "
          >
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="w-8 px-6 py-3 font-serif text-sm font-medium font-extrabold tracking-wider text-left text-gray-500 uppercase"
                >
                  #
                </th>
                <th
                  scope="col"
                  class="w-10 px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Cedula
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Nombre
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Monto
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Fecha
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-center text-gray-500 uppercase"
                >
                  Hora
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Estado
                </th>

                <th
                  scope="col"
                  class="w-10 px-6 py-3 font-serif text-sm font-medium tracking-wider text-left text-gray-500 uppercase"
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
                              class="<i fas fa-filter fa-lg text-gray-500 my-auto"
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
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-green-900 bg-green-200 rounded-full"
                    >
                      Aprobado
                    </span>

                    <span
                      v-if="solicitud.solicitud_estado_id == 1"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-blue-900 bg-blue-200 rounded-full"
                    >
                      Pendiente
                    </span>

                    <span
                      v-if="solicitud.solicitud_estado_id == 7"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-blue-900 bg-blue-200 rounded-full"
                    >
                      Pre-Pendiente
                    </span>

                    <span
                      v-if="solicitud.solicitud_estado_id == 2"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-gray-900 bg-gray-200 rounded-full"
                    >
                      Finalizado
                    </span>
                    <span
                      v-if="solicitud.solicitud_estado_id == 4"
                      class="inline-flex px-1 text-xs font-semibold leading-5 text-red-900 bg-red-200 rounded-full"
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

        <div class="border-t rounded rounded-t-none">
          <paginator
            class="rounded rounded-t-none"
            :estado="estado"
            :elements="solicitudes"
            :offset="2"
            :keyword="keyword"
          />
        </div>
        </div>
      </div><!-- //Seccion de la Listado Table -->
</template>
<script>
import Paginator from "../../Components/Paginator";

export default {
    components:{
        Paginator
    },
    props:["solicitudes"],

}
</script>
