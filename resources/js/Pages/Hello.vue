<template>

<div>
    test
     <div v-for ="(user, index) in users" :key='index'  class="bg-red-200 mb-2">  
            {{user.name}} ->{{user.email }}
         </div> 
    <div>
    <inertia-link href="/contact"> Contact Page</inertia-link>
    </div>
</div>
  </template>
    <script>
        export default{
            props: {
                users: Array
            }

        };
    </script> 