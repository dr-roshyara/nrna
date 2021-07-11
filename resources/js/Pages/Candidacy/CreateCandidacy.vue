<template>
<app-layout>
  <form @submit.prevent="submit" class=" text-center mx-auto mt-10">
    <div> 
      <label> Name </label> 
    <input type="text" v-model="form.name" />
    </div>
    <!-- next -->      <!-- next -->
    
    <div> 
      <label> Choose a Candidacy Post </label> 
      <!-- <select name="cars" id="cars" form="carform"> -->       
      <select type="text" id="post_name" v-model="form.post_id" >
        
        <option v-for="(post, postIndx) in posts" :key="postIndx" :value="post.post_id">
          {{post.name}}</option>
      </select>
    </div>
    <!-- next -->
    <!-- next -->
    <div> 
      <label> Proposer's Name </label> 
      <input type="text" v-model="form.proposer_name" />
    </div>
    <!-- next -->
    <div> 
      <label> Proposer's Membership ID </label> 
      <input type="text" v-model="form.proposer_id" />
    </div>
    
    <!-- next -->
    <div> 
      <label> Supporters's Name </label> 
      <input type="text" v-model="form.supporter_name" />
    </div>
    <!-- next -->
    <div> 
      <label> Supperter's Membership ID </label> 
      <input type="text" v-model="form.supporter_id" />
    </div>    
    <!-- next -->
    <div>
    <label> Paymentslip</label>   
      <input type="file" @input="form.image = $event.target.files[0]" />
    </div>
    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
      {{ form.progress.percentage }}%
    </progress>
    <button type="submit" class="m-2 px-2 py-2 rounded-lg bg-blue-300 w-96">Submit</button>
  </form>
   <div class="mx-auto text-center">
     <jet-validation-errors class="mb-4  mx-auto text-center " />
     </div>
  </app-layout>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
 import JetValidationErrors from '@/Jetstream/ValidationErrors'
 import AppLayout from '@/Layouts/AppLayout'

export default {
  props:{
    'posts': Object,
    name: ''
  },
  setup (props) {
    const form = useForm({
      name: props.name,
      post_id: '',
      proposer_name:'',
      proposer_id: '',
      supporter_name : '',
      supporter_id:'',
      image: null,
    })
    // this.$inertia.post(route('candidacy.store'), data);  
    function submit() {
      form.post('/candidacies') 
    }

    return { form, submit }
  },
  components:{
    JetValidationErrors,
     AppLayout
  
  }
}
</script>