<!-- Modal for Add User-->
<div class="modal fade" id="addUsers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gotech text-white d-flex">
              <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel" class="">Add Users</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_form_user">
                    <div>
                        <label for="adduname" class="form-label">Username</label>
                        <input type="text" name="adduname" id="adduname" class="form-control" placeholder="Username">
                        <label for="addpword" class="form-label">Password</label>
                        <input type="password" name="addpword" id="addpword" class="form-control" placeholder="Password" minlength="8">
                        <label for="add_level" class="form-label">Userlevel</label>
                        <select name="add_level" id="add_level" class="form-select">
                            <option value="Administrator">Administrator</option>
                            <option value="Cashier">Cashier</option>
                        </select>
                        <label for="fname" class="form-label">Firstname</label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your Firstname">
                        <label for="lname" class="form-label">Lastname</label>     
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your Lastname">
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary"> Save</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button> 
                  </div>
                    </div>
                  </form>
                
            </div>
            
          </div>
        </div>
      </div>


      <!-- Modal for Update User -->
      <div class="modal fade" id="upd_Users" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User # <i id="uID"></i></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="up_form">
          <div>
          <div>
            <label for="up_uname" class="form-label">Username</label>
            <input type="text" name="up_uname" id="up_uname" class="form-control" placeholder="Enter username" required>
          </div>
          <div>
            <label for="up_pword" class="form-label">Password</label>
            <input type="password" name="up_pword" id="up_pword" class="form-control" placeholder="Enter Password" required>
          </div>
          <div>
            <label for="up_level">Userlevel</label>
            <select name="up_level" id="up_level" class="form-select">
              <option value="Administrator">Administrator</option>
              <option value="Cashier">Cashier</option>
            </select>
          </div>
          <div>
            <label for="up_fname">Firstname</label>
            <input type="text" name="up_fname" id="up_fname" class="form-control" placeholder="Enter your Firstname" required>
          </div>  
          <div>
            <label for="up_lname">Lastname</label>
            <input type="text" name="up_lname" id="up_lname" class="form-control" placeholder="Enter your Lastname" required>
          </div>
        </div>
        <div class="mt-3">
          <button type="reset" class="btn btn-danger">Clear</button>
          <button type="button" class="btn btn-secondary"data-bs-dismiss="modal" id="close">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Modal for Confirmation (Add) -->
  <div class="modal fade" id="confirm_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body bg-dark text-white">
          <span class="d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="orange" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
              </svg>
          </span>
          <p class="h3 text-center">Do you want to add this user</p>
          <p class="text-center">You wont be able to revert this</p>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary mx-2 " data-bs-dismiss="modal" id="backtoAdd">No</button>
            <button type="button" class="btn btn-primary" id="addDB">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal for Confirmation (Update) -->
    <div class="modal fade" id="confirm_upd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body bg-dark text-white">
          <span class="d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="orange" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
              </svg>
          </span>
          <p class="h3 text-center">Do you want to add this user</p>
          <p class="text-center">You wont be able to revert this</p>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary mx-2 " data-bs-dismiss="modal" id="backtoUp">No</button>
            <button type="button" class="btn btn-primary" id="updDB">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>