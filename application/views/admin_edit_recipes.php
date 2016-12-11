<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Edit a Recipe</h2>
  <form method="POST" action="/adminedit/editrecipedone">
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
              <td>Number Yielded</td>
              <td></td>
              <td><input class="form-control" name="numberYielded" style="width:100px;" value="{numberYielded}"/></td>
            </tr>
            <tr>
              <td>Recipe</td>
              <td></td>
              <td><input class="form-control" name="recipe" style="width:400px;" value="{recipe}"/></td>
              <input name="id" type="hidden" value="{id}"/>
              <input name="costid" type="hidden" value="{costid}"/>
            </tr>
            {costItems}
            <tr>
              <td>{name}</td>
              <td></td>
              <td><input class="form-control" name="{name}" style="width:100px;" value="{value}"/></td>
            </tr>
            {/costItems}
            <tr>
              <td><button type="submit" class="btn btn-default btn-danger btn-sm">Edit</button></td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
    </table>
  </form>
</div>
