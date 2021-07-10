<template>
    <div class="text-center mx-auto text-center mt-4 px-4">
            <div class="mx-auto text-center" > 
            <table> 
                  <tr v-for =" (candidate, candiIndx) in candidacies.data" :key="candiIndx" > {{candidate.candidacy_name}}</tr>        
             
            
        </table>
         </div> 
    </div>
</template>
<script>
export default {
    props:{
        candidacies: Object
    },
    computed: {
        candi(){
        console.log(this.candidacies.data)
        return  this.candidacies;
        }   
    },

}
</script>