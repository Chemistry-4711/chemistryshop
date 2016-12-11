<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Create a new Recipe item</h2> <p>{error}</p>
  <form method="POST" action="/adminedit/addrecipedone">
    <table class="table">
        <tbody>
            <tr>
              <td>Name</td>
              <td></td>
              <td><input class="form-control" name="name" style="width:200px;"/></td>
            </tr>
            <tr>
              <td>Recipe</td>
              <td></td>
              <td><input class="form-control" name="recipe" style="width:400px;"/></td>
            </tr>
            <tr>
              <td>Number Yielded</td>
              <td></td>
              <td><input class="form-control" name="numberYielded" type="numeric" style="width:100px;"/></td>
            </tr>
            {costItems}
            <tr>
              <td>{name}</td>
              <td></td>
              <td><input class="form-control" name="{name}" style="width:100px;" value="0"/></td>
            </tr>
            {/costItems}
            <tr>
              <td><button type="submit" class="btn btn-default btn-danger btn-sm">Add</button></td>
              <td></td>
              <td></td>
            </tr>
        </tbody>
    </table>
  </form>
</div>
