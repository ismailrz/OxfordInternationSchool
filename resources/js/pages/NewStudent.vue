<template>
 <div>
     <div class="container">
         <div class="row">
             <div class="col">
                 <a href="#">
                    <img class="normal" src="https://ois.edu.bd/wp-content/uploads/2019/09/Untitled-1.png" alt="Logo"/>
                 </a>
             </div>
             <div class="col mt-3">
                  <h2 style="color: #28288A" >Oxford Internation School </h2>
             </div>
         </div>
         <div class="row">
             <div class="col">
                 <h3 class="font-weight-bold text-center" style="color: #28288A"> Fill up the form  </h3>
             </div>
         </div>
         <div class="row " style="background-color:#6c7d7c1a">
             <div class="offset-3 p-2" style="color: #28288A">
                     <form @submit.prevent="addStudent">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" v-model="name" class="form-control"  placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" v-model="email" class="form-control"  placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" v-model="phone" class="form-control"  placeholder="Your Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="image">your photo</label>
                            <input type="file" class="form-control-file" @change="takePhoto"  ref="fileInput">
                            <img :src="image" alt="">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" v-model="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Add</button>
                    </form>
             </div>
           
         </div>
        
     </div>
 </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            email: '',
            phone: '',
            password:'',
            image:'',
        }
    },
    mounted(){

    },
    methods:{
        addStudent(){
            axios.post("/api/add-student", {
                name : this.name,
                email : this.email,
                phone : this.phone,
                password : this.password,
                image : this.image,
            })
           .then(res => {
            console.log(res.data.response);
            if(res.data.response == "success"){ 
                this.$router.push("/");
              }else{
                  alert(res.data.message);
              }
          })
          .catch(err => { 
                console.log(err);
          });
        },
       takePhoto(event) {
        let file = event.target.files[0];
        let reader = new FileReader();
        reader.onload = event => {
            this.image = event.target.result;
            console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      },
    }
}
</script>

<style>

</style>