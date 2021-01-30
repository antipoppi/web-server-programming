<div style="text-align: right; margin-top: 10px;padding-bottom: 10px;">
    <span style="background-color: #ddd;">Cbook</span>
    <em>by QaD Solutions</em>
</div>
    <form action="cbook-list.php" method="post">
        <p>
            [ <a href='cbook-list.php'>Listaa</a> ]
            [ <a href='cbook-addform.php'>Lisää</a> ]
            <input type="text" name="search" placeholder="Nimihaku" value="<?php if(isset($_POST['searchSubmit'])) echo $_POST['search'];?>"/>
            <input type="submit" name="searchSubmit" style="display:none;" />
        </p>
    </form>
<hr>