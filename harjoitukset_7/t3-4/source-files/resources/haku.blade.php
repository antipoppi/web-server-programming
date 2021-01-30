<!DOCTYPE html>
<html>

<head>
    <title>Metahakupalvelu</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="{{ url('/css/metasearch.css') }}" type="text/css">
</head>

<body>
    <div id="container">
        <h3>Metahakupalvelu</h3>
            <form method="get" action="{{route('metasearch')}}">
                @csrf
                {{-- 
                    input vaatii selaimessa [a-zA-Z0-9]{5,30}, 
                    mutta Laravelin puolella vain [a-zA-Z]{5,30} 
                    Jos syöttövirhe Laravelin päässä, input tausta muuttuu punaiseksi ja vanha input jää näkyviin 
                --}}
                <input  type="search"
                        name="searchInp" 
                        {!! $errors->has('searchInp') ? 'style="background-color: #ffaaaa"' : ''!!} 
                        pattern="[a-zA-Z0-9]{5,30}"
                        title="Vain [a-zA-Z0-9]{5,30} hyväksytään" 
                        value="{{old('searchInp')}}" 
                        autofocus
                />
                <button type="submit">Etsi</button><br>
                {{-- Jos syöttövirhe, tulostaa ne tähän alapuolelle ennen selainvalinta option-boxia --}}
                @if ($errors->has('searchInp'))
                <div style='background-color: #ffdddd;'>
                    <ul>
                        @foreach ($errors->get('searchInp') as $error)
                        <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <select name="searchProvider" id="searchEngine">>
                    <option value="google">Google</option>
                    <option value="bing" {!! $errors->has('searchProvider') ? 'selected="selected"' : ''!!} >Bing</option>
                    <option value="duckduckgo">Duckduckgo</option>
                </select>
                @if ($errors->has('searchProvider'))
                <div style='background-color: #ffdddd;'>
                    <ul>
                        @foreach ($errors->get('searchProvider') as $error)
                        <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
    </div>
    

    
</body>

</html>