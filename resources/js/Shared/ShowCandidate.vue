<template>
   <div class="flex flex-col text-center justify-center" >  
         <div class="mx-auto py-1 " > <img src="#"/></div> 
         <div> 
           <p class="mx-auto py-1 " > {{name}} </p> 
            <p class="mx-auto" > Candidate for {{candidate}} </p>
             <p class="mx-auto" >  {{nepali_candidacy}}  पदको उमेद्ववार </p> 
           </div>       
   </div>
</template> 
<script> 
export default { 
    props:{
       candidate: [],
       name: String,
       nepali_candidacy: String
        
    } 
}
</script>