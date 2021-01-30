<div id="navbar" style="text-align: right; margin-top: 10px;padding-bottom: 10px;">
    <span style="background-color: #ddd;">Cbook</span>
    <em>by QaD Solutions</em>
</div>
<form action="{{ url('/') }}/customers/search" method="post">
    {{ csrf_field() }}
    <p>
        [ <a href={{ url('/customers') }}>Listaa</a> ]
        [ <a href={{ url('/customers/create') }}>Lisää</a> ]
        <input type="text" name="search" placeholder="Nimihaku" value=""/>
        <input type="submit" name="searchSubmit" style="display:none;" />
    </p>
</form>
<hr>