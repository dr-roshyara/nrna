<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard 
            </h2>
             
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <welcome /> -->
                    <!-- <p> Here we are </p>  -->
                    <div> 
                        <ul class="p-4 text-bold text-lg">
                            <li>1. Go to Voting Form </li> 
                            <li>2. Go to Voter List </li>
                            <li>3. Go to Candidacy Form </li>
                            <li>4. Go to Candidacy List </li>
                            <li>5. Go to SMS List </li>
                            <li>6. Go to Election committee </li>
                            <li>7. Go to  Election Result </li>
                            <li>8. Go to  Your Vote </li> 
                            <li>9. Go to  General Information </li>

                        </ul> 
                     </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    
    export default {

        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
