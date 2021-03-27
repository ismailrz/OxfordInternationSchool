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
                 <h3 class="font-weight-bold text-center" style="color: #28288A">  Bank Account Update  </h3>
             </div>
         </div>
         <div class="row " style="background-color:#6c7d7c1a">
             <div class="offset-3 p-2" style="color: #28288A">
                     <form @submit.prevent="updateStudent">
                        <div class="form-group">
                            <label for="name">Account Name</label>
                            <input type="text" v-model="account_name" class="form-control"  placeholder="Account Name" required>
                        </div>
                        <div class="form-group">
                            <label for="bank">Bank </label>
                              <select v-model="financial_organization_id"  class="form-control" required>
                                  <option v-for="org in organizations" :key="org.id" v-bind:value="org.id">{{org.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Account No</label>
                            <input type="text" v-model="account_no" class="form-control"  placeholder="Your Account No" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Branch</label>
                            <input type="text" v-model="branch" class="form-control"  placeholder="Branch Name" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Account Type</label>
                             <select v-model="account_type"  class="form-control" required>
                                  <option  v-bind:value="1">Saving Account</option>
                                  <option  v-bind:value="2">Current Account</option>
                                  <option  v-bind:value="3">Join Account</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Swift Code</label>
                            <input type="text" v-model="swift_code" class="form-control"  placeholder="Swift Code" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Route No</label>
                            <input type="text" v-model="route_no" class="form-control"  placeholder="Route No" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                    <router-link to="/"  class="btn btn-secondary">Cancel </router-link>
                            </div>
                            <div class="col">
                                 <button type="submit" class="btn btn-block btn-success">Update</button>
                            </div>
                        </div>
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
            account:{},
            id:'',
            organizations:{},
            account_name:'',
            financial_organization_id: 0,
            account_no: '',
            branch: '',
            swift_code:'',
            account_type:'',
            route_no:'',

        }
    },
    mounted(){
         this.getOrganizations();
        this.getEditAccount(window.location.href.split('/').pop());
    },
    methods:{
        getOrganizations(){
            axios.get("/api/get-organizations")
           .then(res => {
               this.organizations = res.data.organizations;
          })
          .catch(err => { 
                console.log(err);
          });
        },
        getEditAccount(accountId){
            axios.get('/api/get-edit-account/'+accountId)
            .then(res => {

                this.account = res.data.account;
                this.id = this.account.id;
                this.account_name = this.account.account_name;
                this.financial_organization_id = this.account.financial_organization_id;
                this.account_no = this.account.account_no;
                this.branch = this.account.branch;
                this.swift_code = this.account.swift_code;
                this.route_no = this.account.route_no;
                this.account_type = this.account.account_type;
            })            
        },
        updateStudent(){
            axios.put("/api/update-account", {
                id : this.id,
                account_name : this.account_name,
                financial_organization_id : this.financial_organization_id,
                account_no : this.account_no,
                branch : this.branch,
                swift_code : this.swift_code,
                route_no : this.route_no,
                account_type : this.account_type,
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

    }
}
</script>

<style>

</style>