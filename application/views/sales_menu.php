<h1>Sales</h1>
<br>
<br>

<div class=table-responsive>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Description</th>
                <th>Quantity Available</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {stock}
            <tr>
                <td>{name}</td>
                <td>{description}</td>
                <td>{quantity}</td>
                <td><input class="form-control" type="numeric" style="width:40px;" value="1"/></td>
                <td>{price}</td>
                <td><a href="/sales/get/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Order Now</button></a></td>
            </tr>
            {/stock}
        </tbody>
    </table>
</div>
