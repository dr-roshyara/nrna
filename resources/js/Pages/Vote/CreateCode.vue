<template>
    <app-layout>
          <div class="flex flex-col justify-center mt-10">
            <div class="m-auto">
                    {{name}}
                   {{nrna_id}}
                     {{state}}

            </div>
          <form @submit.prevent="submit" class=" text-center mx-auto mt-10">
            <div class="flex flex-col justify-center px-2 m-2"> 
                <div class="flex flex-wrap justify-center space-x-4 items-center p-4 mb-2 m-auto font-bold text-gray-900 ">
                   <label  for="voting_code" > Enter your voting Code</label>   
                  <input class=" p-4  rounded-lg bg-gray-100 w-96  font-bold border border-gray-300" 
                    id="voting_id" 
                   placeholder="PLEASE ENTER HERE YOUR VOTING CODE"  
                    v-model ="form.voting_code"/>
                </div>  
                 <div class="mx-auto my-4 w-full"> 
                    <button type="submit" 
                    class="m-2 px-2 py-2 rounded-lg bg-blue-300 w-1/2 mx-auto font-bold text-gray-900">
                    SEND CODE TO GET VOTING FORM</button> 
                    </div>
                           <div class="mx-auto text-center">
                <jet-validation-errors class="mb-4  mx-auto text-center " />
                </div>
             </div>
            </form>
             
            
            </div>
          

    </app-layout>
</template>
<script>
import { useForm } from '@inertiajs/inertia-vue3'
import JetValidationErrors from '@/Jetstream/ValidationErrors' 
import AppLayout from '@/Layouts/AppLayout'
 
export default {
    props:{
        name: String,
        nrna_id: String, 
        state: String

    },   
     setup () {
     const form = useForm({
        voting_code: '',
        })
    // this.$inertia.post(route('candidacy.store'), data); 
    function submit() {
        console.log(this.voting_code);
      form.post('/codes')
    }

    return { form, submit }
  },    
 components:{
     AppLayout,
     JetValidationErrors
 }   
}
</script>