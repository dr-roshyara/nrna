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
                            <li >1. <a href="vote/create"> Go to Voting Form </a> </li> 
                            <li class ="py-2 mb-2 text-gray-900 bg-blue-500">2. 
                                <a href="users/index">Go to Voter List</a> </li>
                            <li class ="py-2 mb-2 text-gray-900 bg-blue-500">
                                3. <a href="candidacy/create"> Go to Candidacy Form</a> </li>
                            <li >4. <a href="candidacies/index">Go to Candidacy List</a>  </li>
                            <li class ="py-2 mb-2 text-gray-900 bg-blue-500">
                                5. <a href="messages/index"> Go to SMS List</a> </li>
                            <li >6. 
                                <a href="election/committee" > Go to Election committee </a> </li>
                            <li >7. <a href="election/result"> Go to  Election Result</a> </li>
                            <li >8. <a href="vote/show"> Go to  Your Vote Whta you have given </a></li> 
                            <li >9. <a href=""> Go to  General Information </a> </li> 
                            <li >10. <a href="user/profile"> Go To Your personal profile  </a></li>
                            <li >11. <a href="election/index"> Election menefesto profile </a></li>
                            <li >11. <a href="finance/index"> Election Fianance Expenditure </a></li>
                            


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
