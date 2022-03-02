<template>
<div>
      <div class="flex flex-wrap w-full">

        <!-- Login Section -->
        <div class="flex flex-col w-full h-screen overflow-auto lg:w-1/2">
            <div class="sm:my-0">
                <div class="flex justify-center md:pt-12 lg:justify-start lg:pl-12 lg:-mb-24">
                    <a href="#" class="p-4 text-xl font-bold text-white ">
                        <jet-application-mark class="block w-auto h-28 md:h-44 lg:h-14" />
                    </a>
                </div>

                <div class="flex flex-col justify-center px-4 my-auto sm:pt-8 lg:justify-start lg:pt-20 md:px-24 lg:px-32">
                    <div class="flex items-center text-4xl font-extrabold">
                        <span class="mx-auto text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-400">
                            Bienvenido
                        </span>
                    </div>

                    <form class="flex flex-col pt-3 lg:pt-8" @submit.prevent="submit">
                        <jet-validation-errors class="mb-4" />
                        <div class="flex flex-col pt-4">
                            <jet-label for="email" class="text-lg" value="Email"/>
                            <jet-input v-model="form.email" type="email" id="email" placeholder="su@email.com" class="w-full px-3 py-2 mt-1 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"/>
                        </div>

                        <div class="flex flex-col pt-4">
                            <jet-label for="password" class="text-lg" value="Contraseña"/>
                            <jet-input v-model="form.password" type="password" id="password" placeholder="Su contraseña" class="w-full px-3 py-2 mt-1 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"/>
                        </div>

                        <jet-button type="submit" value="Ingresar" class="flex-auto p-4 mt-6 text-sm font-bold text-center text-white bg-black hover:bg-gray-700">Ingresar</jet-button>
                    </form>
                    <div class="pt-1 text-center sm:pt-12 sm:pb-12">
                        <p>No recuerdas la contraseña?
                            <inertia-link :href="route('password.request')" class="font-semibold underline">
                                Restaurar contraseña aquí.
                            </inertia-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="hidden object-cover w-full h-screen lg:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>

    </div>
</div>

</template>

<script>
    import JetApplicationMark from "@/Jetstream/ApplicationMark";
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetApplicationMark,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                        onSuccess: (page) => {
                            this.$loading(false)
                        },
                        onBefore: (visit) => {
                            this.$loading(true)
                        },
                        onError: (errors) => {
                            this.$loading(false)
                        },
                    })
            }
        }
    }
</script>
