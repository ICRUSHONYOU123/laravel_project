@extends('admin.layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>

        </style>
    </head>
    <body>
        <div class="container">
                <h3 class="mb-4 text-xl text-bold">View Admins</h3>
                <table class="table table-striped table-hover table-bordered table-responsive w-100 align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Password</td>
                            <td>Is admin</td>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <tr>
                            <td>RITHISAK</td>
                            <td>bitthork165@gmail.com</td>
                            <td>ot brb tok oy j'ngol</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
    </html>
@endsection
