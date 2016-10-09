<h1>Inventory list</h1>
<br>
<br>
<div class=table-responsive>
    <table class="table">
        <thead>
            <tr><th>
                Names
            </th></tr>
        </thead>
        <tbody>
            {inventory}
            <tr><td><a href = "receiving/receipt/{name}">{name}</a></td></tr>
            {/inventory}
        </tbody>
    </table>
</div>
