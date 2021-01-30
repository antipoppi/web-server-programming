@extends('layouts.app')

@section('content')
  <h3>Edit Customer</h3>

  <div class="boxi">
    <!-- edit -->
    <form method="POST" action="{{ url('/') }}/customers/{{ $customer->id}}">

      {{ method_field('PATCH') }}
      {{-- lähetysmetodi on POST, mutta Laravelin helper-metodi method_field('PATCH') generoi lomakkeeseen piilokentän 
        <input type="hidden" name="_method" value="PATCH">, jonka perusteella Laravel tietää etsiä PATCH-metodia käytettäväksi. 
        Tämä tehdään siksi, koska web-selaimia ei ole speksattu lähettämään PATCH-pyyntöjä. --> --}}
      {{ csrf_field() }}

      <div>
        <input type="text" name="name" value="{{ $customer->name }}">
      </div>

      <div>
        <input type="text" name="birth_date" value="{{ $customer->birth_date }}">
      </div>

      <div>
        <button type="submit">Save changes</button>
      </div>

    </form><br>

    <!-- delete -->
    <form method="POST" action="{{ url('/') }}/customers/{{ $customer->id}}">

      @method('DELETE') {{-- lyhennetty merkintä --}}
      @csrf {{-- CSRF-token merkitään myös lyhennettynä --}}

      <div>
        <button type="submit">Delete Customer</button>
      </div>

    </form>
  </div>


@endsection