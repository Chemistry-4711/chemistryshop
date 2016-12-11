<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Create a new Inventory item</h2> <p>{error}</p>
  <form method="POST" action="/adminedit/addinventorydone">
    <table class="table">
        <tbody>
            <tr>
              <td>Name</td>
              <td></td>
              <td><input class="form-control" name="name" style="width:200px;"/></td>
            </tr>
            <tr>
              <td>Supplier</td>
              <td></td>
              <td><input class="form-control" name="supplier" style="width:300px;"/></td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td></td>
              <td><input class="form-control" name="quantity" type="numeric" style="width:100px;"/></td>
            </tr>
            <tr>
              <td>Price</td>
              <td></td>
              <td><input class="form-control" name="price" type="numeric" style="width:100px;"/></td>
            </tr>
            <tr>
              <td><button type="submit" class="btn btn-default btn-danger btn-sm">Add</button></td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
    </table>
  </form>
</div>
