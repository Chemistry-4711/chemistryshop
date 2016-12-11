<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Edit a Stock item</h2>
  <form method="POST" action="/adminedit/editstockdone">
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
              <td>Description</td>
              <td></td>
              <td><input class="form-control" name="description" style="width:300px;" value="{description}"/></td>
            </tr>
            <tr>
              <td>Price</td>
              <td></td>
              <td><input class="form-control" name="price" type="numeric" style="width:100px;" value="{price}"/></td>
            </tr>
            <tr>
              <td>Number Sold</td>
              <td></td>
              <td><input class="form-control" name="num_sold" style="width:100px;" value="{num_sold}"/></td>
              <input name="id" type="hidden" value="{id}"/>
              <input name="quantity" type="hidden" value="{quantity}"/>
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
