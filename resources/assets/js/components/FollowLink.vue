<template>
   <div>

     <a href="" alt="" style="padding-left: 3mm" @click="followUser"v-text="buttonText">Follow</a>

   </div>
</template>

<script>

/*const config = {
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
  responseType: 'blob'
};*/


    export default {

      props :['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
      data : function(){
        return {
          status : this.follows,
        }
      },
        methods: {

          followUser(){
            axios.post('/follow/'+ this.userId).then((response)=>{
              this.status = !this.status;
              console.log(response.data);
              if ( response.data.includes("{\"error\":\"Unauthenticated.\"}")){
                window.location = '/login';

              }


            }).catch((error)=>{
              console.log(error.response.data)

            });


            },
         /* buttonText() {
            return (this.status)? 'Unfollow' : 'Follow';*/

          },


            computed : {
            buttonText() {
              return (this.status)? 'Unfollow' : 'Follow';

              }
            }




    }


</script>

