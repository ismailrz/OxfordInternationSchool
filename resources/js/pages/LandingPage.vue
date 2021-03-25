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
             <router-link to="/new-student" class="btn btn-block btn-success">New Student</router-link>
         </div>
         <div class="row">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                <tbody>
                    <tr v-for="student in students" :key="student.id">
                        <td> {{student.name}}</td>
                        <td> {{student.email}}</td>
                        <td> {{student.phone}}</td>
                        <td> 
                            <img :src="'/storage/images/'+student.image" width="100px" alt="">
                            update | delete
                        </td>
                    </tr>
                </tbody>
             </table>
         </div>
        
     </div>
 </div>
</template>

<script>
export default {
        data(){
        return{
            students:{},
        }
    },
    mounted(){
        this.getStudents();
    },
    methods:{
        getStudents(){
            axios.get("/api/get-students")
           .then(res => {
               this.students = res.data.students;
          })
          .catch(err => { 
                console.log(err);
          });
        },
    }
}
</script>

<style>

</style>