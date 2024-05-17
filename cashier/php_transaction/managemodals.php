<!-- Modal for Products-->
<div class="modal fade" id="viewProds" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gotech text-white d-flex">
                <center><h1 class="modal-title fs-5 d-flex justify-content-center">Add Products</h1></center>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" name="search" id="searchProduct">
                <button type="button" id="ibtnSearch">Search</button>
                <table class="table" id="transact-table">
                    <thead>
                        <th>Check</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>In Stock</th>
                        <th>Price per Item</th> 
                    </thead>
                    <tbody id="viewProducts">

                    </tbody>
                </table>
                <div class="form-group mt-3">
                        <button type="button" value="" class="btn btn-primary" id="validate"> Save</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- List of Cuatomers Modal -->
<div class="modal fade" id="viewCust" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header bg-gotech text-white d-flex">
                <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel" class="">List of Customers</h1>
                <button type="button" class="btn-close btn-close-white text-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <section class="mt-3">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <button type="button" class="btn btn-primary justify-content-start" data-bs-toggle="modal" data-bs-target="#addCust">Add Customer</button>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="searchCust" id="searchCust" class="form-control w-100 mx-2 my-2 justify-content-start" placeholder="Search Customer">
                        </div>
                    </div>
                    <table class="table">
                      <thead>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Actions</th>
                      </thead>
                      <tbody id="showCust">

                      </tbody>
                    </table>
                </section>
              </div>
            </div>
          </div>
        </div>

    <!-- Modals for Customers-->
    <div class="modal fade" id="addCust" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header bg-gotech text-white d-flex">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel" class="">Add New Customers</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="custInfo">
              <div class="mb-3">
                <label for="" class="form-label">Firstname</label>
                <input type="text" name="Cfname" id="Cfname" class="form-control">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Lastname</label>
                <input type="text" name="Clname" id="Clname" class="form-control">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Barangay</label>
                <input type="text" name="Cbrgy" id="Cbrgy" class="form-control">
              </div>
              <div class="mb-3">
                <label for="town" class="form-label" class="form-control">Municipality/City</label>
                <select name="Cmun" id="Cmun" class="form-select">
                  <option style="display:none;"></option>
                  <option value="Agoo">Agoo</option>
                  <option value="Aringay">Aringay</option>
                  <option value="Agoo">Agoo</option>
                  <option value="Bacnotan">Bacnotan</option>
                  <option value="Bagulin">Bagulin</option>
                  <option value="Balaoan">Balaoan</option>
                  <option value="Bangar">Bangar</option>
                  <option value="Bauang">Banuang</option>
                  <option value="Burgos">Burgos</option>
                  <option value="Caba">Caba</option>
                  <option value="Luna">Luna</option>
                  <option value="Naguilian">Nagulian</option>
                  <option value="Pugo">Pugo</option>
                  <option value="City of San Fernando">City of San Fernando</option>
                  <option value="San Gabriel">San Gabriel</option>
                  <option value="San Juan">San Juan</option>
                  <option value="Santo Tomas">Santo Tomas</option>
                  <option value="Santol">Santol</option>
                  <option value="Sudipen">Sudipen</option>
                  <option value="Tubao">Tubao</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Province</label>
                <input type="text" name="Cprov" id="Cprov" class="form-control" value="La Union">
              </div>
              <div class="mb-3">
                <button type="button" id="backtoCust" class="btn btn-secondary">Back</button>
                <button type="submit" class="btn btn-primary">Add Customer</button>
                <button type="reset" class="btn btn-danger">Clear</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- Modal for Confirmation (Add) -->
  <div class="modal fade" id="confirm_cust" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-primary" id="addcustDB">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!-- Payment Modal -->
   <div class="modal fade" id="payModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-gotech text-white d-flex">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel" class="">Payment Modal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="payment">
              <div class="mb-3">
                <label for="paid">Money Tendered</label>
                <input type="number" id="paid" class="form-control">
              </div>
              <!-- <div class="mb-3">
                <label for="paid">Change</label>
                <p id="change"></p>
              </div> -->
              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary"><a href="./../php_report/receipt.php" target="_blank"></a>Insert Payment</button><br>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Confirmation (Add_Payment) -->
  <div class="modal fade" id="confirm_pay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body bg-dark text-white">
          <span class="d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="orange" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
              </svg>
          </span>
          <p class="h3 text-center">Do you want to pay for this customer</p>
          <p class="text-center">You wont be able to revert this</p>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary mx-2 " data-bs-dismiss="modal" id="backtoPayment">No</button>
            <button type="button" class="btn btn-primary" id="addpaymentDB">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Showing Change -->
     <!-- Payment Modal -->
     <div class="modal fade" id="sukli" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-gotech text-white d-flex">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel" class="">Payment Modal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                <h3 class="text-dark">Change</h3>
                <p id="change"></p>
              </div>
            <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" id="clearTable" data-bs-dismiss="modal">Ok</button>
          </div>
          </div>
        </div>
      </div>
    </div>
