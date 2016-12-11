<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Edit an Inventory item</h2>
    <form method="POST" action="/adminedit/editInventoryDone">
      <table class="table">
          <thead>
              <tr>
              <th>Name</th>
              <th></th>
              <th>New value</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>Name</td>
                <td></td>
                <td><input class="form-control" name="name" style="width:200px;" value="{name}"/></td>
              </tr>
              <tr>
                <td>Supplier</td>
                <td></td>
                <td><input class="form-control" name="supplier" style="width:300px;" value="{supplier}"/></td>
              </tr>
              <tr>
                <td>Price</td>
                <td></td>
                <td><input class="form-control" name="price" type="numeric" style="width:100px;" value="{price}"/></td>
              </tr>
              <tr>
                <td>Quantity</td>
                <td></td>
                <td><input class="form-control" name="quantity" type="numeric" style="width:100px;" value="{quantity}"/></td>
                <input name="id" type="hidden" value="{id}"/>
              </tr>
              <tr>
                <td><button type="submit" class="btn btn-default btn-danger btn-sm">Edit</button></td>
                <td></td>
                <td></td>
              </tr>
          </tbody>
      </table>
    </form>
</div>
