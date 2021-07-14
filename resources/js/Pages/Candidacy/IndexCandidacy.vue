<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Candidacy List
            </h2>
        </template>
        <div class="text-center mx-auto mt-4 px-4">
            <div class="mx-auto text-center">
                <table class="w-full m-4 text-left">
                    <tr class="border-b-2 border-gray-400">
                        <th class="w-1/3 p-4">Candidacy Name</th>
                        <th class="w-1/3 p-4">Candidacy ID</th>
                        <th class="w-1/3 p-4">Post</th>
                    </tr>
                    <tr
                        v-for="(candidate, candiIndx) in candidacies.data"
                        :key="candiIndx"
                        :class="{
                            'bg-gray-100 border-b border-gray-100':
                                candiIndx % 2 === 0,
                            'bg-white border-b border-gray-100':
                                candiIndx % 2 > 0,
                        }"
                    >
                        <td class="w-1/3 p-4">
                            {{ candidate.candidacy_name }}
                        </td>
                        <td class="w-1/3 p-4">{{ candidate.candidacy_id }}</td>
                        <td class="w-1/3 p-4">{{ candidate.post_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: {
        candidacies: Object,
    },
    computed: {
        candi() {
            console.log(this.candidacies.data);
            return this.candidacies;
        },
    },
    components: {
        AppLayout,
    },
};
</script>
