<template>
    <info-layout>
        <div
            class="p-8 mx-2 my-10 border border-gray-200 rounded-md shadow-lg sm:my-16 sm:mx-auto sm:w-5/12"
        >
                <div class="text-2xl font-semibold text-gray-600">
                    <p>Validar Identidad</p>
                </div>
                <div class="my-3 text-gray-500">
                    <p>
                        Bienvenido STEVENSON JAHIR, para poder ver el estado de cuenta es necesario validar tu identidad.
                    </p>
                </div>
                <div class="flex w-full mx-auto sm:w-11/12">
                </div>
                <div class="text-center">
                    <jet-button
                        class="mx-auto mt-5 text-sm rounded-full"
                        type="button"
                    >
                        <span class="ml-1 text-xs">
                            <i class="fas fa-mobile-alt"></i>
                            <p class="float-right ml-1 ">
                                RECIBIR CLAVE DE ACCESO AL CELULAR
                            </p>
                        </span>
                    </jet-button>
                    <jet-secondary-button
                        class="mx-auto mt-2 text-sm rounded-full hover:bg-gray-100"
                        type="button"
                    >
                        <span class="text-xs text-gray-500">
                            <i class="fas fa-at"></i>
                            <p class="float-right ml-1">
                                RECIBIR CLAVE DE ACCESO AL CORREO
                            </p>
                        </span>
                    </jet-secondary-button>
                </div>
        </div>
    </info-layout>
</template>


<script>
    import InfoLayout from '@/Layouts/InfoLayout';
    import JetButton from '@/Jetstream/SuccessButton'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    export default {
        components:{
            InfoLayout,
            JetButton,
            JetSecondaryButton
        }

    }
</script>