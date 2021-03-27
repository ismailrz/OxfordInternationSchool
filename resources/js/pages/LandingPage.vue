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
             <router-link to="/new-account" class="btn btn-block btn-success">New Account</router-link>
         </div>
         <div class="row">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Account Name</th>
                         <th>Bank</th>
                         <th>Account No</th>
                         <th>Branch</th>
                         <th>Account Type</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                <tbody>
                    <tr v-for="account in accounts" :key="account.id">
                        <td> {{account.account_name}}</td>
                        <td> {{bankName(account.financial_organization_id)}}</td>
                        <td> {{account.account_no}}</td>
                        <td> {{account.branch}}</td>
                        <td> {{ accountType(account.account_type)}}</td>
                       
                        <td>
                             <router-link class="btn text-primary" :to="'/update-account/'+account.id"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></router-link>
                             <a href="javascript:void(0);" class="btn text-danger" @click="deleteAccount(account.id)" ><i class="fa fa-trash" aria-hidden="true"></i></a>
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
            accounts:{},
            organizations:{},
        }
    },
    mounted(){
        this.getAccounts();
         this.getOrganizations();
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
        getAccounts(){
            axios.get("/api/get-accounts")
           .then(res => {
               this.accounts = res.data.accounts;
          })
          .catch(err => { 
                console.log(err);
          });
        },
        deleteAccount(id) {
            if (confirm("Are yor comfirm to delete?")) {
                axios
                .delete(`/api/delete-account/${id}`)
                .then(res => {
                    this.getAccounts();
                })
                .catch(err => {
                    console.log(err);
                });
            }
        },
        bankName(organizationId){
           for(let i=0; i<this.organizations.length; i++){
                if(this.organizations[i].id == organizationId){
                    return this.organizations[i].name;
                }
            }

            return false;
        },
        accountType(typeId){
            if(typeId == 1)
                return 'Saving Account';
            else if(typeId == 2)
                return 'Current Account';
            else 
                return 'Join Account';        
        }
    }
}
</script>

<style>

</style>