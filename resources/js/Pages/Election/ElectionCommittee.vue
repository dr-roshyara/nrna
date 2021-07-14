<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Election Committee
            </h2>
        </template>
        <div>
            <div class="p-10">
                <!--Card 1-->
                <div
                    class="
                        rounded
                        overflow-hidden
                        shadow-lg
                        w-full
                        flex flex-col
                        md:flex-row
                        mb-4
                    "
                >
                    <div
                        class="
                            w-full
                            md:w-32
                            h-32
                            flex flex-wrap
                            justify-center
                        "
                    >
                        <img
                            class="w-auto md:w-full h-full object-cover"
                            src="/images/Harendra_Wanem.jpg"
                            alt="Mountain"
                        />
                    </div>
                    <div class="w-auto px-6 py-4 text-center">
                        <div class="font-bold text-xl mb-2">Harendra Wanem</div>
                        <p class="text-gray-700 text-base">
                            प्रमुख निर्बाचन आयुक्त
                        </p>
                    </div>
                </div>
                <!--Card 2-->
                <div
                    class="
                        rounded
                        overflow-hidden
                        shadow-lg
                        w-full
                        flex flex-col
                        md:flex-row
                        mb-4
                    "
                >
                    <div
                        class="
                            w-full
                            md:w-32
                            h-32
                            flex flex-wrap
                            justify-center
                        "
                    >
                        <img
                            class="w-auto md:w-full h-full object-cover"
                            src="/images/nabraj.jpg"
                            alt="Mountain"
                        />
                    </div>
                    <div class="w-auto px-6 py-4 text-center">
                        <div class="font-bold text-xl mb-2">
                            Dr. Nab Raj Roshyara
                        </div>
                        <p class="text-gray-700 text-base">निर्बाचन आयुक्त</p>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    components: {
        AppLayout,
    },
};
</script>
