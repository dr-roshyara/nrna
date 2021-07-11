<template>
<app-layout>
  <form @submit.prevent="submit" class=" text-center mx-auto mt-10">
    <div class="flex flex-col justify-center px-2 m-2"> 
      <label> Choose a Candidacy Post </label>  
      <!-- <select name="cars" id="cars" form="carform"> -->       
        <div class="flex flex-col border border-2 border-blue-300">        
        <div class="md:flex md:flex-wrap md:justify-between md:px-4 py-4">  
            <div  v-for="(president, pIndx) in presidentss" :key="pIndx"  
                 class="flex flex-col justify-center p-4 mb-2 text-center  
                 border border-gray-100 rounded"> 
                <show-candidate 
                :post_name ="president.post_name"   
                :post_nepali_name ="president.post_nepali_name"  
                :candidacy_name ="president.candidacy_name"></show-candidate>              
                           <!-- here starts -->
              <div class="px-2 py-2">
                <input 
                type      ="checkbox"
                :id       ="president.user_id"
                :name     ="president.post_name"
                :value    ="president.candidacy_id"  
                v-model   ="form.president"
                class     ="p-6 rounded border-gray-900 border-2 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 @change  ="updateBoxes(this.presidentss,this.form.president,this.presidentTicks)" 
                 :disabled ="president.disabled"
               />
               </div> 

            </div> 

        </div> 
         <div  class="mb-4 p-2" v-if="form.president.length"> You have selected 
           <span class="font-bold text-indigo-600"> {{find_selected_name(this.presidentss,this.form.president)}} </span> as President of NRNA Germany!</div>
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
  </app-layout>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import ShowCandidate from '@/Shared/ShowCandidate'
import JetInput from '@/Jetstream/Input'
import ShowCheckbox from "@/Shared/ShowCheckbox";
import JetValidationErrors from '@/Jetstream/ValidationErrors' 
 import AppLayout from '@/Layouts/AppLayout'
     
export default {
  props:{
     candidacies:Object 
  },
 
  data(){ 
      return{
         presidentTicks:{
            limit: 1,
            ticks:[]
          },
          ticks: [],
        presidents: [
           {candidacy_name: "Hari Bahadur", photo: "test1.png", candidacy_id:"nrna-01",  post_name: "President", id:"hari",  checked: false, disabled: false },
           {candidacy_name: "Shyam Bahadur", photo: "test2.png", candidacy_id:"nrna-02", post_name: "President", id:"shyam", checked: false, disabled: false },
           {candidacy_name: "Nar Bahadur", photo: "test3.png", candidacy_id:"nrna-03",   post_name:"President", id:"Nar",  checked: false, disabled: false }
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
      },
      get_selected_name(candiVec,selected_id){
          /**
           *@input1 : candidacy vector , 
           *@input2: selected id
           */
          return this.find_selected_name(candiVec, selected_id);
        // return selected_name
      }
  },
  methods:{
     updateBoxes(candiVec, selectedVec,tickObj) {
       /**
        * @param1 : candidateVector 
        * @param2: selected vector 
        * @tickobj : ticks defined in the data. 
        * 
        */
      // update the number of ticks...
      // this.ticks = this.presidentss.filter(box => this.form.president.includes(box.candidacy_id));
       tickObj.ticks = candiVec.filter(box => selectedVec.includes(box.candidacy_id));
      // console.log("tick length: "+tickObj.ticks.length);
      
      // re-enable checkboxes if back under the limit...
      if (tickObj.ticks.length < tickObj.limit) {
         candiVec.forEach(box => {
          if (!selectedVec.includes(box.post_id)) box.disabled = false;
        });
      }

      // disable empty checkboxes if at the limit...
      if (tickObj.ticks.length == tickObj.limit) {
        candiVec.forEach(box => {
          // console.log("candidacy id: "+box.candidacy_id)
          // console.log(selectedVec); 
          if (!selectedVec.includes(box.candidacy_id)) box.disabled = true;
        });
      }
    },
    create_candidates(pid){
      let candiArray =[]; 
        //let pres =this.candidacies.data.find(item=>item.candidacy_id===1) 
        let candi =this.candidacies.data.filter(item=>item.post_id===pid) 
      if(candi.length>1){
          candi[0].disabled =false
          candiArray  =candi
        }else{
          candi.disabled=false
          // candiArray.push(candi)
          candiArray=candi

        }
        console.log(candiArray.length);
        return candiArray;
    },
     find_selected_name(candiVec,selectedVec){
        // console.log(candiVec)
        // console.log(selected_id)
         let selected_names =[]
         candiVec.forEach(box => {
          // console.log("candidacy id: "+box.candidacy_id)
          // console.log(selectedVec); 
          if (selectedVec.includes(box.candidacy_id))  selected_names.push(box.candidacy_name);
        });
        let  elected_names =selected_names.join(',');
        return elected_names

     }

   
  },
  components:{
      ShowCandidate,
      JetInput,
      ShowCheckbox,
      JetValidationErrors,
      AppLayout
  
  }
}
</script>