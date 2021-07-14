<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Candidacy Form
            </h2>
        </template>
        <form
            @submit.prevent="submit"
            class="
                w-full
                md:w-2/3
                mx-auto
                m-10
                w-full
                flex flex-wrap
                justify-center
                border border-gray-200
                shadow-lg
                rounded-lg
                px-4
                py-4
                md:py-12
            "
        >
            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl"> Name </label>
                <input
                    class="w-full md:w-80 mb-4"
                    type="text"
                    v-model="form.name"
                />
            </div>
            <!-- next -->
            <!-- next -->

            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl">
                    Choose a Candidacy Post
                </label>
                <!-- <select name="cars" id="cars" form="carform"> -->
                <select
                    class="w-full md:w-80 mb-4"
                    type="text"
                    id="post_name"
                    v-model="form.post_id"
                >
                    <option
                        v-for="(post, postIndx) in posts"
                        :key="postIndx"
                        :value="post.post_id"
                    >
                        {{ post.name }}
                    </option>
                </select>
            </div>
            <!-- next -->
            <!-- next -->
            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl">
                    Proposer's Name
                </label>
                <input
                    class="w-full md:w-80 mb-4"
                    type="text"
                    v-model="form.proposer_name"
                />
            </div>
            <!-- next -->
            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl">
                    Proposer's Membership ID
                </label>
                <input
                    class="w-full md:w-80 mb-4"
                    type="text"
                    v-model="form.proposer_id"
                />
            </div>

            <!-- next -->
            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl">
                    Supporters's Name
                </label>
                <input
                    class="w-full md:w-80 mb-4"
                    type="text"
                    v-model="form.supporter_name"
                />
            </div>
            <!-- next -->
            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl">
                    Supperter's Membership ID
                </label>
                <input
                    class="w-full md:w-80 mb-4"
                    type="text"
                    v-model="form.supporter_id"
                />
            </div>
            <!-- next -->
            <div class="w-full md:w-auto flex flex-wrap">
                <label class="w-full md:w-64 mt-2 text-xl"> Paymentslip</label>
                <input
                    class="w-full md:w-80 mb-4"
                    type="file"
                    @input="form.image = $event.target.files[0]"
                />
            </div>
            <progress
                v-if="form.progress"
                :value="form.progress.percentage"
                max="100"
            >
                {{ form.progress.percentage }}%
            </progress>
            <div class="w-full my-4 flex flex-wrap justify-center">
                <button
                    type="submit"
                    class="
                        w-full
                        md:w-auto
                        my-2
                        px-16
                        py-2
                        rounded-lg
                        bg-blue-800
                        hover:bg-blue-400
                        text-white
                    "
                >
                    Submit
                </button>
            </div>
        </form>
        <div class="mx-auto text-center">
            <jet-validation-errors class="mb-4 mx-auto text-center" />
        </div>
    </app-layout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: {
        posts: Object,
        name: "",
    },
    setup(props) {
        const form = useForm({
            name: props.name,
            post_id: "",
            proposer_name: "",
            proposer_id: "",
            supporter_name: "",
            supporter_id: "",
            image: null,
        });
        // this.$inertia.post(route('candidacy.store'), data);
        function submit() {
            form.post("/candidacies");
        }

        return { form, submit };
    },
    components: {
        JetValidationErrors,
        AppLayout,
    },
};
</script>
