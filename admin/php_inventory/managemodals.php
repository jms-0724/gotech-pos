
<!-- Modal for Add Inventory Products -->
<div class="modal fade" id="addProducts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Products</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="add_inv" enctype="multipart/form-data">
            <label for="addprod_id" class="form-label">Product ID</label>
            <input type="text" name="addprod_id" id="addprod_id" class="form-control" required>
            <label for="addprod_name" class="form-label">Product Name</label>
            <input type="text" name="addprod_name" id="addprod_name" class="form-control" required>
            <label for="addprod_type" class="form-label">Product Type</label>
            <select name="addprod_type" id="addprod_type" class="form-select">
              <option style="display:none" disabled selected value> </option>
              <option value="PC Parts">PC PARTS</option>
              <option value="Peripherals">Peripherals</option>
              <option value="Consoles">Consoles</option>
              <option value="Printers">Printers</option>
              <option value="PC SET">PC SET</option>
            </select>
            <label for="addprod_quantity" class="form-label">Product Quantity</label>
            <input type="number" name="addprod_quantity" id="addprod_quantity" class="form-control" required>
            <label for="addprod_price" class="form-label">Product Price</label>
            <input type="text" name="addprod_price" id="addprod_price" class="form-control" required>
            <label for="addprod_photo" class="form-label" >Product Photo</label>
            <input type="file" name="addprod_photo" id="addprod_photo" class="form-control" placeholder=".jpg, .gif and .png files only" required>
            <div class="mt-3">
              <button type="reset" class="btn btn-danger">Clear</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Price and Quantity Modal-->
<div class="modal fade" id="updProducts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Product# <i id="pID"></i></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="upd_inv">
            <!-- <label for="updprod_name" class="form-label">Product Name</label>
            <input type="text" name="updprod_name" id="updprod_name" class="form-control" required>
            <label for="updprod_type" class="form-label">Product Type</label>
            <select name="updprod_type" id="updprod_type" class="form-select">
              <option style="display:none" disabled selected value> </option>
              <option value="PC Parts">PC PARTS</option>
              <option value="Peripherals">Peripherals</option>
              <option value="Consoles">Consoles</option>
              <option value="Printers">Printers</option>
              <option value="PC SET">PC SET</option>
            </select> -->
            <label for="updprod_quantity" class="form-label">Product Quantity</label>
            <input type="number" name="updprod_quantity" id="updprod_quantity" class="form-control" required>
            <label for="updprod_price" class="form-label">Product Price</label>
            <input type="text" name="updprod_price" id="updprod_price" class="form-control" required>
            <!-- <label for="updprod_photo" class="form-label" >Product Photo</label>
            <input type="file" name="updprod_photo" id="updprod_photo" class="form-control" placeholder=".jpg, .gif and .png files only" required> -->
            <div class="mt-3">
              <button type="reset" class="btn btn-danger">Clear</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
  <!-- Modal for Confirmation (Add) -->
  <div class="modal fade" id="confirm_prods" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-primary" id="addinvDB">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Confirmation (Update) -->
  <div class="modal fade" id="confirm_inv" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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


  <!-- Add Items -->
<div class="modal fade" id="addItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" >
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Product# <i id="pID"></i></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="upd_inv">
          <label for="">Items</label>
          <select name="items" id="items">
            
          </select>
            <label for="updprod_quantity" class="form-label">Product Quantity</label>
            <input type="number" name="updprod_quantity" id="updprod_quantity" class="form-control" required>
            <label for="updprod_price" class="form-label">Product Price</label>
            <input type="text" name="updprod_price" id="updprod_price" class="form-control" required>
            <!-- <label for="updprod_photo" class="form-label" >Product Photo</label>
            <input type="file" name="updprod_photo" id="updprod_photo" class="form-control" placeholder=".jpg, .gif and .png files only" required> -->
            <div class="mt-3">
              <button type="reset" class="btn btn-danger">Clear</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>