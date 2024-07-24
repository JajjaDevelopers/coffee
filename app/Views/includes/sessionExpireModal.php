 <div class="modal fade" id="loginModalExpire" data-bs-backdrop="static" tabindex="-1" aria-labelledby="loginModalExpireLabel"
   aria-hidden="true">
   <div class="modal-dialog" id='modalDialog'>
     <div class="modal-content" id='modalContent'>
       <div class="modal-header text-center">
         <h1 class="modal-title fs-5" id="loginModalExpireLabel">User Authentication</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div class="container">
          <input type='text' id='currentUrl'>
           <span class="text-center text-danger" id='messageSpan'></span>
           <form>
             <!-- Email input -->
             <div class="form-outline mb-4">
               <input type="email" id="userEmail" class="form-control" />
               <label class="form-label" for="form2Example1">Email address</label>
             </div>

             <!-- Password input -->
             <div class="form-outline mb-4">
               <input type="password" id="userPassword" class="form-control" />
               <label class="form-label" for="form2Example2">Password</label>
             </div>
             <!-- Submit button -->
             <button type="button" id='userAuthBtn' class="btn btn-primary btn-block mb-4 w-100">Sign in</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>