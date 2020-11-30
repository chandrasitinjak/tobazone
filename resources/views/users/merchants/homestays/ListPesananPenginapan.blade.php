@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')
    <table> 
        <th>
            <td>id_order</td>
            <td>status</td>
            <td>aksi</td>
        </th>

        
        @foreach($data as $datas)
            <tr>
                <td>{{ $datas->id }}</td>
                <td>{{ $datas->status }}</td>
                <td>
                    <form method="POST" action="{{ url('/homestay/approvePenginapan/'.$datas->id) }}">
                    @csrf
                    <button type="submit" >terima</button>
                    </form>
                </td>    
                <td>
                    <form method="POST" action="{{ url('/homestay/rejectedPenginapan/'.$datas->id) }}">
                    @csrf
                    <button type="submit" >Tolak</button>
                    </form>
                </td>    
            </tr>
        @endforeach
    
    </table>
@endsection