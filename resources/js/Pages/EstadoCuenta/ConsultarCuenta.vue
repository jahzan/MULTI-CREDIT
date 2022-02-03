<template>
    <info-layout>
        <div
            class="p-8 mx-2 my-10 border border-gray-200 rounded-md shadow-lg sm:my-16 sm:mx-auto sm:w-5/12"
        >
            <form @submit.prevent="createValidacion">
                <div class="text-2xl font-semibold text-gray-600">
                    <p>Consultar Estado de Cuenta</p>
                </div>
                <div class="my-3 text-gray-500">
                    <p>
                        Ingresa el tipo y el número de documento del titular del cupo y
                        haz click en el botón continuar.
                    </p>
                </div>
                <div class="flex w-full mx-auto sm:w-11/12">
                    <!-- <jet-input
                        id="id"
                        type="text"
                        class="block w-2/12 mt-1 text-gray-500 md:ml-1"
                        autocomplete="id"
                    ></jet-input> -->
                    <jet-select-search
                        :data="documentosId"
                        v-model.trim="documento"
                        dropdownClass="absolute w-72 z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md"
                        class="block w-3/12 mt-1 mr-1 text-gray-500 sm:w-2/12 sm:mr-0 md:ml-1"
                        placeholder="Tipo "
                    >
                </jet-select-search>
                    <jet-input
                        id="id"
                        type="text"
                        class="block w-10/12 mt-1 text-gray-500 md:ml-1"
                        autocomplete="id"
                        v-model="numeroDoc"
                        placeholder="Numero de documento"
                    ></jet-input>
                </div>
                <div class="text-center">
                    <jet-button
                        class="mx-auto mt-8 text-sm rounded-full"
                        type="submit"
                    >
                        continuar
                    </jet-button>
                </div>
            </form>
        </div>
    </info-layout>
</template>
<script>
import InfoLayout from "@/Layouts/InfoLayout";
import FormIdentidad from './FormIdentidad';
import JetSelectSearch from "@/Components/SelectSearchId2";
import JetButton from "@/Jetstream/SuccessButton";
import JetInput from "@/Jetstream/Input";
export default {
    components: {
        InfoLayout,
        FormIdentidad,
        JetSelectSearch,
        JetButton,
        JetInput
    },
    data() {
        return {
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
            documento: "",
            numeroDoc: ""
        }
    },
    methods: {
        createValidacion(){
            this.$inertia.get("/estado-cuenta/"+this.documento+this.numeroDoc+"/validacion")
        }
    },
};
</script>
