@extends('users.layouts.app')
@section('content')

<div class="row">
       
        <center><h3 class="mt-5">Daftar Pesanan Penginapan, Customer</h3></center>

        <table class="table mt-5 mb-5">
            <thead>
                <tr>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telepon / HP</th>
                <th scope="col">Email</th>
                <th scope="col">Pilihan</th>                
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td>Mariana Putri Sinaga</td>
            		<td>ana</td>
            		<td>Tarutung</td>
            		<td>00999000</td>
            		<td>marianaputri81@gmail.com</td>
            		<td><button>Terima</button></td>
            	</tr>
            	<tr>
            		<td>Juliana Turnip</td>
            		<td>juliana</td>
            		<td>Samosir</td>
            		<td>00999001</td>
            		<td>juliana@gmail.com</td>
            		<td><button>Terima</button></td>
            	</tr>
            	<tr>
            		<td>Budi </td>
            		<td>Bud</td>
            		<td>Laguboti</td>
            		<td>00999001</td>
            		<td>budi@gmail.com</td>
            		<td><button>Tolak</button></td>
            	</tr>
            </tbody>

            </table>   
                                        
        </div>
        <div class="col-md-1">
        </div>
    </div>

@endsection