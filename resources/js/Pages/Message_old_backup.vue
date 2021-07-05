<template>
    <div>
       <!-- here starts  -->
         <div class="flex justify-center mt-10 "> 
            <div v-for ="(message, index) in messages" :key='index'  class="bg-red-200 mb-4">  
                <p>{{message.from}} -> {{message.to}} ->{{message.message}} </p>
            </div> 
            <!-- here comes the input of message   -->
            <div>                
              <!-- <form @submit.prevent="submit"> -->
               <form @submit.prevent="submit">
                       <div class ="flex flex-row">
                        <div class="px-2"> From </div> 
                       <div class="px-2"> <input v-model="form.from" type="text"> </div> 
                    </div>
                    <!-- next  -->
                    <div class ="flex flex-row">
                        <div class="px-2"> To </div> 
                       <div class="px-2"> <input v-model="form.to" type="text"> </div> 
                    </div>

                    <!-- next  -->
                    <div class ="flex flex-row">
                        <div class="px-2"> Message </div> 
                       <div class="px-2"> <textarea v-model="form.message" rows="3" >  </textarea> </div> 
                    </div>
                    <div>
                         <button type="submit" :disabled="form.processing">Submit</button>
                    </div>
                    
             </form> 
            </div>
        </div>

       <!-- here ends  -->
    </div>
</template>
<script>
import { Inertia } from '@inertiajs/inertia'
export default {
   props:{
       messages: Array 
   },
   data(){
     return {
        form :{
          from: '',
          to: '',
          message: ''
        }
     }
   }

}

</script>

<style>

</style>