<template>
        <info-layout>
        <div
            class="p-8 mx-2 my-10 border border-gray-200 rounded-md shadow-lg sm:my-16 sm:mx-auto sm:w-5/12"
        >
            <form @submit.prevent="validar">
                <div class="text-2xl font-semibold text-gray-600">
                    <p>Validar Identidad</p>
                </div>
                <div class="my-3 text-gray-500">
                    <p>
                        STEVENSON JAHIR ingresa el código de acceso que hemos enviado al número de celular *******172
                    </p>
                </div>
                <div class="flex mx-auto sm:w-7/12">
                    <jet-input
                        id="id"
                        type="text"
                        class="block w-full mx-auto mt-1 text-2xl text-center text-gray-500 md:ml-1"
                        autocomplete="id"
                        placeholder="Codigo de Validacion"
                    />
                </div>
                <div class="text-center">
                    <jet-button
                        class="mx-auto mt-8 text-sm rounded-full"
                        type="submit"
                    >
                        Validar
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
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetInput from "@/Jetstream/Input";
import axios from 'axios';
export default {
    props:{
        otpId:{
            require : true,
            type : String
        },
        sn:{
            require : true,
            type : String
        }
    },
    components: {
        InfoLayout,
        FormIdentidad,
        JetSelectSearch,
        JetButton,
        JetInput,
        JetSecondaryButton
    },
    methods: {
        validar(){
            this.$inertia.post("/estado-cuenta/"+this.sn)
        }
    },
};
</script>
