<template>
    <app-layout>
    <div class="mx-auto max-w-7xl py-7 sm:px-6 lg:px-8">

      <!-- Formulario referencias personales -->
      <jet-form-section @submit="actualizarSolicitud">
        <template #title> Solicitud de credito </template>

        <template #description> Formulario para solicitar credito </template>

        <template #form>

          <!-- Referencias Personales-->
          <div class="col-span-6 sm:col-span-4">
            <jet-label for="Empresa" value="Referencias personales" class="font-serif text-xl" />
            <hr />
          </div>

          <!-- Nombre y telefono -->
          <div class="col-span-6 sm:col-span-4 md:flex">
            <!-- Nombres -->
            <div class="md:w-4/6">
              <jet-label for="name" value="Nombre" />
              <jet-input
                id="name"
                type="text"
                v-model="CreateReferenciaForm.name"
                class="block w-full mt-1"
              />
            </div>

            <!-- Apellido -->
            <div class="mt-6 md:mt-0 md:ml-2 md:w-2/6">
              <jet-label for="lastname" value="Telefono" />
              <jet-input
                id="lastname"
                v-model="CreateReferenciaForm.phone"
                type="text"
                class="block w-full mt-1"
              />
            </div>




          </div>
                      <!-- boton agregar -->
            <div class="col-span-6 sm:col-span-4 md:flex">
            <div class="self-end">
                <jet-success-button :styleClass="'py-3 w-full'" @click="asignarReferencia" :type="'button'">
                  <i class="mr-1 fas fa-plus"></i>
                   Agregar
                </jet-success-button>
            </div>
            </div>

          <!-- Lista de de referencias -->
          <div class="col-span-6 sm:col-span-4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="overflow-hidden overflow-x-auto border rounded rounded-b-none">
                    <table class="min-w-full overflow-hidden bg-white border border-gray-200 divide-y rounded-md rounded-b-none">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col"  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:w-7/12">
                            Nombre
                          </th>
                          <th scope="col"  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:w-4/12">
                            Telefono
                          </th>
                          <th scope="col"  class="relative px-6 py-3 md:w-1/12">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="referencia in referencias" :key="referencia.id">
                          <td  class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="">
                                <div class="text-sm font-medium text-gray-900">
                                  {{referencia.name}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td  class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{referencia.phone}}</div>
                          </td>
                          <td  class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900" @click="eliminarReferencia(referencia.id)">x</a>
                          </td>
                        </tr>
                        <tr v-if="referencias.length == 0">
                                <td colspan="3" class="py-1 text-lg text-center text-gray-500">
                                   No se encontraron registos . . .
                                </td>
                        </tr>

                        <!-- More people... -->
                      </tbody>
                    </table>
            </div>
          </div>



        </template>

        <template #actions>
          <jet-action-message class="mr-3"> Guardado </jet-action-message>
          <div class="flex w-full">
            <button
              class="items-center flex-none px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"
            >
              ..Anterior
            </button>
            <div class="flex-grow"></div>
            <jet-button
              @click.native="actualizarSolicitud"
              class="flex-none"
              :class="{ 'opacity-50': CreateReferenciaForm.processing }"
              :disabled="CreateReferenciaForm.processing"
            >
              Guardar
            </jet-button>
          </div>
        </template>
      </jet-form-section><!-- Fin formulario referencias personales -->
    </div>
    </app-layout>
</template>
<script>

import AppLayout from "@/Layouts/AppLayout";
import JetFormSection from "@/Jetstream/FormSection";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetSuccessButton from "@/Jetstream/SuccessButton";
import JetButton from "@/Jetstream/Button";
import JetActionMessage from "@/Jetstream/ActionMessage";


    export default {
        components:{
            AppLayout,
            JetFormSection,
            JetLabel,
            JetInput,
            JetSuccessButton,
            JetButton,
            JetActionMessage
        },

        props:['id_solicitud','referencias'],

        data() {
            return {
                CreateReferenciaForm:this.$inertia.form({
                    name                : null,
                    phone               : null,
                    solicitud_id        : this.id_solicitud

                }),
                referencias: Array(),
            }
        },

        methods: {
            asignarReferencia(){
                this.CreateReferenciaForm.post(
                    route("referencia.store"),
                    {
                        errorBag: null,
                        preserveScroll: true,
                        preserveState: true,
                        onSuccess: () => {
                            this.$toast("Referencia Agregada", {
                                type: "success",
                                position: "bottom-right"
                            });
                            this.CreateReferenciaForm.reset();
                        },
                        onError: () => {
                            this.$toast("Error Agregar la Referencia \nVuelve a Intentar Agregarla", {
                                type: "error",
                                position: "bottom-right"
                            });
                        },
                    }
                );
            },

            eliminarReferencia(id){
              this.$inertia.delete(
                `referencia/${id}`,
                {
                  preserveScroll: true,
                  preserveState: true,
                }
              );
            },

            actualizarSolicitud(){
              this.$inertia.put(
                '/solicitud/'+this.id_solicitud,
                {
                  solicitud_estado_id: 1,
                },
                {
                  preserveScroll: true,
                  preserveState: true,
                  onBefore: (visit) => {
                    this.$loading(true);
                  },
                  onSuccess: (page) => {
                    this.$loading(false);
                    this.$swal("Solicitud Realizada!", "Tu solicitud esta siendo evaluada", "success");
                    this.$inertia.get(this.route("solicitud.create"));

                  },
                  onError: (errors) => {},
                }
              );
            }

        },
    }


</script>
