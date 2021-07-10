<template>
  <div> 
      <!-- <div v-for =" (candidate, cIndx) in candidacies.data" :key="cIndx" > 
          <div > {{candidate}}</div>
     </div>         -->
        <div> 
           test 
          </div>
      </div> 
  <form @submit.prevent="submit" class=" text-center mx-auto mt-10">
    <div class="flex flex-col justify-center px-2 m-2"> 
      <label> Choose a Candidacy Post </label>  
      <!-- <select name="cars" id="cars" form="carform"> -->       
        <div class="flex flex-col border border-2 border-blue-300">        
        <div class="md:flex md:flex-wrap md:justify-between md:px-4 py-4"> 
            <div  v-for="(president, pIndx) in presidents" :key="pIndx" 
                 class="flex flex-col justify-center p-4 mb-2 text-center  border border-gray-100 rounded"> 
                <show-candidate :name="president.candidacy_name" :candidate="president.post_name"/>             
                           <!-- here starts -->
              <div class="px-2 py-2">
                <input 
                type      ="checkbox"
                :id       ="president.id"
                :name     ="president.post_name"
                :value    ="president.candidacy_name"  
                v-model   ="form.president"
                class     ="p-6 rounded border-gray-900 border-2 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 @change  ="updateBoxes" 
                 :disabled ="president.disabled"
               />
               </div> 

            </div> 

        
        </div> 
         <div  class="mb-4 p-2" v-if="form.president.length"> You have selected <span class="font-bold text-indigo-600"> {{form.president[0]}} </span> as President of NRNA Germany!</div>
         </div>
        <!-- next -->
        <div class="mx-auto my-4 w-full"> 
        <button type="submit" class="m-2 px-2 py-2 rounded-lg bg-blue-300 w-1/2 mx-auto">Submit</button>
        </div>
          <div class="mx-auto text-center">
     <jet-validation-errors class="mb-4  mx-auto text-center " />
     </div>
    </div>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import ShowCandidate from '@/Shared/ShowCandidate'
import JetInput from '@/Jetstream/Input'
import ShowCheckbox from "@/Shared/ShowCheckbox";
import JetValidationErrors from '@/Jetstream/ValidationErrors'    
export default {
  props:{
     candidacies:Object 
  },
 
  data(){ 
      return{
          presidentLimit: 1, 
          ticks: [],
        presidents: [
           {name: "Hari Bahadur", photo: "test1.png",  post: ["President", "अद्यक्ष"], id:"hari",  disabled: false },
           {name: "Shyam Bahadur", photo: "test2.png", post: ["President", "अद्यक्ष"], id:"shyam", checked: false, disabled: false },
           {name: "Nar Bahadur", photo: "test3.png",       post:["President", "अद्यक्ष"], id:"Nar",  checked: false, disabled: false }
        ]     
      }
  },
  setup (props) {
    const form = useForm({
      president: [],
      vice_resident: '',
    proposer_name:'',
      proposer_id: '',
      supporter_name : '',
      supporter_id:'',
      image: null,
    })
    // this.$inertia.post(route('candidacy.store'), data); 
    function submit() {
      form.post('/votes')
    }

    return { form, submit }
  },
  computed: {
      getLength(){        
        return this.form.president.length;
      },
      presidentss (){
        // return pres1;
        return this.create_candidates('2021_01')
      }
  },
  methods:{
     updateBoxes() {
      // update the number of ticks...
      this.ticks = this.presidents.filter(box => this.form.president.includes(box.name));
       console.log(this.ticks.length);
      // re-enable checkboxes if back under the limit...
      if (this.ticks.length < this.presidentLimit) {
        this.presidents.forEach(box => {
          if (!this.form.president.includes(box.name)) box.disabled = false;
        });
      }

      // disable empty checkboxes if at the limit...
      if (this.ticks.length == this.presidentLimit) {
        this.presidents.forEach(box => {
          if (!this.form.president.includes(box.name)) box.disabled = true;
        });
      }
    },
    create_candidates(pid){
      let candiArray =[]; 
        //let pres =this.candidacies.data.find(item=>item.candidacy_id===1) 
        let candi =this.candidacies.data.filter(item=>item.post_id===pid) 
      if(candi.length>1){
          candi[0].disabled =false
          candiArray=candi
        }else{
          candi.disabled=false
          candiArray.push(candi)

        }
        return candiArray;
    }

   
  },
  components:{
      ShowCandidate,
      JetInput,
      ShowCheckbox,
    JetValidationErrors
  
  }
}
</script>