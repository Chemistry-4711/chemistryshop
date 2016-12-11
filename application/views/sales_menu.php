<h1>Sales</h1>

<div class=table-responsive>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Description</th>
                <th>Quantity Available</th>
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
                <td>{price}</td>
                <td><a href="/sales/add/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Add to Cart</button></a></td>
            </tr>
            {/stock}
        </tbody>
    </table>
</div>
