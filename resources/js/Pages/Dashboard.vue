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
                        <ol class="p-4 text-bold text-lg">
                            <li >1. Go to Voting Form </li> 
                            <li class ="py-2 mb-2 text-gray-900 bg-blue-500">2. <a href="users/index">Go to Voter List</a> </li>
                            <li class ="py-2 mb-2 text-gray-900 bg-blue-500">3. <a href="candidacy/create"> Go to Candidacy Form</a> </li>
                            <li >4. <a href="candidacies/index">Go to Candidacy List</a>  </li>
                            <li class ="py-2 mb-2 text-gray-900 bg-blue-500">5. <a href="messages/index">Go to SMS List</a> </li>
                            <li >6. Go to Election committee </li>
                            <li >7. Go to  Election Result </li>
                            <li >8. Go to  Your Vote </li> 
                            <li >9. Go to  General Information </li>

                        </ol> 
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
