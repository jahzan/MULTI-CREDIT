<template>
    <info-layout>
        <div
            class="p-8 mx-2 mt-10 bg-white border border-gray-200 shadow-inner-md rounded-t-md sm:mt-16 sm:mx-auto sm:w-5/12"
        >
                <div class="text-2xl font-semibold text-center text-gray-600">
                    <p>Estado de Cuenta</p>
                </div>
                <div class="my-3 text-gray-500">
                    <p>
                        STEVENSON JAHIR, debes realizar un pago mínimo de <b>$0</b> ó un pago total de <b>$0</b>.
                    </p>
                </div>
        </div>
        <div
            class="px-8 py-3 mx-2 mb-0 bg-white border border-t-0 border-b-0 border-gray-200 shadow-inner sm:mb-0 sm:mx-auto sm:w-5/12"
        >
            <div class="text-2xl font-semibold text-center text-gray-600">
                <p>Resumen de Estado de Cuenta</p>
            </div>
        </div>
        <div
            class="py-3 mx-2 mb-10 bg-white border border-t-0 border-gray-200 rounded-b shadow-md sm:mb-16 sm:mx-auto sm:w-5/12"
        >
            <div class="text-sm text-gray-600">
                <div class="grid grid-cols-2">
                    <div class="grid grid-cols-2 col-span-2 px-4 sm:col-span-1">
                        <div class="col-span-1">Monto solicitdo</div>
                        <div class="col-span-1 font-bold text-right">$1.350.000</div>
                        <div class="col-span-1">Saldo atrasado</div>
                        <div class="col-span-1 font-bold text-right text-red-500">$0</div>
                        <div class="col-span-1">Cuota a cancelar</div>
                        <div class="col-span-1 font-bold text-right ">$0</div>
                        <hr><hr>
                        <div class="col-span-1">Fecha prox cuota</div>
                        <div class="col-span-1 font-bold text-right text-gray-600">12-Feb-2022</div>


                    </div>
                    <div class="grid grid-cols-2 col-span-2 px-4 pt-4 sm:col-span-1 sm:pt-0">
                        <div class="col-span-1">Cartera</div>
                        <div class="col-span-1 font-bold text-right">$0</div>
                        <div class="col-span-1">Intereses</div>
                        <div class="col-span-1 font-bold text-right">$0</div>
                        <div class="col-span-1">Gastos de cobranza</div>
                        <div class="col-span-1 font-bold text-right">$0</div>
                        <div class="col-span-1">Papelería</div>
                        <div class="col-span-1 font-bold text-right">$0</div>
                    </div>
                </div>
            </div>
        </div>
    </info-layout>
</template>
<script>
    import InfoLayout from "@/Layouts/InfoLayout";
    export default {
        components:{
            InfoLayout
        }
    }

</script>