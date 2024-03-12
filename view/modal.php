<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" name="_name" class="form-control" placeholder="Enter Name">
            <label for="">Category</label>
            <select class="form-select" name="_category">
                <option value="drink">Drink</option>
                <option value="Clothes">Clothes</option>
                <option value="Accessories">Accessories</option>
            </select>
            <label for="name">Price</label>
            <input type="text" name="_price" class="form-control" placeholder="Enter Price">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button name="btn_add" type="submit" class="btn btn-success">Confirm</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>